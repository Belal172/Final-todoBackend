<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return $next($request);
            } else {
                Auth::logout();
                return response()->json(['message' => 'Access denied. Not a User'], Response::HTTP_FORBIDDEN);
            }
        }
        Auth::logout();
        return response()->json(['message' => 'Access denied.Not Authenticated'], Response::HTTP_FORBIDDEN);
    }
}
