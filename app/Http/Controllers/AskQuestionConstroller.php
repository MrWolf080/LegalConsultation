<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AskQuestionConstroller extends Controller
{
    public function asking_question(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string'],
            'question' => ['required', 'string'],
            'image'=>['image']
        ]);
        $data = $request->except(['_token']);
        $data['id_category']=Db::table('application_categories')->
                    where('category',$data['category'])->value('id');
        $data['id_client']=auth()->user()->getAuthIdentifier();
        $data['status']='Новая';
        if($data['image'])
        {
            $filename = $data['image']->getClientOriginalName();
            $data['image']->move(Storage::path('/public/images/') . 'origin/', $filename);
            $thumbnail = Image::make(Storage::path('/public/images/') . 'origin/' . $filename);
            $thumbnail->fit(300, 300);
            $thumbnail->save(Storage::path('/public/images/') . 'thumbnail/' . $filename);
            $data['image'] = $filename;
        }
        Application::create($data);
        return response()->json(['status' => 'success', 'message'=>'Успешно создано']);
    }

    public function question()
    {
        $categories=DB::table('application_categories')->pluck('category');
        //dd($categories);
        return view('question',
            ['categories'=>$categories]
        );
    }
}
