<?php
	//Dit is voor de admin om de suggesties te accepteren, bewerken of verwijderen.
	Route::prefix('suggestions')
		->group(function()
		{
			Route::get('/', 'SuggestiesController@index');
			Route::post('/', 'SuggestiesController@post');

			Route::get('/edit/{id}', 'SuggestiesController@edit');
			Route::post('/edit/{id}', 'SuggestiesController@saveEdit');
			Route::delete('/', 'SuggestiesController@delete');
		});