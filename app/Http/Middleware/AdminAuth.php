<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('user_id'))
        {
            return redirect('adminlogin');
        }
        $path=$request->path();
        if(($path=="adminlogin") && (Session::get('user_id')))
        {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
