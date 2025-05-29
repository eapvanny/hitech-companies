<?php

namespace App\Http\Controllers;

use App\Models\em_message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use function Symfony\Component\String\b;

class MessageController extends Controller
{
    public function add(){
        return view('admin.abouts.add-message');
    }

    public function save(Request $r){
        // dd($r->input());

        $validate = Validator::make($r->all(),[
            'img' => 'required|image',
            'em_name' => 'required|max:255',
            'img_founder' => 'required|image',
            'founder_name' => 'required|max:255',
            'message_kh' => 'required',
            'message_en' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.');
        }

        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }
        $data['founder_name'] = $r->founder_name;
        $data['em_name'] = $r->em_name;
        $data['message_kh'] = $r->message_kh;
        $data['message_en'] = $r->message_en;



        if($r->hasFile('img')){
            $data['img'] = $r->file('img')->store('uploads/images/execute-managers', 'custom');
        }
        if($r->hasFile('img_founder')){
            $data['img_founder'] = $r->file('img_founder')->store('uploads/images/execute-managers', 'custom');
        }

        $run = em_message::create($data);
        if($run == true){
            return redirect()->back()->with('success', 'Message from execute manager has posted successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to post a new massage.');
        }
        // dd($data);
    }

    public function delete($id){
        $message = em_message::findOrFail($id)->get()->first();
        // dd($message->em_name);
        $delete = $message->delete();

        if($delete == true){
            return redirect()->back()->with('success', 'Message from '. $message->em_name . ' has deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to delete this massage.');
        }
    }

    public function status($id){
        $message = em_message::findOrFail($id);
        if($message->active_status == '1'){
            $status = $message->update(['active_status' => 0]);
        }else{
            $status = $message->update(['active_status' => 1]);
        }
        if($status == true){
            return redirect()->back()->with('success', 'Active status has changed successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to changed active status.');
        }
    }

    public function edit($id){
        $data['message'] = em_message::findOrFail($id);
        return view('admin.abouts.edit-message', $data);
    }

    public function doEdit(Request $r, $id){
        // dd($r->input());
        $message = em_message::findOrFail($id);
        $validate = Validator::make($r->all(),[
            'founder_name' => 'required|max:255',
            'em_name' => 'required|max:255',
            'message_kh' => 'required',
            'message_en' => 'required',
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error', 'Field are required.');
        }


        if($r->hasFile('img')){
            if(File::exists($message->img)){
                File::delete($message->img);
            }
            $data['img'] = $r->file('img')->store('/uploads/images/execute-managers', 'custom');
        }else{
            $data['img'] = $r->old_img;
        }

        if($r->hasFile('img_founder')){
            if(File::exists($message->img_founder)){
                File::delete($message->img_founder);
            }
            $data['img_founder'] = $r->file('img_founder')->store('/uploads/images/execute-managers', 'custom');
        }else{
            $data['img_founder'] = $r->old_img_founder;
        }
        $data['founder_name'] = $r->founder_name;
        $data['em_name'] = $r->em_name;
        $data['message_kh'] = $r->message_kh;
        $data['message_en'] = $r->message_en;

        $update = $message->update($data);
        if($update == true){
            return redirect()->route('about.company')->with('success', 'Update message from '. $message->em_name .' successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to update massage.');
        }
    }
}
