<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class Role
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string  $role
	 * @return mixed
	 */
	public function handle($request, Closure $next, $role)
	{
		dd($request->user());

		if (! User::hasRole($request->user()->id, $role)) {
			return view('home');
		}

		return $next($request);
	}
}
