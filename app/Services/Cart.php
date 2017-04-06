<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 06.04.17
 * Time: 10:56
 */

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
//use App\Exceptions\CartException as Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager as Session;

class Cart {

	const DEFAULT_INSTANCE = 'default';

	/**
	 * @var Session
	 */
	private $session;

	/**
	 * @var Guard
	 */
	private $auth;

	/**
	 * @var CartItem
	 */
	private $model;

	/**
	 * @var string
	 */
	private $code;

	/**
	 * Holds the current cart instance.
	 *
	 * @var string
	 */
	private $instance;


	function __construct(Session $session, Guard $auth, CartItem $model)
	{
		$this->session = $session;
		$this->auth = $auth;
		$this->model = $model;

		$this->code = $this->session->get('cart.code');
		if (is_null($this->code)) {
			$this->createNewCart();
		}

		$this->instance(self::DEFAULT_INSTANCE);
	}


	public function code()
	{
		return $this->code;
	}
	/**
	 * Set the current cart instance.
	 *
	 * @param string|null $instance
	 * @return \App\Services\Cart
	 */
	public function instance($instance = null)
	{
		$instance = $instance ?: self::DEFAULT_INSTANCE;
		$this->instance = sprintf('%s.%s.%s', 'cart', $instance);
		return $this;
	}

	public function clear()
	{
		$this->session->remove('cart');
		$this->model->whereCode($this->code)->delete();
		$this->createNewCart();
	}


	/**
	 * Сумма стоимостей всех позиций в корзине. Итоговая сумма на чеке.
	 *
	 * @return float
	 */
	public function total()
	{
		$total = $this->session->get('cart.total');

		if (is_null($total)) {
			/** @var Collection $items */
			$items = $this->model->with([ 'product' => function ($query) { $query->select([ 'id', 'price' ]); } ])
				->whereCode($this->code)
				->get([ 'product_id', 'quantity' ]);

			$total = $items->sum(function ($item) { return $item->quantity * $item->product->price; });

			$this->session->set('cart.total', $total);
		}

		return $total;
	}


	/**
	 * Суммарное количество единиц товара в заказе.
	 *
	 * @return int
	 */
	public function count()
	{
		$count = $this->session->get('cart.count');

		if (is_null($count)) {

			$count = $this->model->whereCode($this->code)->sum('quantity');

			$this->session->set('cart.count', $count);
		}

		return $count;
	}


	/**
	 * Позиции заказа.
	 *
	 * @param array $columns
	 * @param bool  $lock
	 *
	 * @return Collection
	 */
	public function items($columns = [ '*' ], $lock = false)
	{
		if ($lock) {
			return $this->model->with(
				[
					'product' => function ($query) {
						$query->lockForUpdate();
					}
				]
			)->whereCode($this->code)->latest('created_at')->lockForUpdate()->get($columns);
		}

		return $this->model->with('product')->whereCode($this->code)->latest('created_at')->get($columns);
	}


	/**
	 * Изменения количества позиции в заказе. Проверяет наличие на складе. Не проверяет баланс пользователя.
	 *
	 * @param string|array $condition
	 * @param int          $quantity
	 *
	 * @throws Exception
	 */
	public function setQuantity($condition, $quantity)
	{
		if (!is_array($condition)) {
			$condition = [ 'product_id' => $condition ];
		}

		// проверка наличия на складе

		$item = $this->model->with('product')->whereCode($this->code)->where($condition)->first();

		if ($quantity > $item->product->quantity) {
			throw new Exception(setting('message.not_enough_in_stock') ?: 'Количество на складе ограничено.');
		}

		$item->update(compact('quantity'));

		$this->clearCounters();
	}


	/**
	 * @param Product $product
	 * @param int     $quantity
	 *
	 * @return CartItem
	 * @throws Exception
	 */
	public function addItem($product, $quantity = 1)
	{
		if ($this->auth->guest()) {
			abort(401);
		}

		if (!$this->auth->user()->is_admin) {

			// перед добавлением товара в корзину надо проверить баланс пользователя
			// если баллов не хватает, контроллеру возвращается false для того
			// чтобы тот мог уведомить пользователя надлежащим способом

			$possible_total = $this->total() + $product->price;

			if ($possible_total > $this->auth->user()->balance) {

				throw new Exception(
					setting(
						'message.not_enough_points'
					) ?: 'На вашем балансе недостаточно баллов для выполнения этого действия.'
				);

			}
		}

		// если товар уже есть в корзине - только увеличим его количество

		/** @var CartItem $item */
		$item = $this->model->whereCode($this->code)->whereProductId($product->getKey())->first();

		if ($item) {

			// проверка наличия на складе

			if ($item->quantity + $quantity > $product->quantity) {
				throw new Exception(setting('message.not_enough_in_stock') ?: 'Количество на складе ограничено.');
			}

			$item->increment('quantity', $quantity);

			$this->clearCounters();

			return $item;
		}

		// проверка наличия на складе

		if ($quantity > $product->quantity) {
			throw new Exception(setting('message.not_enough_in_stock') ?: 'Количество на складе ограничено.');
		}

		// добавление нового товара в корзину

		/** @var CartItem $newItem */
		$newItem = $this->model->create(
			[
				'code' => $this->code,
				'user_id' => $this->auth->user()->getAuthIdentifier(),
				'product_id' => $product->getKey(),
				'quantity' => $quantity,
			]
		);

		$this->clearCounters();

		return $newItem;
	}


	public function deleteItem($condition)
	{
		if (!is_array($condition)) {
			$condition = [ 'product_id' => $condition ];
		}

		$this->model->whereCode($this->code)->where($condition)->delete();

		$this->clearCounters();
	}


	private function createNewCart()
	{
		$this->code = str_random();
		$this->session->set('cart.code', $this->code);
		$this->clearCounters();
	}


	private function clearCounters()
	{
		$this->session->remove('cart.count');
		$this->session->remove('cart.total');
	}
}