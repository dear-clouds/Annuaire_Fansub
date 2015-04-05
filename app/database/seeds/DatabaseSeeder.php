<?php

// class DatabaseSeeder extends Seeder
// {

// 	*
// 	 * Run the database seeds.
// 	 *
// 	 * @return void

// 	public function run()
// 	{
// 		Eloquent::unguard();

// 		// $this->call('UserTableSeeder');
// 	}
// }

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call('UserTableSeeder');
		
		$this->command->info('Tables seeded!');
	}

}

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('categories_types')->insert(
			array(
				array('title' => 'Animes'),
				array('title' => 'Séries'),
				array('title' => 'Films'),
				array('title' => 'Mangas'),
				array('title' => 'Emissions'),
				array('title' => 'Doujinshis'),
				array('title' => 'Karaokes'),
				array('title' => 'OAV'),
				array('title' => 'Autre')
				));
	}

}