<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LawyerController extends Controller
{
    public function lawyer()
    {
        $user=auth()->user();
        $applications = Application::with('client')->with('category')
            ->where(function ($query) use ($user) {
                $query->where('applications.id_lawyer', null)
                    ->orWhere('applications.id_lawyer', $user->id);
            })
            ->latest()
            ->get();
        return view('lawyer',[
            'name'=>$user->name,
            'applications'=>$applications,
            'data'=>array()
        ]);
    }

    public function filter(Request $request)
    {
        $user=auth()->user();
        $name=$user->name;
        $data=$request->except('_token');
        if(($data['filter-date-first']&&!$data['filter-date-last'])||(!$data['filter-date-first']&&$data['filter-date-last']))
            return redirect()->route('main_lawyer_page')->withErrors(['any_errors'=>'Обе даты должны быть заполнены']);
        if($data['filter-date-first']>$data['filter-date-last'])
            return redirect()->route('main_lawyer_page')->withErrors(['any_errors'=>'Дата начала периода не может быть больше даты конца']);
        $query = Application::with('client')->with('category')
            ->where(function ($query) use ($user) {
                $query->where('applications.id_lawyer', null)
                    ->orWhere('applications.id_lawyer', $user->id);
            });
        if($data['filter-date-first'])
        {
            $query->whereBetween('created_at', [$data['filter-date-first'], $data['filter-date-last']]);
        }
        switch ($data['status-filter'])
        {
            case 'all':
                break;
            case 'new':
                $query->where('status', 'Новая');
                break;
            case 'in work':
                $query->where('status', 'В работе');
                break;
            case 'closed':
                $query->where('status', 'Закрыта');
                break;
            default:
                return redirect()->route('main_lawyer_page')->withErrors(['any_errors' => 'Произошла неизвестная ошибка']);
        }
        switch ($data['category-filter'])
        {
            case 'all':
                break;
            case 'land-disputes':
                $query->whereHas('category', function ($q) {
                    $q->where('category', 'Земельные споры');
                });
                break;
            case 'family-disputes':
                $query->whereHas('category', function ($q) {
                    $q->where('category', 'Семейные споры');
                });
                break;
            case 'labor-disputes':
                $query->whereHas('category', function ($q) {
                    $q->where('category', 'Трудовые споры');
                });
                break;
            case 'police-disputes':
                $query->whereHas('category', function ($q) {
                    $q->where('category', 'Споры с ГИБДД');
                });;
                break;
            default:
                return redirect()->route('main_lawyer_page')->withErrors(['any_errors' => 'Произошла неизвестная ошибка']);
        }
        $applications = $query->latest()->get();
        return view('lawyer', compact('name', 'applications', 'data'));
    }

}
