<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

/**
 * Class Discount
 *
 * @property \App\Models\Discount $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Discount extends Section
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
    protected $title = "Скидки";

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
		return AdminForm::panel()->addBody([
			AdminFormElement::text('name', 'Name')->required(),
			AdminFormElement::select('type', 'Тип')->setOptions(['numeric' => "Число", 'percent' => "Процент"]),
			AdminFormElement::text('value', 'Значение'),
			AdminFormElement::text('product_id', 'Продукт'),

		]);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
