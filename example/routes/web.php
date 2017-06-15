<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// API routes
include('web/api.php');

Route::name('welcome')
	->get('/', function () {
    return view('welcome', ["concepts" => \App\Concept::paginate(15)]);
});

Route::get('/concepts', 'ConceptController@index')
	->name('concepts.index');

Route::get('/concepts/{concept}', 'ConceptController@show');

Route::name('concepts.ajax.request')
	->get('/concepts/ajax/request', 'ConceptController@ajax');


Route::prefix('categories')
	->group(function ()
	{
		Route::name('categories.index')
			->get('/', 'CategoryController@index');

		Route::name('categories.show')
			->get('/{category}', 'CategoryController@show');
	});

Route::prefix('educations')
	->group(function ()
	{
		Route::name('educations.index')
			->get('/', 'EducationController@index');

		Route::name('educations.show')
			->get('/{education}', 'EducationController@show');
	});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');