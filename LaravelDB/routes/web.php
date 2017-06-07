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

Route::get('/', 'TermController@index');
Route::get('/terms/', 'TermController@index');
//Route::get('terms')
Route::get('/term/{term}', 'TermController@show');
Route::get('/terms/fsthalf', 'TermController@fsthalf');
Route::get('/terms/lsthalf', 'TermController@lsthalf');
Route::get('/terms/create', 'TermController@create');

Route::post('/terms/', 'TermController@store');