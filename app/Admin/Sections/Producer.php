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
 * Class Producer
 *
 * @property \App\Models\Producer $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Producer extends Section
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
    protected $title = "Производители";

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
		$tabs = AdminDisplay::tabbed([
			'Производитель' => new \SleepingOwl\Admin\Form\FormElements([
				AdminFormElement::checkbox('status', 'Активность')->setDefaultValue(true),
				AdminFormElement::text('name', 'Название')->required(),
				AdminFormElement::text('slug', 'Символьный код (Заполняется автоматически)')->unique(),
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
