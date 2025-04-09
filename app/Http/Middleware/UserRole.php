<?php

namespace App\Http\Middleware;

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
        if (auth()->check()) {
            if (auth()->user()->role === "admin") {
                return $next($request);
            } else {
                // Return a response for non-admin users
                return response()->json(['message' => 'Unauthorized Admin'], Response::HTTP_FORBIDDEN);
            }
        }
        // Return a response if the user is not authenticated
        return response()->json(['message' => 'Unauthorized outside the if'], Response::HTTP_UNAUTHORIZED);
    }
}