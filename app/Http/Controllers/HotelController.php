<?php
// app/Http/Controllers/HotelController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Category;
use App\Models\Offers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function hotelindex(){
        $hotels = Hotel::all();
        $categories=Category::all();
        $offers=Offers::first();
        $hotelsOffer = Hotel::take(4)->get();
        return view('User.Hotel.hotel',compact('hotels','categories','offers','hotelsOffer'));
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        $hotels = $category->hotels;
        $offers=Offers::first();
        $offerHotel=Hotel::take(4)->get();
        return view('User.Hotel.hotel-category', compact('category', 'hotels','offers','offerHotel'));
    }


    public function index(){
        $user=Auth::user();
        $categories = Category::all();
        return view('Admin.Hotel.add_hotel',compact('user','categories'));
    }
    public function showHotel()
    {
        $user=Auth::user();
        $hotels = Hotel::all();
        return view('Admin.Hotel.view_hotels',compact('hotels','user'));
    }

    public function store(Request $request)
{
   try{
    $validatedData = $request->validate([
        'hotel_name' => 'required|string|max:255',
        'price' => 'required|numeric|gt:0',
        'hotel_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
        'city' => 'nullable|string|max:255',
        'description' => 'nullabl e|string',
        'category_id' => 'required',
        'rate' => 'numeric|min:0|max:5',
    ]);

    // Check if an image is uploaded
    if ($request->hasFile('hotel_image')) {
        $imagePath = $request->file('hotel_image')->store('hotel_images', 'public');
        $validatedData['hotel_image'] = $imagePath;
    }

    $hotel = Hotel::create($validatedData);

    return back()->with('message','Hotel Added Successful');
   }
   catch(\Exception $e){
    return back()->with('error', 'Error Add Hotel ');
   }

}


    public function edit($id){
        $user=Auth::user();
        $hotel=Hotel::findorFail($id);
        $categories = Category::all();
        return view('Admin.Hotel.edit_hotel', compact('user','hotel','categories') );
    }
    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        try{
            $validatedData = $request->validate([
                'hotel_name' => 'required|string|max:255',
                'price' => 'required|numeric|gt:0',
                'hotel_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
                'city' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required',
                'rate' => 'numeric|min:0|max:5',
                ]);

            // Check if an image is uploaded
            if ($request->hasFile('hotel_image')) {
                $imagePath = $request->file('hotel_image')->store('hotel_images', 'public');
                $validatedData['hotel_image'] = $imagePath;
            }

            $hotel->update($validatedData);

            return back()->with('message','Hotel Updated Successful');
           }
           catch(\Exception $e){
            return back()->with('error', 'Error Upate Hotel ');
           }
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();


    }


    public function hotelBooking(){
        $user=Auth::user();
        $users = User::all();
        $bookingHotels = [];

        foreach ($users as $user) {
            $bookingHotel = $user->hotels()->get(); // Retrieve all hotels for the current user
            $bookingHotels[$user->id] = $bookingHotel; // Store the hotels in an array with the user's ID as key
        }
        

        return view('Admin.Booking.Hotel-Booking', compact('user', 'users', 'bookingHotels'));
    }
}
