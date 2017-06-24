<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NoteController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function create()
	{
		return view('notes.create');
	}

	public function store(Request $request)
	{
		// Store form data to session
		$request->flashExcept('_token', 'user_id');

		$this->validate($request,
			[
				'name' => ['required', 'min:2', 'max:55', Rule::unique('notes', 'name')->where(function($query) use($request)
				{
					$query->where('concept_id', $request->input('concept_id','0'));
				})],
				'info' => 'required|min:2|max:555',
				'concept_id' => 'required|numeric|exists:concepts,id',
				'user_id' => 'required|numeric|exists:users,id',
			]);

		Note::create($request->except('_token'));

		return redirect('/')->withInput($request->except('_token', 'user_id'));
	}

	public function edit($id)
	{
		$note = Note::findOrFail($id);
		return view('notes.edit', compact('note'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request,
			[
				'name' => ['required', 'min:2', 'max:55', Rule::unique('notes', 'name')->where(function($query) use($request)
				{
					$query->where('concept_id', $request->input('concept_id','0'));
				})],
				'info' => 'required|min:2|max:555',
			]);

		$note = Note::findOrFail($id);
		$note->fill($request->only(['name', 'info']));
		$note->save();

		$request->session()->flash('alert-success', 'Notitie aangepast!');

		return view('notes.edit', compact('note'));
	}

	public function delete($id)
	{
		$note = Note::findOrFail($id);
		return view('notes.delete', compact('note'));
	}

	public function destroy(Request $request, $id)
	{
		Note::destroy($id);

		$request->session()->flash('alert-success', 'Notitie is verwijderd!');

		return redirect( route('welcome'));
	}
}
