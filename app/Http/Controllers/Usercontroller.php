<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function index(){
        // dd('hi');
        $data['users'] = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', $data);
    }

    public function add(){
        return view('admin.users.add-user');
    }

    public function save(Request $r){
        $data['name'] = $r->name;
        $data['email'] = $r->email;
        $data['password'] = Hash::make($r->password);
        $data['role'] = $r->role;

        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $addUser = User::create($data);

        if($addUser == true){
            return redirect()->back()->with('success', 'Add user a has successfully.');
        }else 
            return redirect()->back()->with('error', 'Failed to add a user.');

    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.users.edit-user', compact('user'));
        // dd($check);
    }

    public function doEdit(Request $r, $id){
        $check = User::findOrFail($id);
        $data['name'] = $r->name;
        $data['email'] = $r->email;
        $data['role'] = $r->role;

        if(! empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        $update = $check->update($data);

        if($update == true) return redirect()->route('user.index')->with('success', 'User has updated successfully.');
        else return redirect()->back()->with('error', 'User has updated successfully.');
    }

    public function resetPass(Request $r, $id){
        // dd($r->input());
        $user = @Auth::user();

        $operator = $r->password;
        if(Hash::check($operator, $user->password)){
            $password_reset = Hash::make('666666');
            $check = User::findOrFail($id);

            $update = $check->update([
                'password' => $password_reset
            ]);

            if($update == true){
                return redirect()->back()->with('success', 'Reset password for '. $check->name .' has successfully.');
            }else{
                return redirect()->back()->with('error', 'Failed to reset password for '. $check->name . '.');
            }
        }else{
            return redirect()->back()->with('error', 'Operator password is invalid.');
        }
    }

    public function block(Request $r, $id){
        // dd($r->input());
        $user = @Auth::user();

        $operator = $r->password;
        if(Hash::check($operator, $user->password)){
            $check = User::findOrFail($id);
            if($check->active_status == '1'){
                $status = 0;
                $blocked = 'Blocked';
            }else{
                $status = 1;
                $blocked = 'Unblocked';
            }

            $update = $check->update([
                'active_status' => $status
            ]);

            if($update == true){
                return redirect()->back()->with('success', 'User account '. $check->name .' has ' . $blocked .' successfully.');
            }else{
                return redirect()->back()->with('error', 'Failed to '. $blocked .' for '. $check->name . '.');
            }
        }else{
            return redirect()->back()->with('error', 'Operator password is invalid.');
        }
    }

    public function delete(Request $r, $id){
        // dd($r->input());
        $user = @Auth::user();
        $operator = $r->password;
        if($user->role == 'superadmin'){
            if(Hash::check($operator, $user->password)){
                $check = User::findOrFail($id);
                $delete = $check->delete();
                if($delete == true){
                    return redirect()->back()->with('success', 'User account '. $check->name .' has delete successfully.');
                }else{
                    return redirect()->back()->with('error', 'Failed to delete user account '. $check->name . '.');
                }
            }else{
                return redirect()->back()->with('error', 'Super admin password is invalid.');
            }
        }else{
            return redirect()->back()->with('error', 'Only super admin can delete the user.');
        }
    }


    public function logout()
    {
    //    dd("Logout");
        Auth::logout();
        return redirect()->route('user.home');
    }
}
