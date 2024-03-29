<?php

namespace App\Http\Controllers;

use App\Term;

class PostsController extends Controller
{
	public function index()
	{
		$terms = Term::getDr("Dr%", "Co%")->get();
		return $terms;

	}

	public function show(Term $term)
	{
		return $term;
		//return view('terms.show', compact('term'));
	}

	public function fsthalf()
	{
		$terms = Term::Fsthalf()->paginate(6);
		return view('terms.index', compact('terms'));
	}

	public function lsthalf()
	{
		$terms = Term::Lsthalf()->paginate(6);
		return view('terms.index', compact('terms'));
	}

	/*
	 *
	 * */
	public function create()
	{
		return view('terms.create');
	}

	public function store()
	{
		// Create a new post using the request data
		//        $term = new Term;
		//
		//        $term->name        = request('name');
		//        $term->description  = request('description');
		//
		//        // Save it to db
		//        $term->save();

		$this->validate(request(), [
			'name' => 'required|min:2|max:55',
			'description' => 'required|max:555'
		]);

		Term::create(request(['name', 'description']));

		// Redirect to somewhere
		return redirect('/');
	}
}
