<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Reviewer1
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::check() && Auth::user()->role == 'reviewer1') {
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
