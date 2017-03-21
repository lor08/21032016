<?php

namespace App\Providers;

use App\Models\Permit;
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
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        parent::boot($admin);

		$this->registerNavigation();
    }

	private function registerNavigation()
	{
		\AdminNavigation::setFromArray([
			[
				'title' => 'Пользователи',
				'icon' => 'fa fa-user',
				'priority' => 9000,
				'pages' => [
					(new Page(User::class))->setPriority(0)->setTitle('Список')->setIcon('fa fa-list'),
					(new Page(Role::class))->setPriority(10)->setTitle('Роли')->setIcon('fa fa-users'),
					(new Page(Permit::class))->setPriority(20)->setTitle('Права')->setIcon('fa fa-user-secret'),
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
