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
			'name' => "Каталог товаров",
			'slug' => "catalog-products",
		);
		$node = new Category($attributes);
		$node->save();
		$attributes = array(
			'name' => "Каталог файлов",
			'slug' => "catalog-files",
		);
		$node = new Category($attributes);
		$node->save();
		$attributes = array(
			'name' => "Новости",
			'slug' => "news",
		);
		$node = new Category($attributes);
		$node->save();
    }
}
