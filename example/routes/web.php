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
Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::get('/concepts', 'ConceptController@index')
	->name('concepts.index');

Route::get('/concepts/{concept}', 'ConceptController@show');

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

Route::get('/suggesties', 'SuggestiesController@index');
Route::post('/suggesties', 'SuggestiesController@post');
Route::delete('/suggesties', 'SuggestiesController@delete');

Route::get('/toevoegen', 'ToevoegenController@index');
Route::post('/toevoegen', 'ToevoegenController@post');

//Route::post('/toevoegen', 'ToevoegenController@post');