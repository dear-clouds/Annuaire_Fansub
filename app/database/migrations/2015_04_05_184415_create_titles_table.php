<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('titles', function($table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('original_title', 255);
			$table->string('alias', 255);
			$table->longtext('synopsis')->nullable();
			$table->string('categorie', 255)->nullable();
			$table->string('genres')->nullable();
			$table->integer('episodes')->nullable();
			$table->date('date_start')->nullable();
			$table->date('date_end')->nullable();

			$table->integer('user_id')->nullable();
			$table->string('username', 255)->nullable();
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
		Schema::drop('titles');
	}

}
