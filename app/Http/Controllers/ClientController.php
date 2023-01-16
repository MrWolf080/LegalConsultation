<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function client()
    {
        $user=auth()->user();
        $clientsIds=DB::table('users')
            ->join('roles','roles.id','=','users.id_role')
            ->where('users.id','!=',$user->getAuthIdentifier())
            ->where('roles.role','Клиент')
            ->inRandomOrder()
            ->take(5)
            ->pluck('users.id');
        $clients_applications=new Collection();
        foreach ($clientsIds as $clientId)
        {
            $clients_applications=$clients_applications->concat(Application::with('category')
                ->with('client')
                ->where('id_client',$clientId)
                ->inRandomOrder()
                ->take(1)
                ->get());
        }
        $clients_applications = $clients_applications->sortByDesc('created_at');
        $my_applications=DB::table('applications')->latest()->get()
            ->where('id_client' ,$user->id);
        $name=$user->name;
        return view('client',compact(['name','clients_applications', 'my_applications']));
    }

    public function solve_problem(Request $request, $id)
    {
        $comment=$request->input('comment');
        $application_id=$id;
        $application=Application::find($application_id);
        $application->status='Закрыта';
        $application->comment=$comment;
        $application->save();
        return response()->json(['status'=>'success']);
    }
}
