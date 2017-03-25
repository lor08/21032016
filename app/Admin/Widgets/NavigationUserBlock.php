<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 25.03.2017
 * Time: 16:00
 */

namespace App\Admin\Widgets;

use AdminTemplate;
use Sentinel;
use SleepingOwl\Admin\Widgets\Widget;

class NavigationUserBlock extends Widget
{
	/**
	 * Get content as a string of HTML.
	 *
	 * @return string
	 */
	public function toHtml()
	{
		return view('admin.auth.navbar', [
			'user' => Sentinel::getUser()
		])->render();
	}
	/**
	 * @return string|array
	 */
	public function template()
	{
		return AdminTemplate::getViewPath('_partials.header');
	}
	/**
	 * @return string
	 */
	public function block()
	{
		return 'navbar.right';
	}
}