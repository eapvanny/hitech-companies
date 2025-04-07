<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $r){
        $credentials = [
            'email' => $r->get('email'),
            'password' => $r->get('password'),
            'active_status' => 1
        ];
        
        // $check = User::select('active_status')->where('email', $r->get('email'))->get()->first();
        // dd($check);
        // if($check->active_status == 1){
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->intended('/admin/dashboard'); // Change 'dashboard' to your intended route
            }
        // }
    
        // Authentication failed...
        return redirect()->back()->with('invalid', 'Invalid Username or Password.')->withInput();
    }
}
