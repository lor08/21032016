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
 * Class DownloadsCategory
 *
 * @property \App\Models\DownloadsCategory $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class DownloadsCategory extends Section
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
	protected $title = "Категории Файлов";

	/**
	 * @var string
	 */
	protected $alias = "downloads/categories";

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
//		return AdminDisplay::tree()->setValue('name')->setRootParentId(2);
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
