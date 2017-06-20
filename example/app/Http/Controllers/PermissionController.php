<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	// view where admins can grant others new permissions
	// normal users can view their permissions
	public function index()
	{
		return view('permissions.index');
	}


}
