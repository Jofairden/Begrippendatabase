<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Suggestion;
use App\Concept;
use App\Category;
use App\Mail\Denied;
use Illuminate\Http\Request;
use App\Http\Controllers\ConceptController;

class SuggestiesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:1'); //Alleen voor admins
    }

    public function index(Request $request) {
        $suggestions = Suggestion::get();
        foreach($suggestions as $suggestion) { 
            $categoryNames = array();
            $categoryIDs = explode(",", $suggestion->categories); //Convert naar int array zodat we namen kunnen ophalen uit DB.
            foreach($categoryIDs as $categoryID) {
                $categoryNames[] = DB::table('categories')->where('id', '=', $categoryID)->pluck('name')->first();
            }
            $suggestion->categories = $categoryNames;
        } 
        //dd($suggestions);
        return view('suggestions.index', compact('suggestions'));
    } 

    public function post(Request $request) { 
        $suggestion = Suggestion::where('id', '=', $request->input('id'))->first();

        $viewSuggestion = action('ConceptController@ajax', ["query" => $suggestion->name]); //Haal URL op voor nieuwe begrip
    
        $concept = new Concept();
        $concept->name = $suggestion->name;
        $concept->info = $suggestion->info;

        $concept->save();

        $categoryIDs = explode(",", str_replace(' ', '', $suggestion->categories)); //Maak van de comma seperated suggestie categories string een array
        $concept->categories()->attach($categoryIDs);

        Mail::send('emails.accepted', compact('viewSuggestion'), function($message) use($suggestion) {
            $message->from("pbb@digischool.nl", "Steef Steneken");
            $message->to($suggestion->email);
        });

        $suggestion->delete();
        
        if(!$request->ajax()) {
            return redirect()->action("SuggestiesController@index");
        }
    }

    public function edit(int $id) { 
        $data = array();
        
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->categories = explode(',', $suggestion->categories);
        $categories = Category::all();

        $data['suggestion'] = $suggestion; 
        $data['categories'] = $categories;
        return view('suggestions.edit', compact('data'));
    }

    public function saveEdit(Request $request) {
        $suggestion = Suggestion::find($request->input('id'));
        if(!empty($request->input('name'))) $suggestion->name = $request->input('name');
        if(!empty($request->input('info'))) $suggestion->info = $request->input('info');
        if(!empty($request->input('categories'))) $suggestion->categories = implode(',', $request->input('categories'));
        
        $suggestion->save();

        $this->post($request);
        return redirect()->action('SuggestiesController@index');
    }

    public function delete(Request $request) { 
        if($request->ajax()) {
            $suggestion = Suggestion::Where('id', '=', $request->input('id'))->first();
            
            Mail::to($suggestion->email)->send(new Denied($request->input('reason')));
            
            $suggestion->delete();
        }
    }

}
