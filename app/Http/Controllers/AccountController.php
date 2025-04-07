<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(){
        return view('admin.accounts.index');
    }

    public function password(){
        return view('admin.accounts.change-password');
    }

    public function change(Request $r){
        // dd($r->all());

        $current_password = $r->get('password');
        $new_password = Hash::make($r->get('new_password'));
        $c_new_password = $r->get('c_new_password');

        if(Hash::check($current_password, @Auth::user()->password)){
            $change = User::where('id', @Auth::user()->id)
                        ->update([
                            'password' => $new_password
                        ]);
            if($change == true){
                return redirect()->back()->with('success', 'Password has changed successfully.');
            }else{
                return redirect()->back()->with('error', 'Failed to change password.');
            }
        }else{
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }
    }
}
