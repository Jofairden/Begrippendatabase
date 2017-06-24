<?php
	//Dit is voor de admin om de suggesties te accepteren, bewerken of verwijderen.
	Route::prefix('profile')
		->group(function()
		{
			Route::get('/', 'UserController@index')
				->name('profile.index');

			Route::get('/notes', 'UserController@notes')
				->name('profile.notes');
		});