<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function auth(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('name', $request->input('name'))->orWhere('email', $request->input('name'))->first();
        if(!$user)
        {
            return redirect()->back()->withErrors(['name' => 'Name or email did not found']);
        }
        $name_checker=['name' => $request->input('name'), 'password' => $request->input('password')];
        $email_checker=['email' => $request->input('name'), 'password' => $request->input('password')];
        if(Auth::attempt($name_checker) || Auth::attempt($email_checker))
        {
            $request->session()->regenerate();
            if($user->role->role === 'Клиент')
            {
                return redirect()->route('main_client_page');
            }
            else
            {
                return redirect()->route('main_lawyer_page');
            }
        }
        else
        {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
        }
    }
}
