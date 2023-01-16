<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
        if(auth()->check())
        {
            $user=User::find(auth()->user()->getAuthIdentifier());
            if ($user->role->role === 'Клиент') {
                return redirect()->route('main_client_page');
            } else {
                return redirect()->route('main_lawyer_page');
            }
        }
        return view('index');
    }
}
