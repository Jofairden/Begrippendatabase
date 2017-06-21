<?php
	Route::prefix('educations')
		->group(function ()
		{
			Route::name('educations.index')
				->get('/', 'EducationController@index');

			Route::name('educations.show')
				->get('/{education}', 'EducationController@show');
		});