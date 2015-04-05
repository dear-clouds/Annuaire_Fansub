<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreenshotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('screenshots', function($table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->integer('title_id');
			$table->integer('team_id');
			$table->string('team', 255);
			$table->time('time');
			$table->string('qualite', 255);
			$table->string('alias', 10);
			$table->string('type', 255)->nullable();
			$table->string('censure', 10)->nullable();
			$table->string('karaokes', 10);
			$table->integer('user_id')->nullable();
			$table->string('username', 255);
			$table->string('categorie', 255);
			$table->string('url', 255)->nullable();
			$table->string('extension', 255)->nullable();
			$table->string('size', 255)->nullable();
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
		Schema::drop('screenshots');
	}

}
