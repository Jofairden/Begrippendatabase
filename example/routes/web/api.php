<?php

use App\Category;
use App\Concept;

Route::group(['prefix' => 'api'], function () {
	Route::get('/', function () {
		return view('api');
	})->name('api.index');

	Route::get('/concept/{concept}', function (Concept $concept) {
		return $concept;
	})->name('api.concept');

	Route::get('/category/{category}', function (Category $category) {
		return $category;
	})->name('api.category');

	Route::group(['prefix' => 'categories'], function () {
		Route::get('/', function () {
			return Category::get();
		})->name('api.categories');

		Route::group(['prefix' => 'sort'], function () {
			Route::get('/id', function () {
				Category::orderBy('id')->get();
			})->name('api.categories.id');

			Route::get('/id/desc', function () {
				return Category::orderBy('id', 'desc')->get();
			})->name('api.categories.id.desc');

			Route::get('/name', function () {
				return Category::orderBy('name')->get();
			})->name('api.categories.name');

			Route::get('/name/desc', function () {
				return Category::orderBy('name', 'desc')->get();
			})->name('api.categories.name.desc');
		});
	});

	Route::group(['prefix' => 'concepts'], function () {
		Route::get('/', function () {
			return Concept::get();
		})->name('api.concepts');

		Route::group(['prefix' => 'sort'], function () {
			// figure out how this works?
			/*Route::any("{slug}/first", function($request)
			{
				return route($request)->first();
			})->where('slug', '.*');*/

			Route::get('/id', function () {
				return Concept::orderBy('id')->get();
			})->name('api.concepts.id');

			Route::get('/id/desc', function () {
				return Concept::orderBy('id', 'desc')->get();
			})->name('api.concepts.id.desc');

			Route::get('/name', function () {
				return Concept::orderBy('name')->get();
			})->name('api.concepts.name');

			Route::get('/name/desc', function () {
				return Concept::orderBy('name', 'desc')->get();
			})->name('api.concepts.name.desc');


			Route::get('/info', function () {
				return Concept::orderBy('info')->get();
			})->name('info');

			Route::get('/info/desc', function () {
				return Concept::orderBy('info', 'desc')->get();
			})->name('info.desc');
		});
	});
});