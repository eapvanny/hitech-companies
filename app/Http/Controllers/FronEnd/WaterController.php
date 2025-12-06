<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Our_water;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    public function index(){
        $data['waters'] = Our_water::where('active_status', 1)->get();
        return view('front-end.water', $data);
    }
}
