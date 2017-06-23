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
		if (!User::hasRole($request->user()->id, $role)) {
			return redirect('/'); //Terug naar hûs
		}

		return $next($request);
	}
}
