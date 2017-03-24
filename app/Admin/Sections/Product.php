<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use App\Models\Property;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Product
 *
 * @property \App\Models\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Product extends Section
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title = "Товары";

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
		return AdminDisplay::table()
			->setHtmlAttribute('class', 'table-primary')
			->setColumns([
				AdminColumn::link('id', '#')->setWidth('30px'),
				AdminColumn::link('name')->setLabel('Название'),
			])->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
		$form = AdminForm::panel();

		$property = "Для нового товара нет возможности выбора свойств.";
		if (! is_null($id)) {
			$property = AdminSection::getModel(Property::class)->fireDisplay();
			$property->getScopes()->push(['withProduct', $id]);
			$property->setParameter('product_id', $id);
		}

		$tabs = AdminDisplay::tabbed([
			'Товар' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::checkbox('status', 'Активность')->setDefaultValue(true),
				AdminFormElement::text('name', 'Название')->required(),
				AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
				AdminFormElement::multiselect('categories', 'Категории', \App\Models\Category::class)
					->setDisplay('name')
					->setLoadOptionsQueryPreparer(function ($element, $query) {
						return $query
							->where('id', 1)
							->orWhere('parent_id', 1);
					}),
				AdminFormElement::select('producer_id', 'Производитель', \App\Models\Producer::class)->setDisplay('name'),
				AdminFormElement::number('order', 'Сортировка')->setDefaultValue(100),
			]),
			'Аннонс' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::wysiwyg('preview_text', 'Описание для анонса'),
				AdminFormElement::image('preview_img', 'Картинка для анонса'),
			]),
			'Подробно' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::wysiwyg('detail_text', 'Детальное описание'),
				AdminFormElement::image('detail_img', 'Детальная картинка'),
			]),
			'Каталог' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::text('price', 'Цена'),
				AdminFormElement::text('quantity', 'Количество')->setDefaultValue(0),
				AdminFormElement::select('discount_id', 'Скидка', \App\Models\Discount::class)->setDisplay('name')->nullable(),
				AdminFormElement::text('color', 'Цвет'),
				AdminFormElement::text('weight', 'Вес'),
				AdminFormElement::text('length', 'Длина'),
				AdminFormElement::text('width', 'Ширина'),
				AdminFormElement::text('height', 'Высота'),
				AdminFormElement::text('artikul', 'Артикул'),
			]),
			'Свойства' => new \SleepingOwl\Admin\Form\FormElements([$property]),
		]);
		$form->addElement($tabs);
		return $form;
	}

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
