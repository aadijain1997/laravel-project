<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Author
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

        if (Auth::check() && Auth::user()->role == 'author') {
            return $next($request);
        }
        else{
            return redirect()->route('login');
        };
    }

}
