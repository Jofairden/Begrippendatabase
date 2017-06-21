<?php
	Route::prefix('concepts')
		->group(function()
		{
			Route::name('concepts.index')
				->get('/', 'ConceptController@index');

			Route::name('concepts.show')
				->get('/{concept}', 'ConceptController@show');

			Route::name('concepts.ajax.request')
				->get('/ajax/request', 'ConceptController@ajax');

			Route::middleware('permission:5')->group(function ()
			{
				Route::prefix('create')
					->group(function()
					{
						Route::name('concepts.create')
							->get('/test', 'ToevoegenController@index');

						Route::post('/', 'ToevoegenController@post');
					});
			});
		});