<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('properties', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('product_id');
			$table->unsignedInteger('property_type_id');
			$table->text('value');
			$table->timestamps();

			$table->index([ 'product_id' , 'property_type_id']);
		});
		Schema::create('property_types', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('properties');
		Schema::dropIfExists('property_types');
    }
}
