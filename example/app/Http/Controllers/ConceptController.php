<?php

namespace App\Http\Controllers;

use App\Concept;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
	public function index(Request $request)
	{
		$sort = $request->input('sort');
		$query = $request->input('query');
		$concepts = null;

		if ($sort == "desc")
		{
			$concepts = Concept::byName("DESC");
		}
		else
		{
			$concepts = Concept::byName("ASC");
		}

		if (isset($query))
		{
			$concepts = $concepts->where('name', $query)
				->orWhere('name', 'like', '%' . $query . '%');
		}

		$concepts = $concepts->paginate(15);
		return view('concepts.index', compact('concepts'));
	}

	public function show(Concept $concept)
	{
		return view('concepts.show', compact('concept'));
	}

	public function ajax(Request $request)
	{
		if ($request->has('query'))
		{
			$query = $request->input('query');
			$concepts = Concept::where('name', 'like', '%' . $query . '%')->paginate(15);
		} else {
			$concepts = Concept::paginate(15);
		}

		if ($request->ajax()) {
			return response()->json([
				'current_page' => $concepts->currentPage(),
				'total' => $concepts->total(),
				'from' => $concepts->firstItem(),
				'to' => $concepts->lastItem(),
				'html' =>  view('components.concepts.ajax', compact('concepts'))->render(),
			]);
		}

		return view('welcome', compact('concepts'));
	}
}
