<?php

use App\Concept;
use App\Category;
use App\Relconcat;

Route::prefix('api')
	->group(function()
{
	Route::name('api.index')
		->get('/', function()
		{
			return view('api');
		});

	Route::name('api.concept')
		->get('/concept/{concept}', function(Concept $concept)
		{
			return $concept;
		});

	Route::name('api.category')
		->get('/category/{category}', function(Category $category)
		{
			return $category;
		});

	Route::prefix('categories')
		->group(function()
		{
			Route::name('api.categories')
			->get('/', function()
			{
				return Category::all();
			});

			Route::prefix('sort')
				->group(function ()
				{
					Route::name('api.categories.id')
						->get('/id', function ()
						{
							Category::byId()->get();
						});

					Route::name('api.categories.id.desc')
						->get('/id/desc', function ()
						{
							return Category::byID("DESC")->get();
						});

					Route::name('api.categories.name')
						->get('/name', function()
						{
							return Category::byName()->get();
						});

					Route::name('api.categories.name.desc')
						->get('/name/desc', function()
						{
							return Category::byName("DESC")->get();
						});
				});
		});

	Route::prefix('concepts')
		->group(function()
		{
			Route::name('api.concepts')
				->get('/', function()
				{
					return Concept::all();
				});

			Route::prefix('sort')
				->group(function()
				{
					// figure out how this works?
//					Route::any("{slug}/first", function($request)
//					{
//						return route($request)->first();
//					})->where('slug', '.*');

					Route::name('api.concepts.id')
						->get('/id', function()
						{
							return Concept::byID()->get();
						});

					Route::name('api.concepts.id.desc')
						->get('/id/desc', function ()
						{
							return Concept::byID("DESC")->get();
						});

					Route::name('api.concepts.name')
						->get('/name', function()
						{
							return Concept::byName()->get();
						});

					Route::name('api.concepts.name.desc')
						->get('/name/desc', function()
						{
							return Concept::byName("DESC")->get();
						});


					Route::name('info')
						->get('/info', function()
						{
							return Concept::byInfo()->get();
						});

					Route::name('info.desc')
						->get('/info/desc', function()
						{
							return Concept::byInfo("DESC")->get();
						});
				});

		});
});