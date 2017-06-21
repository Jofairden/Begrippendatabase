<?php
	Route::prefix('permissions')
		->group(function()
		{
			Route::name('permissions.index')
				->get('/', 'PermissionController@index');

			Route::name('permissions.ajax.request')
				->get('/permissions/ajax/request', 'PermissionController@ajax');
		});