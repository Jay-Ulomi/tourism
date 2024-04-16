<?php

namespace App\Http\Controllers;

use App\Models\ProfileImage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileImageController extends Controller
{
    public function upload(Request $request)
    {


        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            // Store the uploaded image
            $imagePath = $request->file('image')->store('profile_images', 'public');

            // Create a new profile image record
            $profileImage = ProfileImage::create([
                'user_id' => $user->id,
                'image_path' => $imagePath,
            ]);

            // Return a JSON response with the image path
            return response()->json([
                'image_path' => asset('storage/' . $imagePath), // Assuming images are stored in the storage directory
            ]);
        } else {
            // Return a JSON response with an error message if no image was uploaded
            return response()->json([
                'error' => 'No image uploaded.',
            ], 400); // 400 Bad Request status code
        }
    }

    // Controller method to fetch the image path from the database
    public function getImage()
    {
        $id = Auth::id();
            $profile = User::find($id);
        // Retrieve the image path from the database (assuming you have a ProfileImage model)
        $profileImage = ProfileImage::where('user_id',$id)->latest()->first(); // Get the latest uploaded image
        if ($profileImage) {
            $imagePath = asset('storage/' . $profileImage->image_path); // Assuming images are stored in the storage directory
        } else {
            $imagePath = ''; // If no image is found, set the path to empty
        }

        // Return the image path as JSON response
        return response()->json([
            'image_path' => $imagePath
        ]);
}


    // You can add more methods here if needed, such as a method to fetch the image path
}
