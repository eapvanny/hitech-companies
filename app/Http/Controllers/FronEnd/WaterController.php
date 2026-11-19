<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Our_water;

class WaterController extends Controller
{
    public function index()
    {
        // Always get fresh data from database
        $waters = Our_water::select(
                'id',
                'bottle',
                'description',
                'description_kh',
                'active_status',
                'updated_at'
            )
            ->where('active_status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('front-end.water', compact('waters'));
    }
}
