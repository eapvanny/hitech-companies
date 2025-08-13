<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    public function index()
    {
        $data['datas'] = Ads::orderBy('id', 'desc')->get();
        return view('admin.ads.ads', $data);
    }

    public function post()
    {
        return view('admin.ads.post-ads');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'img1.image' => 'The first image must be an image.',
            'img1.mimes' => 'The first image must be a JPEG, PNG, JPG, or GIF.',
            'img1.max' => 'The first image size must not exceed 2MB.',
            'img2.image' => 'The second image must be an image.',
            'img2.mimes' => 'The second image must be a JPEG, PNG, JPG, or GIF.',
            'img2.max' => 'The second image size must not exceed 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = [
                'active_status' => $request->has('active_status') ? 1 : 0,
            ];

            // Handle image uploads and store paths in an array
            $images = [];
            foreach (['img1', 'img2'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    // Store the image on the custom disk and get the path
                    $path = $request->file($imageField)->store('uploads/images', 'custom');
                    $images[] = $path;
                }
            }

            // Assign the array to $data['img'], let Laravel handle JSON encoding
            $data['img'] = !empty($images) ? $images : null;

            // Store the ads data
            Ads::create($data);

            return redirect()->route('home.ads')->with('success', 'New ads post added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add new post: ' . $e->getMessage())->withInput();
        }
    }
        
    public function delete($id)
    {
        try {
            $ads = ads::findOrFail($id);
    
            // Delete the associated image
            if ($ads->img) {
                // Handle case where img might be an array
                $imagePath = is_array($ads->img) ? $ads->img[0] : $ads->img;
    
                if ($imagePath && Storage::disk('custom')->exists($imagePath)) {
                    Storage::disk('custom')->delete($imagePath);
                }
            }
    
            $ads->delete();
    
            return redirect()->back()->with('success', 'ads "' . $ads->title_en . '" deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete ads: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        try {
            $ads = Ads::findOrFail($id);
            $ads->update(['active_status' => !$ads->active_status]);

            return redirect()->back()->with('success', 'Active status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update active status: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data['data'] = Ads::findOrFail($id);
            return view('admin.ads.edit-ads', $data);
        } catch (\Exception $e) {
            return redirect()->route('home.ads')->with('error', 'ads not found.');
        }
    }

    public function doEdit(Request $request, $id)
    {
        $ads = Ads::findOrFail($id);
    
        // Validate the request
        $validator = Validator::make($request->all(), [
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'img1.image' => 'The first image must be an image.',
            'img1.mimes' => 'The first image must be a JPEG, PNG, JPG, or GIF.',
            'img1.max' => 'The first image size must not exceed 2MB.',
            'img2.image' => 'The second image must be an image.',
            'img2.mimes' => 'The second image must be a JPEG, PNG, JPG, or GIF.',
            'img2.max' => 'The second image size must not exceed 2MB.',
        ]);
    
        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            // Prepare data for the update
            $data = [
                'active_status' => $request->has('active_status') ? 1 : 0,
            ];
    
            // Get current images if any
            $images = $ads->img ?? [];
    
            // Ensure the images array has at least 4 elements
            $images = array_pad($images, 2, '');
    
            // Handle image uploads for img1, img2, img3, img4
            foreach (['img1', 'img2'] as $index => $imageField) {
                // Check if the field has a file upload
                if ($request->hasFile($imageField)) {
                    // If an image already exists, delete the old one
                    if (!empty($images[$index]) && Storage::disk('custom')->exists($images[$index])) {
                        Storage::disk('custom')->delete($images[$index]);
                    }
    
                    // Store the new image and add it to the images array
                    $images[$index] = $request->file($imageField)->store('uploads/images', 'custom');
                }
            }
    
            // Update the images data
            $data['img'] = !empty(array_filter($images)) ? $images : null;
    
            // Update the ads post with the new data
            $ads->update($data);
    
            return redirect()->route('home.ads')->with('success', 'ads post updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update post: ' . $e->getMessage())->withInput();
        }
    }
}
