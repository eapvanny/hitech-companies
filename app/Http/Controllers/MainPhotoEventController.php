<?php

namespace App\Http\Controllers;

use App\Models\MainEventPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MainPhotoEventController extends Controller
{
    // public function index(){
    //     $data['mainEvents'] = MainEventPhoto::orderBy('id', 'desc')->get();
    //     return view('admin.event.event', $data);
    // }

    public function post(){
        return view('admin.event.post-main-photo');
    }
    
    public function add(Request $r){

        $validate = Validator::make($r->all(),[
            'img' => 'required|file|image',
            'title_kh' => 'required|max:500',
            'title_en' => 'required|max:500',
            'des_kh' => 'required|max:1200',
            'des_en' => 'required|max:1200',
        ]);

        if($r->hasFile('img')){
            $data['img'] = $r->file('img')->store('/uploads/images', 'custom');
        }
        $data['title_kh'] = $r->title_kh;
        $data['title_en'] = $r->title_en;
        $data['des_kh'] = $r->des_kh;
        $data['des_en'] = $r->des_en;

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.')->withInput();
        }

        $post = MainEventPhoto::create($data);
        if($post == true){
            return redirect()->route('event.index')->with('success', 'Add new post on Event has successfully.');
        }else{
            return redirect()->back()->with('error', 'Fialed to add new post.')->withInput();
        }

        // dd($r->input());
    }

    public function delete($id){

        $check = MainEventPhoto::findOrFail($id);
        $data = $check->get()->first();
        $post = $data->title_en;
        if($data == true){
            $img = $data->img;
            if(File::exists($img)){
                File::delete($img);
            }
            $delete = $check->delete();

            if($delete == true) return redirect()->back()->with('success', 'Delete '. $post .' has successfully.');
            else return redirect()->back()->with('error', 'Failed to delete'. $post .'.');
        }
    }

    public function edit($id){
        $check = MainEventPhoto::findOrFail($id);

        $data['data'] = $check;
        return view('admin.event.edit-main-photo', $data);
    }
    
    public function doEdit(Request $r, $id){
        $check = MainEventPhoto::findOrFail($id);
        $result = $check->get()->first();


        $validate = Validator::make($r->all(),[
            'img' => 'file|image',
            'title_kh' => 'required|max:255',
            'title_en' => 'required|max:255',
            'des_kh' => 'required|max:600',
            'des_en' => 'required|max:600',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.');
        }

        $old_img = $result->img;


        if($r->hasFile('img')){

            if(File::exists($old_img)){
                File::delete($old_img);
            }

            // $data['img'] = $r->file('img')->store('/uploads/images', 'custom');
            $data['img'] = $r->file('img')->store('/uploads/images', 'custom');

        }else{
            $data['img'] = $old_img;
        }

        $data['title_kh'] = $r->title_kh;
        $data['title_en'] = $r->title_en;
        $data['des_kh'] = $r->des_kh;
        $data['des_en'] = $r->des_en;
        $edit = $check->update($data);

        if($edit == true){
            return redirect()->route('event.index')->with('success', 'Edit post on Event has successfully.');
        }else{
            return redirect()->back()->with('error', 'Fialed to edit post.');
        }

    }
}
