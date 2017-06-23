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
		});