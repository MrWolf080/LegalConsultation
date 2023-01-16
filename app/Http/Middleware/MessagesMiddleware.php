<?php

namespace App\Http\Middleware;

use App\Models\Application;
use App\Models\ApplicationCategory;
use App\Models\Roles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesMiddleware
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
        $id=$request->route('id');
        $application=Application::find($id);
        if(!Auth::check())
            return redirect()->route('index')->withErrors(['any_errors'=>'Вы не авторизованы']);
        $user=auth()->user();
        $category=Roles::find($user->id_role)->role;
        if(!$application)
            return redirect()->back()->withErrors(['any_errors'=>'Вопроса не существует']);
        if($category==='Клиент'&&$application->id_client!==$user->getAuthIdentifier())
            return redirect()->back()->withErrors(['any_errors'=>'У вас нет прав для просмотра этого вопроса']);
        if($application->id_lawyer)
            if($category==='Юрист'&&$application->id_lawyer!==$user->getAuthIdentifier())
                 return redirect()->back()->withErrors(['any_errors'=>'У вас нет прав для просмотра этого вопроса']);
        return $next($request);
    }
}
