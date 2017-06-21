<?php
	Route::prefix('categories')
		->group(function ()
		{
			Route::name('categories.index')
				->get('/', 'CategoryController@index');

			Route::name('categories.show')
				->get('/{category}', 'CategoryController@show');
		});