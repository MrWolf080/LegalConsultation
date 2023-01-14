<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\ApplicationCategory;
use App\Models\Message;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MessagesController extends Controller
{
    public function show($id)
    {
        $name=auth()->user()->name;
        $application=Application::find($id);
        $category=ApplicationCategory::find($application->id_category)->category;
        $lawyer=null;
        if($application->id_lawyer)
        {
            $lawyer=User::find($application->id_lawyer);
        }

        $client=User::find($application->id_client);
        $role=Roles::find(auth()->user()->id_role)->role;
        $messages = Db::table('messages')
            ->where('id_application',$id)->get();
        return view('messages', compact('application', 'messages',
            'client','lawyer','name','category','role'));
    }

    public function send_message(Request $request, $id)
    {
        $request->validate(
        [
            'message' => ['required', 'string'],
            'image'=>['image']
        ]);
        $application=Application::find($id);
        if(Roles::find(auth()->user()->id_role)->role==='Юрист'&&!$application->id_lawyer)
        {
            $application->id_lawyer=auth()->user()->getAuthIdentifier();
            $application->status='В работе';
            $application->save();
        }
        $data = $request->except(['_token']);
        $data['id_application']=$id;
        $data['id_user']=auth()->user()->getAuthIdentifier();
        if($request->hasFile('image'))
        {
            $filename = $data['image']->getClientOriginalName();
            $data['image']->move(Storage::path('/public/images/') . 'origin/', $filename);
            $thumbnail = Image::make(Storage::path('/public/images/') . 'origin/' . $filename);
            $thumbnail->fit(300, 300);
            $thumbnail->save(Storage::path('/public/images/') . 'thumbnail/' . $filename);
            $data['image'] = $filename;
        }
        Message::create($data);
        return redirect()->back();
    }
}
