<?php

namespace App\Http\Controllers;

use App\Concept;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
	public function index()
	{
		$concepts = Concept::paginate(15);
		return view('concepts.index', compact('concepts'));
	}

	public function show(Concept $concept)
	{
		return view('concepts.show', compact('concept'));
	}

	public function search(Request $request)
	{
		// First we define the error message we are going to show if no keywords
		// existed or if no results found.
		$error = ['error' => 'No results found, please try with different keywords.'];

		// Making sure the user entered a keyword.
		if($request->has('q')) {

			// Using the Laravel Scout syntax to search the products table.
			$concepts = Concept::search($request->get('q'))->orderBy('name')->paginate(15);

			// If there are results return them, if none, return the error message.
			return $concepts->count()
				? view('concepts.index', compact('concepts'))
				: $error;

		}

		// Return the error message if no keywords existed
		return $error;
	}
}