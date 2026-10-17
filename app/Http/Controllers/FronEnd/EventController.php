<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Event;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public function detail($id)
    {
        $event = Event::select('id','title_en','title_kh','description_en','description_kh','seo_title','seo_description','img','view_num','created_at')
            ->findOrFail($id);

        // Increment view
        $event->increment('view_num');

        // Cache other events for 1 hour
        $otherEvents = Cache::remember("other_events_$id", 3600, function () use ($id) {
            return Event::select('id','title_en','title_kh','description_en','description_kh','img','created_at','view_num')
                ->where('id', '!=', $id)
                ->where('active_status', 1)
                ->orderBy('created_at','desc')
                ->get();
        });

        // Cache ads
        $ads = Cache::remember("event_ads", 3600, function () {
            return Ads::where('active_status', 1)
                ->orderBy('created_at','desc')
                ->select('img')
                ->first();
        });

        return view('front-end.event-detail', compact('event', 'otherEvents', 'ads'));
    }
}
