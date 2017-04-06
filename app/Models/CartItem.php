<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CartItem
 *
 * @property integer $id
 * @property string $code
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $quantity
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereProductId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CartItem whereUpdatedAt($value)
 */

class CartItem extends Model
{

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [ 'quantity' => 'integer' ];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'code', 'user_id', 'product_id', 'quantity' ];


	public function user()
	{
		return $this->belongsTo(User::class);
	}


	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
