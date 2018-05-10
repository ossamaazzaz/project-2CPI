<?php

namespace App\Http\Middleware;

use Closure;

class Preparateur
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
          // check migration table for groupId reference
        if (\Auth::user() &&  \Auth::user()->groupId == 2) {
            return $next($request);
         }
        return redirect('/');
    }
}
