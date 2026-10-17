<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Our_water;

class WaterController extends Controller
{
    public function index()
    {
        $waters = cache()->remember('waters_active', 3600, function () {
            return Our_water::select('bottle', 'description', 'description_kh', 'active_status')
                ->where('active_status', 1)
                ->orderBy('id', 'asc')
                ->get();
        });

        return view('front-end.water', compact('waters'));
    }
}
