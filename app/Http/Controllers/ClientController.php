<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function client()
    {
        $user=auth()->user();
        $req=DB::table('applications')->latest()->get()
            ->where('id_client' ,$user->id)
            ->where('status','!==','Закрыта');
        return view('client',[
            'name'=>$user->name,
            'req'=>$req
        ]);
    }

    public function solve_problem($id)
    {
        $application_id=$id;
        $application=Application::find($application_id);
        $application->status='Закрыта';
        $application->save();
        return redirect()->route('main_client_page');
    }
}
