<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsLawyerMiddleware
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
        if(!(auth()->user()))
        {
            return redirect()->back()->withErrors(['any_errors' => 'You are not authorized']);
        }
        if(auth()->user()->role->role !== 'Юрист')
        {
            return redirect()->back()->withErrors(['any_errors' => 'You have not permissions for this page']);
        }
        return $next($request);
    }
}
