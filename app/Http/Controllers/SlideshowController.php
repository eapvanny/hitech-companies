<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SlideshowController extends Controller
{
    public function index(){
        $data['slides'] = Slide::orderBy('id', 'desc')->get();
        return view('admin.slides.slide', $data);
    }

    public function post(Request $r){
        $validate = Validator::make($r->all(), [
            'img' => 'required|image',
            'title_kh' => 'required|string|max:300',
            'title_en' => 'required|string|max:300',
        ]);
        
        if($validate->fails()){
            return redirect()->back()->with('error', 'Fields are required.')->withInput();
        }


        if($r->hasFile('img')){
            $data['img'] = $r->file('img')->store('/uploads/images/slides', 'custom');
        }

        $data['title_kh'] = $r->get('title_kh');
        $data['title_en'] = $r->get('title_en');

        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $post = Slide::create($data);
        if($post == true){
            return redirect()->back()->with('success', 'Post a new slide has successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to post a new slide show.')->withInput();
        }

    }

    public function delete($id){
        $check = Slide::findOrFail($id);
        $image = $check->get()->first();

        if(File::exists($image->img)) File::delete($image->img);

        $delete = $check->delete();
        if($delete == true){
            return redirect()->back()->with('success', 'Delete slide has successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to delete slide show.')->withInput();
        }
        
    }
    
    public function status($id){
        $run = Slide::findOrFail($id);
        $check = Slide::select('active_status')->where('id', $id)->get()->first();
        if($check->active_status == 0){
            $run->update(['active_status' => 1]);
        }else{
            $run->update(['active_status' => 0]);
        }

        if($run == true){
            return redirect()->back()->with('success', 'Active status has changed successfully.');
            
        }else{
            return redirect()->back()->with('error', 'Fialed to changed active status.');
        }


    }

    public function edit($id){
        $check  = Slide::findOrFail($id);
        $data['slide'] = $check->get()->first();

        return view('admin.slides.edit', $data);
    }

    public function doEdit(Request $r, $id){
        $check = Slide::findOrFail($id);
        $old_img = $check->get()->first();

        $validate = Validator::make($r->all(), [
            'img' => 'image',
            'title_kh' => 'required|string|max:300',
            'title_en' => 'required|string|max:300',
        ]);
        if($r->hasFile('img')){
            if(File::exists($old_img->img)) File::delete($old_img->img);
            $data['img'] = $r->file('img')->store('/uploads/images/slides', 'custom');
        }else{
            $data['img'] = $old_img->img;
        }

        if($validate->fails()){
            return redirect()->back()->with('error', 'Fields are required.')->withInput();
        }

        if($r->hasFile('img')){
            $data['img'] = $r->file('img')->store('/uploads/images/slides', 'custom');
        }

        $data['title_kh'] = $r->get('title_kh');
        $data['title_en'] = $r->get('title_en');

        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $update = $check->update($data);
        if($update == true){
            return redirect()->route('home.slide')->with('success', 'Edit slide has successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to edit slide show.');
        }

    }

}
