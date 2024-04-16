<?php
// app/Http/Controllers/GalleryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $galleries = Gallery::all();
       return view('Admin.Gallery.add_gallery',compact('user'));
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return response()->json($gallery);
    }

    public function showGallery(){
        $user=Auth::user();
        $gallies=Gallery::all();
        return view ('Admin.Gallery.view_gallery', compact('user','gallies'));
    }

    public function store(Request $request)
    {
        try{
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'gallery_image' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'city' => 'nullable|string|max:255',
        ]);

           // Check if an image is uploaded

           if ($request->hasFile('gallery_image')) {

            $imagePath = $request->file('gallery_image')->store('gallery_image', 'public');

            $validatedData['gallery_image'] = $imagePath;
        }

        $gallery = Gallery::create($validatedData);

        return back()->with('message', 'Gallery Added successfully');
    }

    catch (\Exception $e) {
        // Log the error or handle it appropriately
        return back()->with('error', 'Error Update Gallery ');
    }
}

public function edit($id){
    $user=Auth::user();
    $gallery=Gallery::findOrFail($id);
    return view("Admin.Gallery.edit_gallery",compact('user','gallery'));
}
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        try{
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'gallery_image' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'city' => 'nullable|string|max:255',
            ]);

               // Check if an image is uploaded

               if ($request->hasFile('gallery_image')) {

                $imagePath = $request->file('gallery_image')->store('gallery_image', 'public');

                $validatedData['gallery_image'] = $imagePath;
            }

            $gallery->update($validatedData);

            return back()->with('message', 'Gallery Updated successfully');
        }

        catch (\Exception $e) {
            // Log the error or handle it appropriately
            return back()->with('error', 'Error Update Gallery ');
        }

    }

    public function destroy($id)
    {

        $gallery = Gallery::findOrFail($id);
        $gallery->delete();


    }
}
