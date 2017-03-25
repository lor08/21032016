<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Downloads;
use App\Models\DownloadsCategory;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Permit;
use App\Models\Producer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Role;
use App\Models\User;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Navigation\Page;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{
	protected $widgets = [
		\App\Admin\Widgets\DashboardMap::class,
		\App\Admin\Widgets\NavigationUserBlock::class,
	];

	/**
	 * @var array
	 */
	protected $sections = [
		Permit::class => 'App\Admin\Sections\Permit',
		Role::class => 'App\Admin\Sections\Role',
		User::class => 'App\Admin\Sections\User',
		Category::class => 'App\Admin\Sections\Category',
		Product::class => 'App\Admin\Sections\Product',
		ProductCategory::class => 'App\Admin\Sections\ProductCategory',
		Producer::class => 'App\Admin\Sections\Producer',
		Discount::class => 'App\Admin\Sections\Discount',
		PropertyType::class => 'App\Admin\Sections\PropertyType',
		Property::class => 'App\Admin\Sections\Property',
		Downloads::class => 'App\Admin\Sections\Downloads',
		DownloadsCategory::class => 'App\Admin\Sections\DownloadsCategory',
		News::class => 'App\Admin\Sections\News',
		NewsCategory::class => 'App\Admin\Sections\NewsCategory',
	];

	/**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
//		$this->loadViewsFrom(app_path("Admin/resources/views"), 'admin');
		$this->registerPolicies('App\\Admin\\Policies\\');
		parent::boot($admin);
		$this->registerNavigation();
		$this->app->call([$this, 'registerViews']);
	}

	/**
	 * @param WidgetsRegistryInterface $widgetsRegistry
	 */
	public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
	{
		foreach ($this->widgets as $widget) {
			$widgetsRegistry->registerWidget($widget);
		}
	}

	private function registerNavigation()
	{
		\AdminNavigation::setFromArray([
			[
				'title' => 'Каталог товаров',
				'icon' => 'fa fa-user',
				'priority' => 500,
				'pages' => [
					(new Page(ProductCategory::class))->setPriority(0)->setTitle('Категории')->setIcon('fa fa-folder'),
					(new Page(Product::class))->setPriority(10)->setTitle('Список')->setIcon('fa fa-list'),
					(new Page(Producer::class))->setPriority(20)->setTitle('Производители')->setIcon('fa fa-list'),
					(new Page(Discount::class))->setPriority(30)->setTitle('Скидки')->setIcon('fa fa-percent'),
					(new Page(PropertyType::class))->setPriority(40)->setTitle('Свойства')->setIcon('fa fa-list'),
				]
			],
			[
				'title' => 'Каталог файлов',
				'icon' => 'fa fa-files-o',
				'priority' => 600,
				'pages' => [
					(new Page(DownloadsCategory::class))->setPriority(0)->setTitle('Категории')->setIcon('fa fa-folder'),
					(new Page(Downloads::class))->setPriority(10)->setTitle('Список')->setIcon('fa fa-list'),
				]
			],
			[
				'title' => 'Новости',
				'icon' => 'fa fa-newspaper-o',
				'priority' => 700,
				'pages' => [
					(new Page(NewsCategory::class))->setPriority(0)->setTitle('Категории')->setIcon('fa fa-folder'),
					(new Page(News::class))->setPriority(10)->setTitle('Список')->setIcon('fa fa-list'),
				]
			],
			[
				'title' => 'Пользователи',
				'icon' => 'fa fa-user',
				'priority' => 9100,
				'pages' => [
					(new Page(User::class))->setPriority(0)->setTitle('Список')->setIcon('fa fa-list'),
					(new Page(Role::class))->setPriority(10)->setTitle('Роли')->setIcon('fa fa-users'),
					(new Page(Permit::class))->setPriority(20)->setTitle('Права')->setIcon('fa fa-user-secret'),
				]
			],
			[
				'title' => 'Настройки',
				'icon' => 'fa fa-cog',
				'priority' => 9200,
				'pages' => [
//					[
//						'title' => 'Глобальные настройки',
//						'icon' => 'fa fa-cog',
//						'url' => route('admin.setting'),
//						'priority' => 0,
//					],
					(new Page(Category::class))->setPriority(10)->setTitle('Дерево категорий')->setIcon('fa fa-folder'),
				]
			],
			[
				'title' => 'Выход',
				'icon' => 'fa fa-sign-out',
				'priority' => 10000,
				'url' => url('/logout')
			]
		]);
	}
}
