<?php

namespace App\Http\Controllers;

use App\Models\Corevalue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CorevalueController extends Controller
{
    public function add(){
        return view('admin.abouts.add-corevalue');
    }

    public function save(Request $r){
        // dd($r->input());
        $validate = Validator::make($r->all(),[
            'title_kh' => 'required',
            'title_en' => 'required',
            'description_kh' => 'required',
            'description_en' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.')->withInput();
        }

        $data['title_kh'] = $r->title_kh;
        $data['title_en'] = $r->title_en;

        $data['description_kh'] = $r->description_kh;
        $data['description_en'] = $r->description_en;

        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else $data['active_status'] = 0;


        $post = Corevalue::create($data);

        if($post == true) return redirect()->back()->with('success', 'Post core value has successfully.');
        else return redirect()->back()->with('error', 'Failed to post core value.');
    }

    public function delete($id){
        // dd($id);
        $check = Corevalue::findOrFail($id);
        $delete = $check->delete();

        if($delete == true) return redirect()->back()->with('success', 'Delete '. $check->title_en .' has successfully.');
        else return redirect()->back()->with('error', 'Failed to delete core value.');
    }

    public function status($id){
        // dd($id);
        $check = Corevalue::findOrFail($id);
        if($check->active_status == 1){
            $status = $check->update(['active_status' => 0]);
        }else{
            $status = $check->update(['active_status' => 1]);
        }

        if($status == true) return redirect()->back()->with('success', 'Chagne status to '. $check->title_en .' has successfully.');
        else return redirect()->back()->with('error', 'Failed to change status to '. $check->title_en .'.');
    }


    public function edit($id){
        // dd($id);
        $data['coreValue'] = Corevalue::findOrFail($id);
        return view('admin.abouts.edit-corevalue', $data);
    }

    public function doEdit(Request $r, $id){
        // dd($r->input());

        $coreValue = Corevalue::findOrFail($id);
        $validate = Validator::make($r->all(),[
            'title_kh' => 'required',
            'title_en' => 'required',
            'description_kh' => 'required',
            'description_en' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.');
        }
        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else $data['active_status'] = 0;

        
        $data['title_kh'] = $r->title_kh;
        $data['title_en'] = $r->title_en;

        $data['description_kh'] = $r->description_kh;
        $data['description_en'] = $r->description_en;
        // dd($r->input());
        $update = $coreValue->update($data);

        if($update == true) return redirect()->route('about.company')->with('success', 'Update core value has successfully.');
        else return redirect()->route('about.company')->with('error', 'Failed to update core value.');
    }
}
