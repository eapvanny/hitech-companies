<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AwardController extends Controller
{
    public function index()
    {
        $data['datas'] = Award::orderBy('id', 'desc')->get();
        return view('admin.award.award', $data);
    }

    public function post()
    {
        return view('admin.award.post-award');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title_kh' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_kh' => 'required|string|max:1500',
            'description_en' => 'required|string|max:1500',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1500',
        ], [
            'img1.image' => 'The first image must be an image.',
            'img1.mimes' => 'The first image must be a JPEG, PNG, JPG, or GIF.',
            'img1.max' => 'The first image size must not exceed 2MB.',
            'img2.image' => 'The second image must be an image.',
            'img2.mimes' => 'The second image must be a JPEG, PNG, JPG, or GIF.',
            'img2.max' => 'The second image size must not exceed 2MB.',
            'img3.image' => 'The third image must be an image.',
            'img3.mimes' => 'The third image must be a JPEG, PNG, JPG, or GIF.',
            'img3.max' => 'The third image size must not exceed 2MB.',
            'img4.image' => 'The fourth image must be an image.',
            'img4.mimes' => 'The fourth image must be a JPEG, PNG, JPG, or GIF.',
            'img4.max' => 'The fourth image size must not exceed 2MB.',
            'title_kh.required' => 'The Khmer title is required.',
            'title_en.required' => 'The English title is required.',
            'description_kh.required' => 'The Khmer description is required.',
            'description_en.required' => 'The English description is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $data = [
                'title_kh' => $request->title_kh,
                'title_en' => $request->title_en,
                'description_kh' => $request->description_kh,
                'description_en' => $request->description_en,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'active_status' => $request->has('active_status') ? 1 : 0,
            ];

            // Handle image uploads and store paths in an array
            $images = [];
            // foreach (['img1', 'img2', 'img3', 'img4'] as $imageField) {
            //     if ($request->hasFile($imageField)) {
            //         // Store the image on the custom disk and get the path
            //         $path = $request->file($imageField)->store('uploads/images', 'custom');
            //         $images[] = $path;
            //     }
            // }

            $uploadPath = 'uploads'; // storage/app/public/uploads

            /** HANDLE IMAGE UPLOADS (img1 - img4) **/
            foreach (['img1', 'img2', 'img3', 'img4'] as $index => $fieldName) {

                if ($request->hasFile($fieldName)) {
                    // Upload new image to public storage
                    $images[$index] = $request->file($fieldName)->store($uploadPath, 'public');
                }
            }

            // Assign the array to $data['img'], let Laravel handle JSON encoding
            $data['img'] = !empty($images) ? $images : null;

            // Store the award data
            Award::create($data);

            return redirect()->route('home.award')->with('success', 'New award post added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add new post: ' . $e->getMessage())->withInput();
        }
    }
        
    public function delete($id)
    {
        try {
            $award = Award::findOrFail($id);
    
            // Delete the associated image
            if ($award->img) {
                foreach ($award->img as $imagePath) {
                    if (Storage::disk('public')->exists($imagePath)) {
                        Storage::disk('public')->delete($imagePath);
                    }
                }
            }
    
            $award->delete();
    
            return redirect()->back()->with('success', 'Award "' . $award->title_en . '" deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete award: ' . $e->getMessage());
        }
    }

    public function status($id)
    {
        try {
            $award = Award::findOrFail($id);
            $award->update(['active_status' => !$award->active_status]);

            return redirect()->back()->with('success', 'Active status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update active status: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $data['data'] = Award::findOrFail($id);
            return view('admin.award.edit-award', $data);
        } catch (\Exception $e) {
            return redirect()->route('home.award')->with('error', 'Award not found.');
        }
    }

    public function doEdit(Request $request, $id)
    {
        $award = Award::findOrFail($id);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'img1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title_kh' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_kh' => 'required|string|max:1500',
            'description_en' => 'required|string|max:1500',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $data = [
                'title_kh'        => $request->title_kh,
                'title_en'        => $request->title_en,
                'description_kh'  => $request->description_kh,
                'description_en'  => $request->description_en,
                'seo_title'       => $request->seo_title,
                'seo_description' => $request->seo_description,
                'active_status'   => $request->has('active_status') ? 1 : 0,
            ];

            /** CURRENT IMAGES **/
            $images = is_array($award->img) ? $award->img : [];
            $images = array_pad($images, 4, null); // ensure 4 positions

            /** UPLOAD PATH **/
            $uploadPath = 'uploads'; // storage/app/public/uploads

            /** HANDLE IMAGE UPLOADS (img1 - img4) **/
            foreach (['img1', 'img2', 'img3', 'img4'] as $index => $fieldName) {

                if ($request->hasFile($fieldName)) {

                    // Delete old image from correct path
                    if (!empty($images[$index]) && Storage::disk('public')->exists($images[$index])) {
                        Storage::disk('public')->delete($images[$index]);
                    }

                    // Upload new image to public storage
                    $images[$index] = $request->file($fieldName)->store($uploadPath, 'public');
                }
            }

            /** UPDATE IMAGES ARRAY **/
            $filteredImages = array_filter($images); // remove null/empty
            $data['img'] = !empty($filteredImages) ? $images : null;

            /** UPDATE DATABASE **/
            $award->update($data);

            return redirect()->route('home.award')->with('success', 'Award post updated successfully.');

        } catch (\Exception $e) {

            return redirect()->back()
                ->with('error', 'Failed to update post: ' . $e->getMessage())
                ->withInput();
        }
    }


}