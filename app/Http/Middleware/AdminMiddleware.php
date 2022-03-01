<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_admin)
        {
            return $next($request);
        } else {
            auth()->logout();
            return redirect('/login')->with('message','You are not admin');
        }

    }
}
