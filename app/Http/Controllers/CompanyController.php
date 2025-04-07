<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\Companyinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class CompanyController extends Controller
{
    public function index(){
        $data['info'] = Companyinfo::get()->first();
        return view('admin.companys.company', $data);
    }

    public function save(Request $r){
        $check = Companyinfo::get()->first();
        
        // $logo = $check->get()->first();

        if($check == true){
            if ($r->hasFile('logo')) {
                // Check if the logo file exists in the storage
                $existingLogoPath = $r->input('old_img'); // Assuming you have the existing logo path stored
                if (File::exists($existingLogoPath)) {
                    File::delete($existingLogoPath);
                }
                // Store the new logo file
                $data['logo'] = $r->file('logo')->store('uploads/images', 'custom');
            }
            else {
                $data['logo'] = $check->logo;
            }
        }else{
            if ($r->hasFile('logo')) {
                // Check if the logo file exists in the storage
                // $existingLogoPath = $r->input('old_img'); // Assuming you have the existing logo path stored
                // if (File::exists($existingLogoPath)) {
                //     File::delete($existingLogoPath);
                // }
                // Store the new logo file
                $data['logo'] = $r->file('logo')->store('uploads/images', 'custom');
            }else{
                $data['logo'] = null;
            }
        }
        
        // Gather other data
        $data['address'] = $r->address;
        $data['location_link'] = $r->location_link;
        $data['company_email'] = $r->company_email;
        $data['company_phone'] = $r->company_phone;
        $data['copy_right'] = $r->copy_right;
        
        // dd($data);
        // Update company information
        // $update = Companyinfo::find(1);

        if($check == true){
            $run = Companyinfo::where('id', $check->id)->update($data);
        }else{
            $run = Companyinfo::create($data);
        }

        if ($run == true) {
            return redirect()->back()->with('success', 'Company information updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update company information.');
        }

        // dd($r->all());
    }

    public function social(){
        $data['socials'] = Social::orderBy('active_status', 'desc')->orderBy('id', 'desc')->get();
        return view('admin.companys.social', $data);
    }

    public function socialSave(Request $r){
        // dd($r->all());

        $validator = Validator::make($r->all(),[
            'social' => 'required',
            'link_social' => 'required|url|min:5',
        ]);

        if($validator -> fails()){
            return redirect()->back()->with('error', 'Field are required.')->withInput();
            // dd($r->all());
        }else{
            $data['social'] = $r->social;
            $data['link_social'] = $r->link_social;


            if(empty($r->active_status)){
                $data['active_status'] = 0;
            }else{
                $data['active_status'] = 1;
            }

            $check = Social::where('social', $data['social'])->exists();
            if($check != true){
                $run = Social::create($data);

                if($run == true){
                    return redirect()->back()->with('success', 'Add company social media successfully.');
                }else{
                    return redirect()->back()->with('error', 'Failed to add company social media.')->withInput();
                }
            }else{
                return redirect()->back()->with('error', ucfirst($data['social']) .' has added already.')->withInput();
            }


        }


    }



    public function delete($id){
        $check = Social::findOrFail($id);
        if($check == true){
            $check->delete();
            return redirect()->back()->with('success', 'Delete company social media successfully.');
        }else{
            return redirect()->back()->with('error', 'Fialed to elete company social media.');

        }
    }

    public function status($id){
        $check = Social::select('active_status')->where('id', $id)->get()->first();
        $run = Social::findOrFail($id);
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


    public function editForm($id){
        $data['social'] = Social::findOrFail($id);
        // $data['social'] = $run->all();
        return view('admin.companys.edit-social', $data);
    }


    public function edit(Request $r, $id){
        // dd($id);
        $validatedData = $r->validate([
            'social' => 'required|string',
            'link_social' => 'required|url',
            'active_status' => 'boolean',
        ]);
    
        // Now you can access the selected social media value here
        // $social = $validatedData['social'];

        // dd($r->social);

        // ... (rest of your update logic)

        // $validator = Validator::make($r->all(),[
        //     'social' => 'required',
        //     'link_social' => 'required|url|min:5',
        // ]);

        // $validator = $r->validate([
        //     'social' => 'required|string',
        //     'link_social' => 'required|url',
        //     'active_status' => 'boolean',
        // ]);
        // dd($r->input());


        // if($validator == false){
        //     return redirect()->back()->with('error', 'Field are required.')->withInput();
        //     dd($r->all());
        // }else{

            $data['social'] = $r->social;
            $data['link_social'] = $r->link_social;
            


            if(empty($r->active_status)){
                $data['active_status'] = 0;
            }else{
                $data['active_status'] = 1;
            }
            $fetch = Social::findOrFail($id);
            if($fetch->social == $r->social){
                $run = Social::findOrFail($id);
                $run->update($data);
                return redirect()->route('company.social')->with('success', 'Update company social media successfully.');
            }else{
                $check = Social::where('social', $data['social'])->exists();
                if($check != true){
    
                    $run = Social::findOrFail($id);
                    $run->update($data);
    
                    if($run == true){
                        return redirect()->route('company.social')->with('success', 'Update company social media successfully.');
                    }else{
                        return redirect()->route('company.social')->with('error', 'Failed to update company social media.')->withInput();
                    }
                }else{
                    return redirect()->route('company.social')->with('error', ucfirst($data['social']) .' has added already.')->withInput();
                }
            }


            


        // }


    }

}
