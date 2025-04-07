<?php

namespace App\Http\Controllers;

use App\Models\Vissionmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisionmissionController extends Controller
{
    public function edit(){
        $data['about'] = Vissionmission::get()->first();
        return view('admin.abouts.edit-visionmission', $data);
    }

    public function doEdit(Request $r){
        $validate = Validator::make($r->all(),[
            'text_kh' => 'required',
            'text_en' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.');
        }

        $data['text_kh'] = $r->text_kh;
        $data['text_en'] = $r->text_en;

        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $visionMission = Vissionmission::get()->first();
        if($visionMission == true){
            $update = Vissionmission::where('id', $visionMission->id)->update($data);
        }else{
            $update = Vissionmission::create($data);
        }

        if($update == true){
            return redirect()->route('about.company')->with('success', 'Vision and Mission has updated successfully.');
        }else{
            return redirect()->route('about.company')->with('error', 'Failed to update Vision and Mission.');
        }
    }
}
