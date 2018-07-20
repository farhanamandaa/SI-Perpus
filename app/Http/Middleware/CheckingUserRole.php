<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckingUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->check() && auth()->user()->role_id == 1) {
            return $next($request);
        }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/admin');
        // }
        return redirect('/home');
    }
}
