<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rolename)
    {
        if (Auth::check()){
            if (Auth::user()->role->name == $rolename){
                return $next($request);
            }
//            return $next($request);
        }
        else{
            return redirect()->route('login.form');
        }

        return response()->json('You have no permission');
    }
}
