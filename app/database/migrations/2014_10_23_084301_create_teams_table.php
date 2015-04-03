<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function($table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->string('url', 255)->nullable();
			$table->string('chefs', 255)->nullable();
			$table->date('creation')->nullable();
			$table->string('logo', 255)->nullable();
			$table->longtext('description')->nullable();
			$table->string('header', 255)->nullable();
			$table->string('genres', 255)->nullable();
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
		Schema::drop('teams');
	}

}
