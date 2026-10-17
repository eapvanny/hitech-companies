<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MainEventPhoto;
use Illuminate\Support\Facades\Cache;

class EventsController extends Controller
{
    public function index()
    {
        $events = Cache::remember("events_list", 3600, function () {
            return Event::where('active_status', 1)
                ->select('id','title_en','title_kh','description_en','description_kh','seo_title','seo_description','img','created_at','view_num')
                ->orderBy('created_at','desc')
                ->get();
        });

        $mainEventPhoto = Cache::remember("main_event_photo", 3600, function () {
            return MainEventPhoto::select('title_en','title_kh','des_en','des_kh','img')->get();
        });

        return view('front-end.event-news', compact('events', 'mainEventPhoto'));
    }
}
