<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Corevalue;
use App\Models\em_message;
use App\Models\Ourcompany;
use App\Models\Vissionmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurcompanyController extends Controller
{
    public function index(){
        $data['about'] = Ourcompany::find(1)->get()->first();
        $data['messages'] = em_message::orderBy('id', 'desc')->get();
        $data['vision_mission'] = Vissionmission::find(1)->get()->first();
        $data['core_values'] = Corevalue::all();
        $data['accreditations'] = Accreditation::all();
        return view('admin.abouts.our-company', $data);
    }

    public function edit(){
        $data['about'] = Ourcompany::find(1)->get()->first();
        return view('admin.abouts.edit-ourcompany', $data);
    }

    public function doEdit(Request $r){
        // dd($r->input());

        $validate = Validator::make($r->all(),[
            'description_kh' => 'required',
            'description_en' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.');
        }

        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $data['description_kh'] = $r->description_kh;
        $data['description_en'] = $r->description_en;

        $check = Ourcompany::get()->first();
        if($check == true){
            $update = Ourcompany::where('id', $check->id)->update($data);
        }else{
            $update = Ourcompany::create($data);
        }

        if($update == true)  return redirect()->route('about.company')->with('success', 'Edit our company has successfully.');
        else return redirect()->back()->with('error', 'Fialed to edit our company.');


    }
}
