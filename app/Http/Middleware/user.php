<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'sadmin') {
            return $next($request);
        } else {
            abort(401);
        };
    }
}
