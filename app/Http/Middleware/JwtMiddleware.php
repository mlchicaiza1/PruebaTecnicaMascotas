<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check())
        {
            return response()->json(['error' => 'Unauthorized - Admins only!'], 403);
        }
        return $next($request);
    }
}


