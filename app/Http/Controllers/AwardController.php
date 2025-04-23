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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'title_kh' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_kh' => 'required|string|max:1500',
            'description_en' => 'required|string|max:1500',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1500',
        ], [
            'img.required' => 'Please upload an image.',
            'img.image' => 'The file must be an image.',
            'img.mimes' => 'The image must be a JPEG, PNG, JPG, or GIF.',
            'img.max' => 'The image size must not exceed 2MB.',
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

            if ($request->hasFile('img')) {
                $data['img'] = $request->file('img')->store('uploads/images', 'custom');
            }

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
            if ($award->img && Storage::disk('custom')->exists($award->img)) {
                Storage::disk('custom')->delete($award->img);
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

        $validator = Validator::make($request->all(), [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'title_kh' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_kh' => 'required|string|max:1500',
            'description_en' => 'required|string|max:1500',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:1500',
        ], [
            'img.image' => 'The file must be an image.',
            'img.mimes' => 'The image must be a JPEG, PNG, JPG, or GIF.',
            'img.max' => 'The image size must not exceed 2MB.',
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

            if ($request->hasFile('img')) {
                // Delete old image if it exists
                if ($award->img && Storage::disk('custom')->exists($award->img)) {
                    Storage::disk('custom')->delete($award->img);
                }
                $data['img'] = $request->file('img')->store('uploads/images', 'custom');
            }

            $award->update($data);

            return redirect()->route('home.award')->with('success', 'Award post updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update post: ' . $e->getMessage())->withInput();
        }
    }
}