<?php

namespace App\Http\Controllers;

use App\Concept;
use App\Category;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
	public function index(Request $request)
	{
		$concepts = Concept::paginate(15);
		return view('concepts.index', compact('concepts'));
	}

	public function show(Concept $concept)
	{
		return view('concepts.show', compact('concept'));
	}

	public function ajax(Request $request)
	{
		$concepts = null;

		if ($request->has('query'))
		{
			$query = $request->input('query');
			$concepts = Concept::where('name', 'like', '%' . $query . '%');
		}

		if ($request->has('sort'))
		{
			$sort = $request->input('sort');
			if ($sort == "sortNameASC")
			{
				if ($concepts === null)
					$concepts = Concept::orderBy('name', 'ASC');
				else
					$concepts = $concepts->orderBy('name', 'ASC');
			}
			else if ($sort == "sortNameDESC")
			{
				if ($concepts === null)
					$concepts = Concept::orderBy('name', 'DESC');
				else
					$concepts = $concepts->orderBy('name', 'DESC');
			}
		}

		if ($concepts === null)
			$concepts = Concept::orderBy('name', 'ASC')->paginate(15);
		else
			$concepts = $concepts->paginate(15);

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

	public function edit(int $id) {
		$concept = Concept::findOrFail($id);
		$data['concept'] = Concept::findOrFail($id);
		$data['categories'] = Category::all();
		$data['categoryIds'] = array();

		foreach($data['concept']->categories as $category) { 
			$data['categoryIds'][] = $category->id;
		}

		return view('concepts.edit', compact('data'));
	}

	public function saveEdit(Request $request) { 
		$concept = Concept::findOrFail($request->input('id'));
		
		if(!empty($request->input('name'))) $concept->name = $request->input('name');
		if(!empty($request->input('info'))) $concept->info = $request->input('info');

		$concept->save();

		if($request->input('categories') == null) { 
			$concept->categories()->detach();
			return redirect('/');
		} 

		foreach($concept->categories as $category) { 
			if(!in_array($category->id, $request->input('categories'))) {
				$concept->categories()->detach($category->id); //Verwijder uit DB als category niet meer voorkomt in update.
			}
		}

		$conceptCats = $concept->categories->pluck('id');

		foreach($request->input('categories') as $category) {
			if(!$conceptCats->contains($category)) {
				$concept->categories()->attach($category);
			}
		}

		return redirect('/');
	}

	public function delete(int $id) {
		$concept = Concept::findOrFail($id);
		$concept->categories()->detach();
		$concept->delete();

		return;
	}
}
