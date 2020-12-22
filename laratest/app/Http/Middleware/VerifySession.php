<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifySession
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
        if($request->session()->has('uname')){
            return $next($request);
        }
        else{
            $request->session()->flash('errmsg','You have to login first');
            return redirect()->route('login.index');
        }
    }
}
