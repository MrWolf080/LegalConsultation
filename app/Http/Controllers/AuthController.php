<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function auth(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validation=Validator::make($request->all(),
            [
                'name' => ['required', 'string'],
                'password'=>['required','string']
            ],
            [
                'name.required'=>'Поле имя не должно быть пустым',
                'name.string'=>'Имя должно содержать строку',
                'password.required'=>'Поле пароль не должно быть пустым',
                'password.string'=>'Пароль должен содержать строку'
            ]
        );
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors());
        }
        $user = User::where('name', $request->input('name'))->orWhere('email', $request->input('name'))->first();
        if(!$user)
        {
            return redirect()->back()->withErrors(['name' => 'Имя или email не найдены']);
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
            return redirect()->back()->withErrors(['password' => 'Неверный пароль']);
        }
    }
}
