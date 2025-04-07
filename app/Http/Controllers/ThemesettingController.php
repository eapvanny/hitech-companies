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
        return view('admin.theme.index', $data);
    }

    public function save(Request $r){

        // $validate = Validator::make($r->all(),[
        //     'decor' => 'required|image',
        //     'footer_decor' => 'required|image',
        // ]);
        
        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

            $check = Themesetting::first();
            if(!empty($check)){

                if($r->hasFile('decor')){
                    if(File::exists($check->decor)){
                        File::delete($check->decor);
                    }
                    $data['decor'] = $r->file('decor')->store('uploads/images/themes', 'custom');
                }
                else{
                    $data['decor'] = $check->decor;
                }

                
                if($r->hasFile('water_bg')){
                    if(File::exists($check->water_bg)){
                        File::delete($check->water_bg);
                    }
                    $data['water_bg'] = $r->file('water_bg')->store('uploads/images/themes', 'custom');
                }else{
                    $data['water_bg'] = $check->water_bg;
                }



                if($r->hasFile('footer_decor')){
                    if(File::exists($check->footer_decor)){
                        File::delete($check->footer_decor);
                    }
                    $data['footer_decor'] = $r->file('footer_decor')->store('uploads/images/themes', 'custom');
                }else{
                    $data['footer_decor'] = $check->footer_decor;
                }



                Themesetting::where('id', $check->id)->update($data);

            }else{
                if($r->hasFile('decor') && $r->hasFile('footer_decor') && $r->hasFile('water_bg')){
                    $data['decor'] = $r->file('decor')->store('uploads/images/themes', 'custom');
                    $data['water_bg'] = $r->file('decor')->store('uploads/images/themes', 'custom');
                    $data['footer_decor'] = $r->file('footer_decor')->store('uploads/images/themes', 'custom');

                    Themesetting::create($data);
                }
            }
        

        return redirect()->back()->with('success', 'Theme setting configuration has successfully.');
    }
}
