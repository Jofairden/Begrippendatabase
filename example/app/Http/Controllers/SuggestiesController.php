<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Concept;
use DB;

class SuggestiesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $suggestions = Suggestion::get();
        foreach($suggestions as $suggestion) { 
            $categoryNames = array();
            $categoryIDs = explode(", ", $suggestion->categories); //Convert naar int array zodat we namen kunnen ophalen uit DB.
            foreach($categoryIDs as $categoryID) {
                $categoryNames[] = DB::table('categories')->where('id', '=', $categoryID)->pluck('name')->first();
            }
            $suggestion->categories = $categoryNames;
        }
        return view('suggestions.index', compact('suggestions'));
    }

    public function post(Request $request) { 
        if($request->ajax()) {
            $suggestion = Suggestion::where('id', '=', $request->input('id'))->first();
            
            $concept = new Concept();
            $concept->name = $suggestion->name;
            $concept->info = $suggestion->info;

            $concept->save();

            $categoryIDs = explode(",", str_replace(' ', '', $suggestion->categories));
            $concept->categories()->attach($categoryIDs);
        }
    }

    public function delete(Request $request) { 
        if($request->ajax()) {
            Suggestion::Where('id', '=', $request->input('id'))->first()->delete();
            return response()->json([
                'Methode' => 'Delete',
                'Drerrie' => 'VDB', 
                'ID' => $request->input('id')
            ]);
        }
    }

}
