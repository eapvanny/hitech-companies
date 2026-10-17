<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SocietyController extends Controller
{
    public function index(){
        $data['datas'] = Society::orderBy('id', 'desc')->get();
        return view('admin.societies.society', $data);
    }

    public function post(){
        return view('admin.societies.post-society');
    }
    
    public function add(Request $r)
    {
        // Validation
        $validate = Validator::make($r->all(), [
            'img'             => 'required|file|image',
            'title_kh'        => 'required|max:255',
            'title_en'        => 'required|max:255',
            'description_kh'  => 'required|max:600',
            'description_en'  => 'required|max:600',
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->with('error', 'Fields are required.')
                ->withErrors($validate)
                ->withInput();
        }

        $data = [];
        $uploadPath = 'uploads'; // stored inside storage/app/public/uploads

        // Store image  
        if ($r->hasFile('img')) {
            // Save file in storage/app/public/uploads/images
            // DB will save: uploads/images/filename.png
            $data['img'] = $r->file('img')->store($uploadPath, 'public');
        }

        // Fill text fields
        $data['title_kh']        = $r->title_kh;
        $data['title_en']        = $r->title_en;
        $data['description_kh']  = $r->description_kh;
        $data['description_en']  = $r->description_en;
        $data['seo_title']       = $r->seo_title;
        $data['seo_description'] = $r->seo_description;

        // Active Status
        $data['active_status'] = $r->has('active_status') ? 1 : 0;

        // Save to DB
        $post = Society::create($data);

        if ($post) {
            return redirect()->back()->with('success', 'Added new post successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add new post.')->withInput();
        }
    }


    public function delete($id){

        $check = Society::findOrFail($id);
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

    public function status($id){
        $run = Society::findOrFail($id);
        $check = Society::select('active_status')->where('id', $id)->get()->first();
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
        $check = Society::findOrFail($id);

        $data['data'] = $check;
        return view('admin.societies.edit-society', $data);
    }
    
    public function doEdit(Request $r, $id)
    {
        $check = Society::findOrFail($id);

        // Validate fields
        $validate = Validator::make($r->all(), [
            'img'             => 'nullable|file|image',
            'title_kh'        => 'required|max:255',
            'title_en'        => 'required|max:255',
            'description_kh'  => 'required|max:600',
            'description_en'  => 'required|max:600',
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->with('error', 'Fields are required.')
                ->withErrors($validate)
                ->withInput();
        }

        $uploadPath = 'uploads'; // storage/app/public/uploads
        $old_img    = $check->img;
        $data       = [];

        // --------------------
        // HANDLE IMAGE UPLOAD
        // --------------------
        if ($r->hasFile('img')) {

            // Delete old image (if exists)
            if ($old_img && File::exists(storage_path('app/public/' . $old_img))) {
                File::delete(storage_path('app/public/' . $old_img));
            }

            // Store new image
            $data['img'] = $r->file('img')->store($uploadPath, 'public');

        } else {
            $data['img'] = $old_img; // keep old
        }

        // --------------------
        // UPDATE OTHER FIELDS
        // --------------------
        $data['title_kh']        = $r->title_kh;
        $data['title_en']        = $r->title_en;
        $data['description_kh']  = $r->description_kh;
        $data['description_en']  = $r->description_en;
        $data['seo_title']       = $r->seo_title;
        $data['seo_description'] = $r->seo_description;

        $data['active_status'] = $r->has('active_status') ? 1 : 0;

        // --------------------
        // SAVE TO DATABASE
        // --------------------
        $edit = $check->update($data);

        if ($edit) {
            return redirect()
                ->route('home.society')
                ->with('success', 'Edit post on Society has been updated successfully.');
        }

        return redirect()->back()->with('error', 'Failed to edit post.');
    }

}
