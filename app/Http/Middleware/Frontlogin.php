<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Closure;
use Session;

class Frontlogin
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

        if(empty(Session::has('frontSession'))){
            $current_url = $_SERVER['REQUEST_URI'];
            Session::put('current_url',$current_url);
            return redirect('/');
        }
        return $next($request);
    }
}
