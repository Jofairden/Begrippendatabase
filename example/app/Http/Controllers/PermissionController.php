<?php

namespace App\Http\Controllers;

use App\User;
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

	public function ajax(Request $request)
	{
		if ($request->has('user')
			&& $request->has('perm')
		)
		{
			$user = $request->input('user');
			$perm = $request->input('perm');

			// First remove occurences that already exist
			\DB::table('permission_user')
				->where('user_id', $user)
				->where('permission_id', $perm)
				->delete();

			// If we grant, add a new permission relation to the database
			if ($request->has('grant'))
			{
				\DB::table('permission_user')->insert(
					[
						'permission_id' => $perm,
						'user_id'       => $user
					]
				);
			}

			// If our request is ajax, return a json response
			if ($request->ajax())
			{
				return response()->json([
					'user_id' => $user,
					'permission_id' => $perm,
					'grant' => $request->has('grant'),
					'html' => view('components.permissions.adminPanel')->render(),
				]);
			}
		}
		return view('permissions.index');
	}
}
