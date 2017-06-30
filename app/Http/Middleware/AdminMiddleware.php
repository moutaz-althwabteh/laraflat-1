<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
//        dd(Auth::user()->group_id);
        if(!Auth::check()){
            return redirect('/login');
        }
        if(Auth::user()->group_id == 1 ||Auth::user()->group_id == 3)
        {
            return $next($request);
        }
        return redirect('/');
    }
}
