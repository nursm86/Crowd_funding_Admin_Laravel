<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyUserType
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
        if($request->session()->get('utype') == 0){
            return $next($request);
        }
        else{
            $request->session()->flash('errmsg','You are not authorized to see that page!!!');
            return redirect()->route('login.index');
        }
    }
}
