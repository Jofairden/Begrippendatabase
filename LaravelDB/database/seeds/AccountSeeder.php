<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
	public function run()
	{
		// Gen simple account
		App\User::create([
			'name' => 'admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('admin123')
		]);
	}
}
