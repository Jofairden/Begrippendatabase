<?php
	Route::prefix('concepts')
		->group(function()
		{
			Route::name('concepts.index')
				->get('/', 'ConceptController@ajax');

			Route::name('concepts.show')
				->get('/{concept}', 'ConceptController@show');

			Route::name('concepts.ajax.request')
				->get('/ajax/request', 'ConceptController@ajax');

			Route::name('concepts.edit')
				->get('/edit/{id}', 'ConceptController@edit')->middleware('auth', 'role:1');

			Route::name('concepts.edit.save')
				->post('/edit/{id}', 'ConceptController@saveEdit')->middleware('auth', 'role:1');

			Route::name('concepts.delete')
				->delete('/delete/{id}', 'ConceptController@delete')->middleware('auth', 'role:1');
		});