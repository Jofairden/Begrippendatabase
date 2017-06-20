<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Category;
use App\Mail\Suggested;
use DB;

class ToevoegenController extends Controller
{
    public function index() {
        $categories = Category::get();
        return View("toevoegen.index", compact('categories'));
    }

    public function post(Request $request) {
        $count = DB::table('categories')->count();
        
        $selected = array(); 
        $name = $request->input('begripname');
        $info = $request->input('omschrijving');
        $email = $request->input('email');

        for($i = 1; $i < $count; $i++) {
            //Kijk welke categorieen zijn geselecteerd en add in array;
            $category = "category-" . $i;
            if($request->input($category) == "on") {
                $selected[] = $i;
            }
        }      

        DB::table('suggested')->insert(
            [
                'name' => $name,
                'info' => $info,
                'categories' => implode(",", $selected), //Eerst opslaan als comma seperated. Komen in koppeltabel als begrip is geaccepteerd.
                'email' => $email
            ]
        );

        $categoryNames = array();
        foreach($selected as $category) {
            //Haal alle categorie namen op voor in de e-mail;
            $categoryNames[] = DB::table('categories')->where('id', '=', $category)->pluck('name')->first();
        } 

        Mail::to($email)->send(new Suggested($name, $info, $categoryNames, $email)); //Maak nieuwe Suggested mail klasse en verstuur.

        return View("toevoegen.thanks");
    }
}
