<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function detail($id){
        $check = Blog::findOrFail($id);
        if($check){
            $data['blog'] = $check;
            return view('front-end.blog-detail', $data);

        }else{
            return redirect()->back();
        }
    }
}
