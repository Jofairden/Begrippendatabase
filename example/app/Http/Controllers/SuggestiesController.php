<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Suggestion;
use App\Concept;
use App\Mail\Denied;
use Illuminate\Http\Request;

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

            $viewSuggestion = action('ConceptController@index', ["query" => $suggestion->name]);
        
            $concept = new Concept();
            $concept->name = $suggestion->name;
            $concept->info = $suggestion->info;

            $concept->save();

            $categoryIDs = explode(",", str_replace(' ', '', $suggestion->categories));
            $concept->categories()->attach($categoryIDs);

            Mail::send('emails.accepted', compact('viewSuggestion'), function($message) use($suggestion) {
                $message->from("pbb@digischool.nl", "Steef Steneken");
                $message->to($suggestion->email);
            });

            $suggestion->delete();
        }
    }

    public function edit($id) { 
        
    }

    public function delete(Request $request) { 
        if($request->ajax()) {
            $suggestion = Suggestion::Where('id', '=', $request->input('id'))->first();
            
            Mail::to($suggestion->email)->send(new Denied($request->input('reason')));
            
            $suggestion->delete();
        }
    }

}
