<?php

namespace App\Http\Middleware;

use Closure;

class hr
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
            {
         if(isset(auth()->user()->role) && auth()->user()->role=="HR" )
        {
            //dd(auth()->user()->role);
            return $next($request);
        }
        return redirect(route('alogin'))->with('warning','You Are Not Logged-in');;

    }
    }
}
