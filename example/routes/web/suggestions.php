<?php
	Route::prefix('suggestions')
		->group(function()
		{
			Route::get('/', 'SuggestiesController@index');
			Route::post('/', 'SuggestiesController@post');

			Route::get('/{id}', 'SuggestiesController@edit');
			Route::delete('/', 'SuggestiesController@delete');
		});