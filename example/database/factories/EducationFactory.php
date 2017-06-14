<?php

use Faker\Generator as Faker;

	$factory->define(App\Education::class, function (Faker $faker) {
		return [
			'name' => $faker->unique()->word,
			'info' => $faker->text,
		];
	});