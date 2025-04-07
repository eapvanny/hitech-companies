<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\User_contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function save(Request $r){
        // dd($r->input());

        $validate = Validator::make($r->all(),[
            'email' => 'required|email',
        ]);

        if($validate -> fails()){
            return redirect()->back()->withInput();
        }else{
            $data['name'] = $r->get('name');
            $data['email'] = $r->get('email');
            $data['subject'] = $r->get('subject');
            $data['phone'] = $r->get('phone');
            $data['description'] = $r->get('description');


            $create = User_contact::create($data);

            if($create == true){
                return redirect()->back()->with('success', true);
            }else{
                return redirect()->back()->with('error', true)->withInput();
            }
        }
    }
}
