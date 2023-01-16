<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AskQuestionConstroller extends Controller
{
    public function asking_question(Request $request)
    {
        $validation=Validator::make($request->all(),
            [
                'subject' => ['required', 'string'],
                'question'=>['required', 'string'],
                'image'=>['image']
            ],
            [
                'subject.required'=>'Поле тема не может быть пустым',
                'subject.string'=>'Поле тема должно содержать строку',
                'question.required'=>'Поле вопрос не может быть пустым',
                'question.string'=>'Поле вопрос должно содержать строку',
                'image.image'=>'Требуется загрузить именно картинку'
            ]
        );
        if($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors());
        }
        $data = $request->except(['_token']);
        $data['id_category']=Db::table('application_categories')->
                    where('category',$data['category'])->value('id');
        $data['id_client']=auth()->user()->getAuthIdentifier();
        $data['status']='Новая';
        if($request->hasFile('image'))
        {
            $filename = $data['image']->getClientOriginalName();
            $data['image']->move(Storage::path('/public/images/') . 'origin/', $filename);
            $thumbnail = Image::make(Storage::path('/public/images/') . 'origin/' . $filename);
            $thumbnail->fit(300, 300);
            $thumbnail->save(Storage::path('/public/images/') . 'thumbnail/' . $filename);
            $data['image'] = $filename;
        }
        Application::create($data);
        return redirect()->route('main_client_page');
    }

    public function question()
    {
        $categories=DB::table('application_categories')->pluck('category');
        return view('question',
            ['categories'=>$categories]
        );
    }
}
