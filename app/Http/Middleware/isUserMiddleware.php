<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUserMiddleware
{
 
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && Auth::user()->role ==2){ 
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
