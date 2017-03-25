<?php

namespace App\Admin\Sections;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use AdminColumnEditable;
use AdminDisplayFilter;
use AdminColumnFilter;
use AdminFormElement;
use AdminDisplay;
use AdminColumn;
use AdminForm;

/**
 * Class NewsCategory
 *
 * @property \App\Models\NewsCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class NewsCategory extends Section
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
	protected $title = "Категории Новостей";

	/**
	 * @var string
	 */
	protected $alias = "news/categories";

	/**
	 * @return DisplayInterface
	 */
	public function onDisplay()
	{
		return AdminDisplay::table()
			->setApply(function ($query) {
				$query
					->where('id', 3)
					->orWhere('parent_id', 3);
//				$query->orderBy('id', 'DESC');
			})
			->setHtmlAttribute('class', 'table-primary')
			->setColumns([
				AdminColumn::link('id', '#')->setWidth('30px'),
				AdminColumn::link('name')->setLabel('Название'),
			])->paginate(20);
//		return AdminDisplay::tree()->setValue('name')->setRootParentId(3);
	}

	/**
	 * @param int $id
	 *
	 * @return FormInterface
	 */
	public function onEdit($id)
	{
		return AdminForm::panel()->addBody([
			AdminFormElement::text('name', 'Название')->required(),
			AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
			AdminFormElement::select('parent_id', 'Родитель', \App\Models\Category::class)
				->setLoadOptionsQueryPreparer(function ($element, $query) {
					return $query
						->where('id', '!=', $element->getModel()->id);
				})
				->setDisplay('name')
				->nullable(),

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
