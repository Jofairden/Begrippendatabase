<?php

namespace App\Http\Controllers;

use App\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
	public function getSearch()
	{
		//get keywords input for search
		$keyword=  Input::get('q');

		//search that student in Database
		$concepts = Concept::where('name', 'like', '%' . $keyword . '%')->get();

		//return display search result to user by using a view
		return View::make('welcome', compact('concepts'));
	}
}
