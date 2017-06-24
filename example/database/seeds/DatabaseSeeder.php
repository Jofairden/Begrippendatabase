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
    	//$conceptsDataPath = base_path(). "\database\sql\concepts.sql";
	    //$conceptsData = fopen($conceptsDataPath, "r") or die("Unable to open file!");
	    //DB::query(DB::raw(fread($conceptsData,filesize($conceptsDataPath))));
	    //fclose($conceptsData);

	    // $this->call(UsersTableSeeder::class);
        $faker = \Faker\Factory::create();
        $users = factory(App\User::class,           10)->create();
        $concepts = factory(App\Concept::class,    100)->create();
        $categories = factory(App\Category::class,  25)->create();
        $educations = factory(App\Education::class, 10)->create();

        $cat_ids    = $categories->pluck('id')->all();

        foreach ($concepts as $concept)
        {
		    $num = $faker->numberBetween(1, count($cat_ids));
		    $used = array();
		    for ($i = 0; $i < $num; $i++) {
			    $rnd_id = $faker->randomElement($cat_ids);
			    while (in_array($rnd_id, $used))
				    $rnd_id = $faker->randomElement($cat_ids);
			    $concept->categories()->attach($rnd_id);
			    array_push($used, $rnd_id);
		    }
        }

        foreach ($educations as $education)
        {
		    $num = $faker->numberBetween(1, count($cat_ids));
		    $used = array();
		    for ($i = 0; $i < $num; $i++) {
			    $rnd_id = $faker->randomElement($cat_ids);
			    while (in_array($rnd_id, $used))
				    $rnd_id = $faker->randomElement($cat_ids);
			    $education->categories()->attach($rnd_id);
			    array_push($used, $rnd_id);
		    }
        }

	    DB::table('permissions')->insert(
		    array(
			    array('name' => 'create', 'info' => 'Maak een begrip aan.'),
			    array('name' => 'edit', 'info' => 'Pas een begrip aan.'),
			    array('name' => 'delete', 'info' => 'Verwijder een begrip'),
			    array('name' => 'master', 'info' => 'Alle permissies: create, edit, delete.'),
			    array('name' => 'admin', 'info' => 'Administrator.'),
		    ));

        DB::table('notes')->insert(
        	array(
        		array('name' => 'Lorum Ipsum', 'info' => 'dolor', 'concept_id' => 1, 'user_id' => 1),
        		array('name' => 'Sit', 'info' => 'amet', 'concept_id' => 1, 'user_id' => 1),
        		array('name' => 'consectetur ', 'info' => 'adipiscing elit', 'concept_id' => 2, 'user_id' => 1),
			)
		);
    }
}
