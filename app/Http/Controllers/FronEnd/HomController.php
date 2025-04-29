<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Award;
use App\Models\Our_water;
use App\Models\Slide;
use App\Models\Society;
use App\Models\Themesetting;
use Illuminate\Http\Request;

class HomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['slides'] = Slide::where('active_status', 1)->first();
        $data['awards'] = Award::where('active_status', 1)->orderBy('created_at', 'desc')->first();
        $data['overview'] = About::where('active_status', 1)->first();
        $data['waters'] = Our_water::where('active_status', 1)->get();
        $data['societys'] = Society::where('active_status', 1)->get();
        $data['theme'] = Themesetting::where('active_status', 1)->first();
        // dd($data['theme']);
        return view('front-end.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function setLanguage($lang)
    {
        // dd('hi');
        if (in_array($lang, ['kh', 'en'])) {
            // Update the user's language preference (if logged in)
            if (auth()->check()) {
                auth()->user()->update(['user_lang' => $lang]);
            }

            // Store language in session
            session(['user_lang' => $lang]);

            // Set the application's locale
            app()->setLocale($lang);

            // Redirect back
            return redirect()->back();
        }

        return redirect()->route('home');
    }
}
