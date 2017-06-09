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

Route::get('api/category/{id}', function($id)
{
	return DB::table('categories')->where('id', $id)->get();
});

Route::get('api/categories', function()
{
	return DB::table('categories')->get();
});

Route::get('api/concept/{id}', function($id){
	return DB::table('concepts')->where('id', $id)->get();
});

Route::get('api/concepts/even', function()
{
	return DB::select('select * from concepts where mod(id, 2) = 0 order by id');
});

Route::get('api/concepts/odd', function()
{
	return DB::select('select * from concepts where mod(id, 2) = 1 order by id');
});

Route::get('api/concepts/firstodd', function()
{
	return DB::select('select * from concepts where mod(id, 2) = 1 order by id limit 0, 1');
});

Route::get('api/concepts/firsteven', function()
{
	return DB::select('select * from concepts where mod(id, 2) = 0 order by id limit 0, 1');
});

Route::get('api/concepts', function(){
	return DB::table('concepts')->get();
});

Route::get('api/concepts/cat/{id}', function($id)
{
	return DB::select('select A.* from concepts A where A.id in (select B.id from concept_cat_relationships B where B.cat_id = ' . $id .' )');
});

Route::get('/concept/{id}', function($id)
{
	$concepts = DB::table('concepts')->where('id', $id)->get();
	return view('welcome', compact('concepts'));
});

Route::get('/', function ()
{
	$concepts = DB::table('concepts')->get();
	return view('welcome', compact('concepts'));
});

Route::get('/concepts', function()
{
	$concepts = DB::table('concepts')->get();
	return view('welcome', compact('concepts'));
});

Route::get('/search',['uses' => 'SearchController@getSearch','as' => 'search']);

Route::get('concepts/even', function()
{
	$concepts = DB::select('select * from concepts where mod(id, 2) = 0 order by id');
	return view('welcome', compact('concepts'));
});

Route::get('concepts/cat/{id}', function($id)
{
	$concepts = DB::select('select A.* from concepts A where A.id in (select B.id from concept_cat_relationships B where B.cat_id = ' . $id .' )');
	return view('welcome', compact('concepts'));
});

Route::get('concepts/odd', function()
{
	$concepts = DB::select('select * from concepts where mod(id, 2) = 1 order by id');
	return view('welcome', compact('concepts'));
});

Auth::routes();

// stuff that requires auth middleware can go in here
Route::group(['middleware' => 'auth'], function()
{
	Route::get('/manage', function()
	{
		$user = Auth::user();
		return view('manage', compact('user'));
	});

});

Route::get('/home', 'HomeController@index')->name('home');
