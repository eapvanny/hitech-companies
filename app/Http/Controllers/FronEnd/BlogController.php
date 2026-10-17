<?php

namespace App\Http\Controllers\FronEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // Load only necessary fields
        $data['blogs'] = Blog::select(
            'id', 'title', 'title_kh', 'short_text', 'short_text_kh',
            'img', 'created_at'
        )
        ->where('active_status', 1)
        ->orderByDesc('id')
        ->paginate(9); // FAST loading

        return view('front-end.blog', $data);
    }

    public function detail($id)
    {
        $blog = Blog::findOrFail($id);

        return view('front-end.blog-detail', [
            'blog' => $blog
        ]);
    }
}

