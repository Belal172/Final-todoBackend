<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            if (Auth::user()->role == 'admin') {
                return $next($request);
            }
            Auth::logout();
            return response()->json(['message' => 'Access denied. Not an admin'], Response::HTTP_FORBIDDEN);
        }
        Auth::logout();
        return response()->json(['message' => 'Unauthorized user'], Response::HTTP_UNAUTHORIZED);




    }


}