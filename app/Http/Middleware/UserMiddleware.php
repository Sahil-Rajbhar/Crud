<?php

namespace App\Http\Middleware;

use DB;

use Closure;

use Illuminate\Http\Request;

use Auth;

// use App\Models\EmpData;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
           if( Auth::check()){               
            return $next($request);              
            }
            else{
                // dd($request->id);
                // echo $own;
                abort(404);                
            }        
    }
}