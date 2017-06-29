<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Mail\Suggested;
use DB;
use App\Concept;
use App\User;

class ToevoegenController extends Controller
{
    public function index() {
        $categories = Category::all();
        return View("toevoegen.index", compact('categories'));
    }

    public function post(Request $request) {
        $count = DB::table('categories')->count();

        $name = $request->input('begripname');
        $info = $request->input('omschrijving');
        $email = $request->input('email');
        $categories = $request->input('categories');   

        if(Auth::check() && User::hasRole(Auth::id(), 1)) {
            $concept = new Concept();
            $concept->name = $name;
            $concept->info = $info;
            $concept->save();

            $concept->categories()->attach($request->input('categories'));

            return redirect('/');
        }

        DB::table('suggested')->insert(
            [
                'name' => $name,
                'info' => $info,
                'categories' => implode(",", $categories), //Eerst opslaan als comma seperated. Komen in koppeltabel als begrip is geaccepteerd.
                'email' => $email
            ]
        );

        $categoryNames = array();
        foreach($categories as $category) {
            //Haal alle categorie namen op voor in de e-mail;
            $categoryNames[] = DB::table('categories')->where('id', '=', $category)->pluck('name')->first();
        } 

        Mail::to($email)->send(new Suggested($name, $info, $categoryNames, $email)); //Maak nieuwe Suggested mail klasse en verstuur.

        return View("toevoegen.thanks");
    }
}
