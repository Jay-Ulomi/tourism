<?php
// app/Http/Controllers/RestaurantController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Hotel;
use App\Models\Offers;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('Admin.Restaurant.add_restaurant',compact('user','categories'));
    }

    public function showRestaurant()
    {
        $user=Auth::user();
        $restaurants = Restaurant::all();

        return view('Admin.Restaurant.view_restaurant',compact('restaurants','user'));
    }


    public function store(Request $request)
{
   try{
    $validatedData = $request->validate([
        'restaurant_name' => 'required|string|max:255',
        'restaurant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'city' => 'nullable|string|max:255',
        'category_id'=>'required'
    ]);


    // Check if an image is uploaded
    if ($request->hasFile('restaurant_image')) {
        // Upload the new image
        $imagePath = $request->file('restaurant_image')->store('restaurant_images', 'public');
        $validatedData['restaurant_image'] = $imagePath;
    }
    $restaurant = Restaurant::create($validatedData);

    return back()->with('message', 'Restaurant Added successfully');
   }
   catch(\Exception $e){
    return back()->with('error', 'Error Add Restaurant ');
    }
}

    public function edit($id){
        $user=Auth::user();
        $restaurant = Restaurant::findOrFail($id);
        $categories = Category::all();
        return view('Admin.Restaurant.edit_restaurant', compact('user','restaurant','categories'));
    }

    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        try{
            $validatedData = $request->validate([
                'restaurant_name' => 'required|string|max:255',
                'restaurant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'city' => 'nullable|string|max:255',
                'category_id'=>'required'
            ]);

            // Check if an image is uploaded
            if ($request->hasFile('restaurant_image')) {
                // Upload the new image
                $imagePath = $request->file('restaurant_image')->store('restaurant_images', 'public');
                $validatedData['restaurant_image'] = $imagePath;
            }
            $restaurant->update($validatedData);

            return back()->with('message', 'Restaurant Updated successfully');
           }
           catch(\Exception $e){
            return back()->with('error', 'Error Update Restaurant ');
            }
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();


    }





    // ===========================user=============================


    public function viewRestaurants(){
        $categories=Category::all();
        $restaurants=Restaurant::all();
        return view("User.Restaurants.view-restaurant",compact(['categories','restaurants']));
    }



    public function show($id)
    {
        $category = Category::findOrFail($id);
        $restaurants = $category->restaurants;
        $offers=Offers::first();
        $hotelsOffer=Hotel::take(4)->get();
        return view("User.Restaurants.category-restaurant",compact('category','restaurants','offers','hotelsOffer'));
    }


}


