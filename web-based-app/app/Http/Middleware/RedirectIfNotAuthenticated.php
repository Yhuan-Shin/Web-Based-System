<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
  
        if (!Auth::guard('user')->check() &&  $request->is('user/*')) {
            return redirect('/')->with('error', 'You must be logged in as a user to access this page.'); // Ensure this route exists
        }  
        
  
        return $next($request);
    }
}
