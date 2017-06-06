<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(UsersTableSeeder::class);

		if (env('APP_ENV') != 'production')
		{
			//Model::ungaurd();

			$this->call(TermSeeder::class);
			$this->call(AccountSeeder::class);
		}
	}
}
