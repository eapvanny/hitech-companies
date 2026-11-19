<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MainEventPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $data['datas'] = Event::orderBy('id', 'desc')->get();
        $data['mainEvents'] = MainEventPhoto::orderBy('id', 'desc')->get();
        return view('admin.event.event', $data);
    }

    public function post(){
        return view('admin.event.post-event');
    }
    
    
    public function add(Request $r)
    {
        $validate = Validator::make($r->all(), [
            'img'             => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title_kh'        => 'required|max:500',
            'title_en'        => 'required|max:500',
            'description_kh'  => 'required|max:1200',
            'description_en'  => 'required|max:1200',
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $image = null;

        try {

            $image = $r->file('img')->store('uploads', 'public');

            if (!$image) {
                throw new \Exception('Image upload failed.');
            }

            $data = [
                'img'             => $image,
                'title_kh'        => $r->title_kh,
                'title_en'        => $r->title_en,
                'description_kh'  => $r->description_kh,
                'description_en'  => $r->description_en,
                'seo_title'       => $r->seo_title,
                'seo_description' => $r->seo_description,
                'active_status'   => $r->filled('active_status') ? 1 : 0,
            ];

            Event::create($data);

            return redirect()->route('event.index')
                ->with('success', 'Event created successfully.');

        } catch (\Throwable $e) {

            if ($image) {
                Storage::disk('public')->delete($image);
            }

            Log::error('Event creation failed: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to create event.')
                ->withInput();
        }
    }


    public function delete($id){

        $check = Event::findOrFail($id);
        $data = $check->get()->first();
        $post = $data->title_en;
        if($data == true){
            $img = $data->img;
            if(File::exists(storage_path('app/public/' . $img))){
                File::delete(storage_path('app/public/' . $img));
            }
            $delete = $check->delete();

            if($delete == true) return redirect()->back()->with('success', 'Delete '. $post .' has successfully.');
            else return redirect()->back()->with('error', 'Failed to delete'. $post .'.');
        }
    }

    public function status($id){
        $run = Event::findOrFail($id);
        $check = Event::select('active_status')->where('id', $id)->get()->first();
        if($check->active_status == 0){
            $run->update(['active_status' => 1]);
        }else{
            $run->update(['active_status' => 0]);
        }

        if($run == true){
            return redirect()->back()->with('success', 'Active status has changed successfully.');
            
        }else{
            return redirect()->back()->with('error', 'Fialed to changed active status.');
        }


    }

    public function edit($id){
        $check = Event::findOrFail($id);

        $data['data'] = $check;
        return view('admin.event.edit-event', $data);
    }
    
   public function doEdit(Request $r, $id)
    {
        $event = Event::findOrFail($id);

        $validate = Validator::make($r->all(), [
            'img'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'title_kh'        => 'required|max:255',
            'title_en'        => 'required|max:255',
            'description_kh'  => 'required|max:600',
            'description_en'  => 'required|max:600',
        ]);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $data = [
            'title_kh'        => $r->title_kh,
            'title_en'        => $r->title_en,
            'description_kh'  => $r->description_kh,
            'description_en'  => $r->description_en,
            'seo_title'       => $r->seo_title,
            'seo_description' => $r->seo_description,
            'active_status'   => $r->filled('active_status') ? 1 : 0,
        ];

        $oldImage = $event->img;
        $newImage = null;

        try {

            // Upload new image
            if ($r->hasFile('img')) {

                $newImage = $r->file('img')->store('uploads', 'public');

                if (!$newImage) {
                    throw new \Exception('Image upload failed.');
                }

                $data['img'] = $newImage;
            }

            // Update database
            $event->update($data);

            // Delete old image only after successful update
            if ($newImage && $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            return redirect()->route('event.index')
                ->with('success', 'Event updated successfully.');

        } catch (\Throwable $e) {

            // Remove newly uploaded image if update fails
            if ($newImage) {
                Storage::disk('public')->delete($newImage);
            }

            Log::error('Event update failed: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to update event.')
                ->withInput();
        }
    }
}
