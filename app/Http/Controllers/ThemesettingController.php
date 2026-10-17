<?php

namespace App\Http\Controllers;

use App\Models\Themesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ThemesettingController extends Controller
{
    public function index(){
        
        $data['theme'] = Themesetting::first();
        // dd( $data['theme']->decor);
        return view('admin.theme.index', $data);
    }

    public function save(Request $r)
    {
        $data = [];

        // Active status
        $data['active_status'] = $r->has('active_status') ? 1 : 0;

        $check = Themesetting::first();

        // Helper function to handle file uploads
        $uploadPath = 'uploads/themes';

        if (!empty($check)) {

            // === DECOR FILE ===
            if ($r->hasFile('decor')) {
                // delete old file
                if ($check->decor && File::exists(storage_path('app/public/'.$check->decor))) {
                    File::delete(storage_path('app/public/'.$check->decor));
                }

                // upload new
                $data['decor'] = $r->file('decor')->store($uploadPath, 'public');
            } else {
                $data['decor'] = $check->decor;
            }

            // === WATER BG ===
            if ($r->hasFile('water_bg')) {
                if ($check->water_bg && File::exists(storage_path('app/public/'.$check->water_bg))) {
                    File::delete(storage_path('app/public/'.$check->water_bg));
                }
                $data['water_bg'] = $r->file('water_bg')->store($uploadPath, 'public');
            } else {
                $data['water_bg'] = $check->water_bg;
            }

            // === FOOTER DECOR ===
            if ($r->hasFile('footer_decor')) {
                if ($check->footer_decor && File::exists(storage_path('app/public/'.$check->footer_decor))) {
                    File::delete(storage_path('app/public/'.$check->footer_decor));
                }
                $data['footer_decor'] = $r->file('footer_decor')->store($uploadPath, 'public');
            } else {
                $data['footer_decor'] = $check->footer_decor;
            }

            Themesetting::where('id', $check->id)->update($data);

        } else {

            // FIRST TIME CREATE
            if ($r->hasFile('decor') && $r->hasFile('water_bg') && $r->hasFile('footer_decor')) {

                $data['decor']        = $r->file('decor')->store($uploadPath, 'public');
                $data['water_bg']     = $r->file('water_bg')->store($uploadPath, 'public');
                $data['footer_decor'] = $r->file('footer_decor')->store($uploadPath, 'public');

                Themesetting::create($data);
            }
        }

        return redirect()->back()->with('success', 'Theme setting configuration has been saved successfully.');
    }
}
