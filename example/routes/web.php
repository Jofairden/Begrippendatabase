<?php
	// Basic routes
	Route::name('welcome')
		->get('/', function () {
			return view('welcome', ["concepts" => \App\Concept::paginate(15)]);
		});

	// Routes
	include('web/api.php');
	include('web/concepts.php');
	include('web/categories.php');
	include('web/educations.php');
	include('web/permissions.php');
	include('web/suggestions.php');

	// Auth
	Auth::routes();





