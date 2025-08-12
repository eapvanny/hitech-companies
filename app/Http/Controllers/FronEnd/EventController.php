<?php

namespace App\Http\Controllers\FronEnd;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function detail($id)
    {
        $check = Event::findOrFail($id);
        
        if ($check) {
            // Increment the view count
            $check->increment('view_num');
            
            $data['event'] = $check;
            // Fetch all events except the one with the given $id
            $data['otherEvents'] = Event::where('id', '!=', $id)->get();
            $data['ads'] = Ads::where('active_status', 1)->orderBy('created_at', 'desc')->first();
            return view('front-end.event-detail', $data);
        } else {
            return redirect()->back();
        }
    }
}
