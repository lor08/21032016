<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 24.03.17
 * Time: 17:18
 */

namespace App\Admin\Policies;

use App\Admin\Sections\User as SectionUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSectionModelPolicy
{
	use HandlesAuthorization;

	/**
	 * @param User $user
	 * @param string $ability
	 * @param SectionUser $section
	 * @param User $item
	 *
	 * @return bool
	 */
	public function before(User $user, $ability, SectionUser $section, User $item = null)
	{
		if ($user->isSuperAdmin()) {
			if ($ability != 'display' && $ability != 'create' && !is_null($item) && $item->id <= 2) {
				return false;
			}
			return true;
		}
	}

	/**
	 * @param User $user
	 * @param SectionUser $section
	 * @param User $item
	 * @return bool
	 */
	public function display(User $user, SectionUser $section, User $item)
	{
		return true;
	}
	/**
	 * @param User $user
	 * @param SectionUser $section
	 * @param User $item
	 *
	 * @return bool
	 */
	public function edit(User $user, SectionUser $section, User $item)
	{
		return $item->id > 2;
	}

	/**
	 * @param User $user
	 * @param SectionUser $section
	 * @param User $item
	 * @return bool
	 */
	public function delete(User $user, SectionUser $section, User $item)
	{
		return $item->id > 2;
	}
}