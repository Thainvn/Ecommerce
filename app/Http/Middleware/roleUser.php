<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class roleUser
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
        // if(Auth::check() && (Auth::User()->role ==1)){

        //     return $next($request);
        // }


        if(app('auth')->check() && (app('auth')->User()->role ==1)){

            return $next($request);
        }



       return redirect()->route('login');
       

    }
}
