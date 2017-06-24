<?php
	
	// Basic routes
	Route::name('welcome')
		->get('/', 'ConceptController@ajax');

	// Routes

	include('web/api.php');
	include('web/concepts.php');
	include('web/categories.php');
	include('web/educations.php');
	include('web/permissions.php');
	include('web/suggest.php');
	include('web/suggestions.php');
	include('web/notes.php');

	// Auth
	Auth::routes();

	// Locale route
	Route::get('setlocale/{locale}', function ($locale) {
		if (in_array($locale, \Config::get('app.locales'))) {
			Session::put('locale', $locale);
		}
		return redirect()->back();
	});
