<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminSection;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Downloads
 *
 * @property \App\Models\Downloads $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Downloads extends Section
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
    protected $title = "Каталог файлов";

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
				AdminColumn::text('price')->setLabel('Цена'),
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


//		$property = "Для нового товара нет возможности выбора свойств.";
//		if (! is_null($id)) {
//			$property = AdminSection::getModel(\App\Models\Property::class)->fireDisplay();
//			$property->getScopes()->push(['withProduct', $id]);
//			$property->setParameter('product_id', $id);
//		}

		$tabs = AdminDisplay::tabbed([
			'Товар' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::checkbox('status', 'Активность')->setDefaultValue(true),
				AdminFormElement::text('name', 'Название')->required(),
				AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
				AdminFormElement::multiselect('categories', 'Категории', \App\Models\Category::class)
					->setDisplay('name')
					->setLoadOptionsQueryPreparer(function ($element, $query) {
						return $query
							->where('id', 2)
							->orWhere('parent_id', 2);
					}),
				AdminFormElement::number('order', 'Сортировка')->setDefaultValue(100),

				AdminFormElement::upload('typo', 'Файл'),
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
				AdminFormElement::select('discount_id', 'Скидка', \App\Models\Discount::class)->setDisplay('name')->nullable(),
			]),
//			'Свойства' => new \SleepingOwl\Admin\Form\FormElements([$property]),
		]);
		$form->addElement($tabs);
		return $form->setHtmlAttribute('enctype', 'multipart/form-data');
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
