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
	    $faker = \Faker\Factory::create();
	    factory(App\User::class,         10)->create();
	    factory(App\Concept::class,     100)->create();
	    factory(App\Category::class,     25)->create();
	    factory(App\Education::class,    10)->create();
	    $concepts = \App\Concept::all();
	    $categories = \App\Category::all();
	    $cat_ids    = $categories->pluck('id')->all();
	    $educations = \App\Education::all();

	    foreach ($concepts as $concept)
	    {
		    $num = $faker->randomDigitNotNull();
		    if ($num > count($cat_ids)) {
			    $num = count($cat_ids);
		    }
		    $used = array();
		    for ($i = 0; $i < $num; $i++) {
			    $rnd_id = $faker->randomElement($cat_ids);
			    while (in_array($rnd_id, $used)) {
				    $rnd_id = $faker->randomElement($cat_ids);
			    }
			    $concept->categories()->attach($rnd_id);
			    array_push($used, $rnd_id);
		    }
	    }

	    foreach ($educations as $education)
	    {
		    $num = $faker->randomDigitNotNull();
		    if ($num > count($cat_ids)) {
			    $num = count($cat_ids);
		    }
		    $used = array();
		    for ($i = 0; $i < $num; $i++) {
			    $rnd_id = $faker->randomElement($cat_ids);
			    while (in_array($rnd_id, $used)) {
				    $rnd_id = $faker->randomElement($cat_ids);
			    }
			    $education->categories()->attach($rnd_id);
			    array_push($used, $rnd_id);
		    }
	    }

	    DB::table('permissions')->insert(
		    array(
			    array('name' => 'create', 'info' => 'Maak een begrip aan.'),
			    array('name' => 'edit', 'info' => 'Pas een begrip aan.'),
			    array('name' => 'delete', 'info' => 'Verwijder een begrip'),
			    array('name' => 'master', 'info' => 'Alle permissies.'),
			    array('name' => 'admin', 'info' => 'Administrator.'),
		    ));
    }
}
