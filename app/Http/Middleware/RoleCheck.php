<?php
namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === "admin") {
                return $next($request);
            } elseif (Auth::user()->role === "user") {
                return $next($request);
            } else {
                return response()->json(['You do not have permission You are not any user type.']);
            }
        }


        return response()->json(['You do not have permission to access for this page.']);
    }
}
