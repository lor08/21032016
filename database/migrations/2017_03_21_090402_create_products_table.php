<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('slug')->unique();
			$table->text('preview_text')->nullable();
			$table->string('preview_img')->nullable();
			$table->text('detail_text')->nullable();
			$table->string('detail_img')->nullable();
			$table->unsignedInteger('views')->default(0);
			$table->unsignedInteger('order')->default(100);
			$table->boolean('status')->default(true);

			$table->unsignedInteger('producer_id')->nullable();
			$table->unsignedInteger('discount_id')->nullable();
			$table->unsignedInteger('quantity')->default(0);
			$table->float('price')->nullable();
			$table->string('color')->nullable();
			$table->string('weight')->nullable();
			$table->string('length')->nullable();
			$table->string('width')->nullable();
			$table->string('height')->nullable();
			$table->string('artikul')->nullable();
			$table->timestamps();

			$table->index([ 'producer_id', 'discount_id' ]);
		});
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
