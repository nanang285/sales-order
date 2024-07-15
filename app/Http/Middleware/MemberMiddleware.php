<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'member') {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')->with('error', 'Akses ditolak. Anda bukan member.');
    }
}
