<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->role === 'admin') {
    //         return $next($request);
    //     }

    //     return redirect('/login')->with('warning', true)->with('toast', 'warning');
    // }

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        return redirect('/login')->with('warning', true)->with('toast', 'warning');
    }
}
