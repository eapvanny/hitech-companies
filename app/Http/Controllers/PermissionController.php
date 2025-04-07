<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['permissions'] = Permission::orderBy('id', 'desc')->get();
        return view('admin.permissions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return ('HI add');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $validate = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'A permission is required and has a Unique name.')->withInput();
        }else{
            $data['name'] = $request->name;
            $data['guard_name'] = @Auth::user()->name;
            $create = Permission::create($data);
        }

        if($create == true){
            return redirect()->back()->with('success', 'A permission has added successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to add a permission.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);\
        $permission_check = Permission::findOrFail($id);

        $validate = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name',
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error', 'A permission is required and has a Unique name.')->withInput();
        }else{
            $data['name'] = $request->name;
            $data['guard_name'] = @Auth::user()->name;
            // $create = Permission::create($data);
        }

        $update = $permission_check->update($data);
        if($update == true){
            return redirect()->back()->with('success', 'Permission has updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to update permission.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $r, $id)
    {
        // dd($id);
        $user = @Auth::user();

        $check_role = $user->role;
        if($check_role == 'superadmin'){
            if(Hash::check($r->password, $user->password)){
                $check = Permission::findOrFail($id);
                $check->delete();
                return redirect()->back()->with('success', 'Delete '. $check->name . ' has successfully.');
            }else{
                // return redirect()->back()->with('error', 'Only super amdin can delete permission.');
                return redirect()->back()->with('error', 'Super admin password is invalid.');

            }
        }else{
            return redirect()->back()->with('error', 'Only super amdin can delete permission.');
        }
        
    }
}
