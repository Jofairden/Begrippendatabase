<?php

namespace App\Http\Controllers;

use App\Concept;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$sort = $request->input('sort');
		$query = $request->input('query');
		$categories = null;
		if ($sort == "desc")
		{
			$categories = Category::byName("DESC");
		}
		else if ($sort == "most")
		{
			$categories = Category::select(\DB::raw('categories.*, count(*) as `aggregate`'))
				->join('category_concept', 'categories.id','=', 'category_concept.category_id')
				->groupBy('category_id')
				->orderBy('aggregate', 'desc');
		}
		else if ($sort == "least")
		{
			$categories = Category::select(\DB::raw('categories.*, count(*) as `aggregate`'))
				->join('category_concept', 'categories.id','=', 'category_concept.category_id')
				->groupBy('category_id')
				->orderBy('aggregate', 'asc');
		}
		else
		{
			$categories = Category::byName("ASC");
		}

		if (isset($query))
		{
			$categories = $categories->where('name', $query)
				->orWhere('name', 'like', '%' . $query . '%');
		}

		$categories = $categories->get();

		return view('categories.index', compact('categories'));
	}

	public function show(Category $category)
	{
		return view('categories.show', compact('category'));
	}

}
