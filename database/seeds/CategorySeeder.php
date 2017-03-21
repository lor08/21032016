<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$attributes = array(
			'name' => "Каталог",
			'slug' => "catalog",
		);
		$node = new Category($attributes);
		$node->save();
    }
}
