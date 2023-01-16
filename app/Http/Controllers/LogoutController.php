<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogoutController extends Controller
{
    function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
