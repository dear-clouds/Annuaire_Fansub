<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function($table)
		{
			$table->increments('id');
			$table->string('name', 500)->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('sortie_id')->nullable();
			$table->string('username', 255)->nullable();
			$table->string('url', 255)->nullable();
			$table->string('extension', 255)->nullable();
			$table->string('size', 255)->nullable();
			$table->string('type', 255)->nullable();
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
		Schema::drop('images');
	}

}
