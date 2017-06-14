<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function Index()
	{
		$educations = Education::get();
		return view('educations.index', compact('educations'));
	}

	public function Show(Education $education)
	{
		return view('educations.show', compact('education'));
	}
}
