<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Event;

class EventController extends Controller
{
    public function detail($id)
    {
        // Get latest Event from database
        $event = Event::select(
                'id',
                'title_en',
                'title_kh',
                'description_en',
                'description_kh',
                'seo_title',
                'seo_description',
                'img',
                'view_num',
                'created_at',
                'updated_at'
            )
            ->findOrFail($id);

        // Increment event view count
        $event->increment('view_num');

        // Get latest other Events from database
        $otherEvents = Event::select(
                'id',
                'title_en',
                'title_kh',
                'description_en',
                'description_kh',
                'img',
                'created_at',
                'updated_at',
                'view_num'
            )
            ->where('id', '!=', $id)
            ->where('active_status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // Get latest active Advertisement
        $ads = Ads::where('active_status', 1)
            ->orderBy('created_at', 'desc')
            ->select('id', 'img', 'created_at', 'updated_at')
            ->first();

        return view('front-end.event-detail', compact(
            'event',
            'otherEvents',
            'ads'
        ));
    }
}
