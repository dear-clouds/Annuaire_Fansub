<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sorties', function($table)
		{
			$table->increments('id');
			$table->string('title', 64);
			$table->longtext('description')->nullable();
			$table->string('team', 64)->nullable();
			$table->string('qualite', 255)->nullable();
			$table->string('username', 255)->nullable();
			$table->string('categorie', 255)->nullable();
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
		Schema::drop('sorties');
	}

}
