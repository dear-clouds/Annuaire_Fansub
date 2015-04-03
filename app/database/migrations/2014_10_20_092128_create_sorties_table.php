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
			$table->string('origine', 255)->nullable();
			$table->string('type', 255)->nullable();
			$table->string('access', 255)->nullable();
			$table->string('censure', 10)->nullable();
			$table->string('karaokes', 10)->nullable();
			$table->integer('user_id')->nullable();
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
