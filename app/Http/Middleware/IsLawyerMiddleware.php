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
            return redirect()->back()->withErrors(['any_errors' => 'Вы не авторизованы']);
        }
        if(auth()->user()->role->role !== 'Юрист')
        {
            return redirect()->back()->withErrors(['any_errors' => 'У вас нет прав для просмотра этой страницы']);
        }
        return $next($request);
    }
}
