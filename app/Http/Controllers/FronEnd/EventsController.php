<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MainEventPhoto;

class EventsController extends Controller
{
    public function index()
    {
        // Always get fresh Event data from database
        $events = Event::where('active_status', 1)
            ->select(
                'id',
                'title_en',
                'title_kh',
                'description_en',
                'description_kh',
                'seo_title',
                'seo_description',
                'img',
                'created_at',
                'updated_at',
                'view_num'
            )
            ->orderBy('created_at', 'desc')
            ->get();

        // Always get fresh Main Event Photo data
        $mainEventPhoto = MainEventPhoto::select(
                'id',
                'title_en',
                'title_kh',
                'des_en',
                'des_kh',
                'img',
                'updated_at'
            )
            ->get();

        return view('front-end.event-news-home', compact(
            'events',
            'mainEventPhoto'
        ));
    }
}
