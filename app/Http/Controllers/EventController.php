<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $data['datas'] = Event::orderBy('id', 'desc')->get();
        return view('admin.event.event', $data);
    }

    public function post(){
        return view('admin.event.post-event');
    }
    
    public function add(Request $r){

        $validate = Validator::make($r->all(),[
            'img' => 'required|file|image',
            'title_kh' => 'required|max:500',
            'title_en' => 'required|max:500',
            'description_kh' => 'required|max:1200',
            'description_en' => 'required|max:1200',
        ]);

        if($r->hasFile('img')){
            $data['img'] = $r->file('img')->store('/uploads/images', 'custom');
        }
        $data['title_kh'] = $r->title_kh;
        $data['title_en'] = $r->title_en;
        $data['description_kh'] = $r->description_kh;
        $data['description_en'] = $r->description_en;

        $data['seo_title'] = $r->seo_title;
        $data['seo_description'] = $r->seo_description;

        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.')->withInput();
        }

        $post = Event::create($data);
        if($post == true){
            return redirect()->route('event.index')->with('success', 'Add new post on Event has successfully.');
        }else{
            return redirect()->back()->with('error', 'Fialed to add new post.')->withInput();
        }

        // dd($r->input());
    }

    public function delete($id){

        $check = Event::findOrFail($id);
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
        $run = Event::findOrFail($id);
        $check = Event::select('active_status')->where('id', $id)->get()->first();
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
        $check = Event::findOrFail($id);

        $data['data'] = $check;
        return view('admin.event.edit-event', $data);
    }
    
    public function doEdit(Request $r, $id){
        $check = Event::findOrFail($id);
        $result = $check->get()->first();


        $validate = Validator::make($r->all(),[
            'img' => 'file|image',
            'title_kh' => 'required|max:255',
            'title_en' => 'required|max:255',
            'description_kh' => 'required|max:600',
            'description_en' => 'required|max:600',
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
        $data['description_kh'] = $r->description_kh;
        $data['description_en'] = $r->description_en;

        $data['seo_title'] = $r->seo_title;
        $data['seo_description'] = $r->seo_description;

        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $edit = $check->update($data);

        if($edit == true){
            return redirect()->route('event.index')->with('success', 'Edit post on Event has successfully.');
        }else{
            return redirect()->back()->with('error', 'Fialed to edit post.');
        }

    }
}
