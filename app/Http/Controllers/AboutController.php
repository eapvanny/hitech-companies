<?php

namespace App\Http\Controllers;

use App\Models\About;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// DOMDocument
class AboutController extends Controller
{
    public function index(){
        $about = About::get()->first();
        return view('admin.abouts.about', compact('about'));
    }

    public function edit(){
        $about = About::get()->first();
        return view('admin.abouts.edit-about', compact('about'));
    }


    public function store(Request $r){
        // dd($r->file('img'));

        // if($r->hasFile('img')){
            $old_thumbnail = $r->old_thumbnail;

           
            if(!empty($r->file('img'))){

                // dd($r->file('img'));

                if(File::exists($old_thumbnail)){
                    File::delete($old_thumbnail);
                }
                $img_thumbnail = $r->file('img')->store('/uploads/images', 'custom');
            }else{
                $img_thumbnail = $old_thumbnail;
            }

            $title_kh = $r->title_kh;
            $title_en = $r->title_en;

            // $description_kh = $r->description_kh;
            // $description_en = $r->description_en;

            if(!empty($r->active_status)){
                $active_status = $r->active_status;
            }else{
                $active_status = 0;
            }
            
            $dom = new DOMDocument();

            libxml_use_internal_errors(true); // Suppress HTML parsing errors
            
            $dom->loadHTML($title_kh, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
                    $image_name = '/uploads/images/' . time() . '_' . $key . '.png';
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


            $dom->loadHTML($title_en, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            $images = $dom->getElementsByTagName('img');

            foreach ($images as $key => $img) {
                $src = $img->getAttribute('src');

                // Check if the image source is a base64 data URL
                if (strpos($src, 'data:image/') === 0) {
                    // Get the base64 encoded data
                    list($type, $data) = explode(';', $src);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);

                    // Define the image name and save path
                    $image_name = '/uploads/images/' . time() . '_' . $key . '.png';
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

            // $id = 1;
            $about = About::get()->first();

            if($about == true){
                $update = About::where('id', $about->id)->update([
                    'img' => $img_thumbnail, // Corrected the typo to img_thumbnail
                    'title_kh' => $title_kh,
                    'title_en' => $title_en,
                    'active_status' => $active_status,
                ]);
            }else{
                $update = About::create([
                    'img' => $img_thumbnail, // Fixed typo from img_thumnial to img_thumbnail
                    'title_kh' => $title_kh,
                    'title_en' => $title_en,
                    'active_status' => $active_status,
                ]);
            }

            // if ($about) {
                
            
                if ($update) {
                    return redirect()->route('about.index')->with('success', 'About page has been updated successfully.');
                } else {
                    return redirect()->route('about.index')->with('error', 'Failed to update the about page.');
                }

            // } else {
            //     return redirect()->route('about.index')->with('error', 'About page not found.');
            // }



        // }else{
        //     return redirect()->back()->with('error', 'Image for thumbnail is required.')->withInput();
        // }
    }

    // public function upload(Request $request){
    //     if($request->hasFile('upload')){
    //         $originName = $request->file('upload')->getclientoriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getclientoriginalExtension();
    //         $fileName = $fileName .'_'. time().'.'.$extension;
    //         $request->file('upload')->move(public_path('media'),$fileName);
    //         $url = asset('media/'. $fileName);
            
    //         return response()->json(['fileName' => $fileName,'uploaded'=> 1, 'url'=> $url]);
            
    //     }
        
    // }
}
