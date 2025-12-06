<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\MainEventPhoto;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index(){
        $data['events'] = Event::where('active_status', 1)->get();
        $data['mainEventPhoto'] = MainEventPhoto::all();
        return view('front-end.event-news',$data);
    }
}
