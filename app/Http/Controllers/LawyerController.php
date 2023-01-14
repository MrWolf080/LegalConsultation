<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LawyerController extends Controller
{
    public function lawyer()
    {
        $user=auth()->user();
        $my_applications=DB::table('applications')->latest()->get()
            ->where('id_lawyer' ,$user->id)
            ->where('status','В работе');
        $new_applications=DB::table('applications')->latest()->get()
            ->where('status' ,'Новая');
        return view('lawyer',[
            'name'=>$user->name,
            'my_applications'=>$my_applications,
            'new_applications'=>$new_applications
        ]);
    }
}
