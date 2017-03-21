<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('slug');
            $table->timestamps();
        });

		Schema::create('permit_role', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('permit_id');
			$table->integer('role_id');
			$table->timestamps();

			$table->index([ 'permit_id', 'role_id' ]);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
		Schema::dropIfExists('permit_role');
	}
}
