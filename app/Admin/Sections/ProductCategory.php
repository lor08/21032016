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
 * Class ProductCategory
 *
 * @property \App\Models\ProductCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class ProductCategory extends Section
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
    protected $title = "Категории Товаров";

    /**
     * @var string
     */
    protected $alias = "products/categories";

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
//		return AdminDisplay::tree()->setValue('name')->setRootParentId(1);
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
			AdminFormElement::select('parent_id', 'Parent_id', \App\Models\Category::class)
				->setLoadOptionsQueryPreparer(function ($element, $query) {
					return $query
						->where('id', '!=', $element->getModel()->id);
				})
				->setDisplay('name')
				->nullable(),
			AdminFormElement::text('slug', 'Slug')->unique(),

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
