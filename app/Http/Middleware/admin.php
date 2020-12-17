<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
         if(isset(auth()->user()->role) && auth()->user()->role=="ADMIN" )
        {
            //dd(auth()->user()->role);
            return $next($request);
        }
        return redirect(route('alogin'))->with('warning','Not Found');;

    }
       
}
