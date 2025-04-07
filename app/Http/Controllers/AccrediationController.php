<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class AccrediationController extends Controller
{
    public function add(){
        // dd($r->input());
        return view('admin.abouts.add-accreditation');
    }


    public function save(Request $r){
        // dd ($r->input());
        $validate = Validator::make($r->all(),[
            'name_kh' => 'required',
            'name_en' => 'required',
            'logo' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.')->withInput();
        }
        $data['name_kh'] = $r->name_kh;
        $data['name_en'] = $r->name_en;

        if($r->hasFile('logo')){
            $data['logo'] = $r->file('logo')->store('uploads/images/accreditations', 'custom');
        }

        

        if(! empty($r->active_status)) $data['active_status'] = 1;
        else $data['active_status'] = 0;

        $post = Accreditation::create($data);

        if($post == true) return redirect()->back()->with('success', 'Accreditation has posted successfully.');
        else return redirect()->back()->with('error', 'Failed to post accreditation.');
    }

    public function delete($id){
        // dd($id);
        $check = Accreditation::findOrFail($id);

        if(File::exists($check->logo)){
            File::delete($check->logo);
        }

        $delete = $check->delete();
        if($delete == true) return redirect()->back()->with('success', 'Delete '. $check->name_en . ' has successfully.');
        else return redirect()->back()->with('error', 'Failed to delete '. $check->name_en);
    }

    public function edit($id){
        $data['accreditation'] = Accreditation::findOrFail($id);

        return view('admin.abouts.edit-accreditation', $data);
    }

    public function doEdit(Request $r, $id){
        // dd($r->input());
        $check = Accreditation::findOrFail($id);

        $validate = Validator::make($r->all(),[
            'name_kh' => 'required',
            'name_en' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.')->withInput();
        }
        $data['name_kh'] = $r->name_kh;
        $data['name_en'] = $r->name_en;

        if($r->hasFile('logo')){

            if(File::exists($check->logo)){
                File::delete($check->logo);
            }

            $data['logo'] = $r->file('logo')->store('uploads/images/accreditations', 'custom');
        }else{
            $data['logo'] = $r->old_logo;
        }

        if(! empty($r->active_status)) $data['active_status'] = 1;
        else $data['active_status'] = 0;

        $update = $check->update($data);

        if($update == true)
            return redirect()->route('about.company')->with('success', 'Update '. $check->name_en . ' has successfully.');
        else
            return redirect()->back()->with('error', 'Failed to update '. $check->name_en . '.');
    }
}
