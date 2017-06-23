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

	// Auth
	Auth::routes();
