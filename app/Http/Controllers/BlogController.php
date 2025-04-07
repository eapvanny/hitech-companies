<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index(){
        $data['blogs'] = Blog::all();
        return view('admin.blogs.blog', $data);
    }

    public function post(){
        return view('admin.blogs.post-blog');
    }

    public function save(Request $r){
        

        $validate = Validator::make($r->all(),[
            'img' => 'required',
            'author' => 'required',
            'title' => 'required',
            'short_text' => 'required',
            'description' => 'required',

            'title_kh' => 'required',
            'short_text_kh' => 'required',
            'description_kh' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('error', 'Fields are required.')->withInput();
        }


        $data['title_kh'] = $r->title_kh;
        $data['short_text_kh'] = $r->short_text_kh;
        $data['description_kh'] = $r->description_kh;


        $data['title'] = $r->title;
        $data['short_text'] = $r->short_text;
        $data['description'] = $r->description;


        $data['seo_title'] = $r->seo_title;
        $data['seo_description'] = $r->seo_description;
        $data['author'] = $r->author;

        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        if($r->hasFile('img')){
            $data['img'] = $r->file('img')->store('/uploads/images/blogs', 'custom');
        }


        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML parsing errors
        $dom->loadHTML($data['description_kh'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Check if the image source is a base64 data URL
            // if (strpos($src, 'data:image/') === 0) {
            if (strpos($src, 'data:image/') != 0) {
                // Get the base64 encoded data
                list($type, $data) = explode(';', $src);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);

                // Define the image name and save path
                $image_name = '/uploads/images/blogs' . time() . '_' . $key . '.png';
                $file_path = public_path() . $image_name;

                // Save the image data to the file
                file_put_contents($file_path, $data);

                // Update the image src attribute
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        // Save the modified HTML
        $description1 = $dom->saveHTML();



        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML parsing errors
        $dom->loadHTML($data['description'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Check if the image source is a base64 data URL
            // if (strpos($src, 'data:image/') === 0) {
            if (strpos($src, 'data:image/') != 0) {
                // Get the base64 encoded data
                list($type, $data) = explode(';', $src);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);

                // Define the image name and save path
                $image_name = '/uploads/images/blogs' . time() . '_' . $key . '.png';
                $file_path = public_path() . $image_name;

                // Save the image data to the file
                file_put_contents($file_path, $data);

                // Update the image src attribute
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        // Save the modified HTML
        $description2 = $dom->saveHTML();

        $post = Blog::create($data);

        if($post == true) return redirect()->back()->with('success', 'A new blog has posted successfully.');
        else return redirect()->back()->with('error', 'Failed to post a new blog')->withInput();
    }

    public function detail($id){
        $check['blog'] = Blog::findOrFail($id);
        return view('admin.blogs.blog-detail', $check);
    }

    public function delete($id){
        $check =  Blog::findOrFail($id);
        $delete = $check->delete();

        if(File::exists($check->img)) File::delete($check->img);

        if($delete == true) return redirect()->back()->with('success', 'Blog from '. $check->author .' has delete successfully.');
        else return redirect()->back()->with('error', 'Failed to delete blog')->withInput();
    }

    public function status($id){
        // dd($id);
        $check =  Blog::findOrFail($id);
        if($check->active_status == 1){
            $data['active_status'] = 0;
        }else{
            $data['active_status'] = 1;
        }

        $status = $check->update([
            'active_status' => $data['active_status']
        ]);

        if($status == true){
            return redirect()->back()->with('success', 'Active status has changed successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to changed active status.');
        }
    }

    public function edit($id){
        // dd($id);
        $data['blog'] =  Blog::findOrFail($id);
        return view('admin.blogs.edit-blog', $data);
    }

    public function doEdit(Request $r, $id){
        $check =  Blog::findOrFail($id);

        $validate = Validator::make($r->all(),[
            'author' => 'required',
            
            'title' => 'required',
            'short_text' => 'required',
            'description' => 'required',

            'title_kh' => 'required',
            'short_text_kh' => 'required',
            'description_kh' => 'required',
        ]);

        $data['title_kh'] = $r->title_kh;
        $data['short_text_kh'] = $r->short_text_kh;
        $data['description_kh'] = $r->description_kh;


        $data['title'] = $r->title;
        $data['short_text'] = $r->short_text;
        $data['description'] = $r->description;

        $data['seo_title'] = $r->seo_title;
        $data['seo_description'] = $r->seo_description;
        $data['author'] = $r->author;

        if($validate->fails()){
            return redirect()->back()->with('error', 'Fields are required.')->withInput();
        }

        if(!empty($r->active_status)){
            $data['active_status'] = 1;
        }else{
            $data['active_status'] = 0;
        }

        if($r->hasFile('img')){
            if(File::exists($check->img)) File::delete($check->img);
            $data['img'] = $r->file('img')->store('/uploads/images/blogs', 'custom');
        }else{
            $data['img'] = $check->img;
        }

        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML parsing errors
        $dom->loadHTML($data['description_kh'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Check if the image source is a base64 data URL
            // if (strpos($src, 'data:image/') === 0) {
            if (strpos($src, 'data:image/') != 0) {
                // Get the base64 encoded data
                list($type, $data) = explode(';', $src);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);

                // Define the image name and save path
                $image_name = '/uploads/images/blogs' . time() . '_' . $key . '.png';
                $file_path = public_path() . $image_name;

                // Save the image data to the file
                file_put_contents($file_path, $data);

                // Update the image src attribute
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        // Save the modified HTML
        $description1 = $dom->saveHTML();



        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML parsing errors
        $dom->loadHTML($data['description'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Check if the image source is a base64 data URL
            // if (strpos($src, 'data:image/') === 0) {
            if (strpos($src, 'data:image/') != 0) {
                // Get the base64 encoded data
                list($type, $data) = explode(';', $src);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);

                // Define the image name and save path
                $image_name = '/uploads/images/blogs' . time() . '_' . $key . '.png';
                $file_path = public_path() . $image_name;

                // Save the image data to the file
                file_put_contents($file_path, $data);

                // Update the image src attribute
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        // Save the modified HTML
        $description2 = $dom->saveHTML();

        $update = $check->update($data);

        if($update == true) return redirect()->route('blog.index')->with('success', 'Blog from '. $check->author .' has updated successfully.');
        else return redirect()->back()->with('error', 'Failed to update blog');
    }
}
