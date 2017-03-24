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
 * Class Property
 *
 * @property \App\Models\Property $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Property extends Section
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
    protected $title = "Свойство";

    /**
     * @var string
     */
    protected $alias = "products/properties";

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
		$display = AdminDisplay::table();
		$display->with(['property_type']);
		$display->setHtmlAttribute('class', 'table-primary');
		$display->setColumns(
			AdminColumn::text('id', '#')->setWidth('30px'),
			AdminColumn::text('property_type.name', 'Свойство')->setWidth('100px'),
			AdminColumn::text('value', 'Значение')->setWidth('100px')
		);
		$display->paginate(20);
		return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
		$form = AdminForm::panel()->addBody([
			AdminFormElement::select('property_type_id', 'Свойство', \App\Models\PropertyType::class)->setDisplay('name'),
			AdminFormElement::textarea('value', 'Значение')->required(),
			AdminFormElement::hidden('product_id'),
		]);

		$form->getButtons()
			->hideCancelButton()
			->hideDeleteButton()
			->hideDeleteButton()
//			->hideSaveAndCloseButton()
			->hideSaveAndCreateButton();

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
