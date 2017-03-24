<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Permit;
use App\Models\Producer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\Role;
use App\Models\User;
use SleepingOwl\Admin\Navigation\Page;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

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
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
		$this->registerPolicies('App\\Admin\\Policies\\');

        parent::boot($admin);

		$this->registerNavigation();
    }

	private function registerNavigation()
	{
		\AdminNavigation::setFromArray([
			[
				'title' => 'Каталог',
				'icon' => 'fa fa-user',
				'priority' => 500,
				'pages' => [
					(new Page(ProductCategory::class))->setPriority(0)->setTitle('Категории Товаров')->setIcon('fa fa-list'),
					(new Page(Product::class))->setPriority(10)->setTitle('Товары')->setIcon('fa fa-list'),
					(new Page(Producer::class))->setPriority(20)->setTitle('Производители')->setIcon('fa fa-list'),
					(new Page(Discount::class))->setPriority(30)->setTitle('Скидки')->setIcon('fa fa-list'),
					(new Page(PropertyType::class))->setPriority(40)->setTitle('Свойства')->setIcon('fa fa-list'),
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
