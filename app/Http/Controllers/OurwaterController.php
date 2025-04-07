<?php

namespace App\Http\Controllers;

use App\Models\Our_water;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurwaterController extends Controller
{
    public function index(){
        $data['waters'] = Our_water::all();
        return view('admin.our-waters.our-water', $data);
    }

    public function save(Request $r){
        // dd($r->input());
        $validator = Validator::make($r->all(),[
            'bottle' => 'required|string',
            'title_kh'  => 'required|string|max:255', // Adjusted max length
            'description_kh' => 'required|string|max:600', // Adjusted max length
            'title'  => 'required|string|max:255', // Adjusted max length
            'description' => 'required|string|max:600', // Adjusted max length
        ]);


        if($validator->fails()){
            return redirect()->back()->with('error', 'All fields are required')->withInput();
        }else{
            // dd('done');
            $data['bottle'] = $r->bottle;
            $data['title_kh'] = $r->title_kh;
            $data['description_kh'] = $r->description_kh;
            $data['title'] = $r->title;
            $data['description'] = $r->description;
            if(! empty($r->active_status)){
                $data['active_status'] = 1;
            }else{
                $data['active_status'] = 0;
            }
            $check = Our_water::where('bottle', $data['bottle'])->exists();
            if($check == true){
                return redirect()->back()->with('error', 'Water '. $data['bottle']. ' has added already.')->withInput();
            }else{
                $create = Our_water::create($data);

                if($create == true) return redirect()->back()->with('success', 'Our water has added successfully.');
                else return redirect()->back()->with('error', 'Failed to added our water');
            }

        }
    }


    public function delete($id){
        $delete = Our_water::findOrFail($id);
        $bottle = $delete->bottle;

        $delete->delete();
        return redirect()->back()->with('success', 'Delete water bottle '. $bottle .' has successfully.');
    }

    public function status($id){
        $check = Our_water::select('active_status')->where('id', $id)->get()->first();
        $run = Our_water::findOrFail($id);
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
    
    public function getForm($id){
        $data['social'] = Our_water::findOrFail($id);
        
        // $data['social'] = $check->get();

        // dd($data['social']);
        return view('admin.our-waters.edit-water', $data);
    }

    public function doEdit(Request $r, $id){
        $validator = Validator::make($r->all(),[
            'bottle' => 'required|string',
            'title_kh'  => 'required|string|max:255', // Adjusted max length
            'description_kh' => 'required|string|max:600', // Adjusted max length
            'title'  => 'required|string|max:255', // Adjusted max length
            'description' => 'required|string|max:600', // Adjusted max length
        ]);



        if($validator->fails()){
            return redirect()->back()->with('error', 'All fields are required')->withInput();
        }else{
            $data['bottle'] = $r->bottle;
            $data['title_kh'] = $r->title_kh;
            $data['description_kh'] = $r->description_kh;
            $data['title'] = $r->title;
            $data['description'] = $r->description;
            if(! empty($r->active_status)){
                $data['active_status'] = 1;
            }else{
                $data['active_status'] = 0;
            }

            $check = Our_water::where('bottle', $data['bottle'])->where('id', '!=', $id)->exists();
            if($check == true){
                return redirect()->back()->with('error', 'Water '. $data['bottle']. ' has added already.')->withInput();
            }else{
                $run = Our_water::findOrFail($id);
                $create = $run->update($data);

                if($create == true) return redirect()->route('our-water')->with('success', 'Our water has edited successfully.');
                else return redirect()->route('our-water')->with('error', 'Failed to edited our water');
            }
        }

    }
}
