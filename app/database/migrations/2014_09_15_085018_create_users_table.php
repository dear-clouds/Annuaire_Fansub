<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username', 64);
			$table->string('password', 64);
			$table->string('email', 64);
			$table->string('role', 64);
			$table->string('avatar', 255)->nullable();
			$table->string('name', 64)->nullable();
			$table->date('birthdate')->nullable();
			$table->longtext('bio')->nullable();
			$table->string('team', 64)->nullable();
			$table->string('postes', 255)->nullable();
			$table->string('website', 255)->nullable();
			$table->string('code', 80);
			$table->integer('active');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
