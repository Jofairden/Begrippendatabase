<?php

use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
	public function run()
	{
		App\Term::truncate();
		$faker = Faker\Factory::create();

		for ($i = 0; $i < 50; $i++)
		{
			App\Term::create([
				'name' => $faker->title . ' ' . $faker->unique()->username,
				'description' => $faker->paragraph(4)
			]);
		}
	}
}
