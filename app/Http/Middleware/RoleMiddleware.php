<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

   
            if (Auth::check() && (Auth::user()->role === 'Staff' || Auth::user()->role === 'Admin' || Auth::user()->role === 'Finance')) { 
                return $next($request);
            }
            
        
        // Redirect unauthorized access
        return redirect()->route('home')->with('failed', 'Unauthorized Access, Please Login as an Authorized User to Continue');
    }
}
