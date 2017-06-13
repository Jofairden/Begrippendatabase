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

	public static function multipleRelations(Category $category)
	{
		//\DB::enableQueryLog();

		$diff1 = self::relationCount($category);

		$diff2 = self::multiRelationCount($category);

		//dd($diff2->occurences);
		//dd(\DB::getQueryLog());

		dd($diff1 -  $diff2);

//			'select (select  from category_concept
//where category_id=' . $category->id . ')
//-
//(select count(*)
//from category_concept
//where category_id=' . $category->id . '
//and concept_id in
//(
//    select concept_id
//    from category_concept
//    where category_id != ' . $category->id . '
//)
//order by concept_id)
//as difference')
	}

}
