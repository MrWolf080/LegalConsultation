<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function client()
    {
        $user=auth()->user();
        $req=DB::table('applications')->get()->where('id_client' ,$user->id);
        return view('client',[
            'name'=>$user->name,
            'req'=>$req
        ]);
    }
}
