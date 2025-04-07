<?php

namespace App\Http\Controllers;

use App\Models\User_contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data['userContacts'] = User_contact::orderBy('id', 'desc')->get();
       return view('admin.contacts.index', $data);
    }
}
