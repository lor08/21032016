<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
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

			$table->unsignedInteger('file_id')->nullable();
			$table->unsignedInteger('discount_id')->nullable();
			$table->float('price')->nullable();
			$table->timestamps();

			$table->index([ 'file_id', 'discount_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloads');
    }
}
