<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->check()) {
        //     return $next($request);
        // }else{
        //     return redirect('/admin/login');
        // }
        if (auth()->check() && in_array(auth()->user()->role_id, [1, 2])) {
            return $next($request);
        } else {
            if (auth()->check() && in_array(auth()->user()->role_id, [3])) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/admin/login')->with('error', 'Login failed');
            }
            return redirect('/admin/login');
        } 
    }
}
