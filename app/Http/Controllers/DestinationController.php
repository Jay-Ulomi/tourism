<?php
// app/Http/Controllers/DestinationController.php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Offers;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $destinations = Destination::all();
        return view('Admin.Destination.add-destination', compact('destinations','user'));
    }

    public function showDestination(){
        $user=Auth::user();
        $destinations=Destination::all();
        return view ('Admin.Destination.view-destination',compact('destinations','user'));
    }
    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return response()->json($destination);
    }

    public function store(Request $request)
    {
        try{
        $validatedData = $request->validate([
            'destination_name' => 'required|string|max:255',
            'destination_images' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('destination_images')) {

            $imagePath = $request->file('destination_images')->store('destination_images', 'public');

            $validatedData['destination_images'] = $imagePath;
        }
        $destination = Destination::create($validatedData);

        return back()->with('message', 'Destination Added successfully');
    }
    catch(\Exception $e){
        return back()->with('error', 'Error Add Destination ');
        }
    }

    public function edit($id){
        $user=Auth::user();
        $destination = Destination::findOrFail($id);
        return view('Admin.Destination.edit-destination', compact('destination','user'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        try{
            $validatedData = $request->validate([
                'destination_name' => 'required|string|max:255',
                'destination_images' =>  'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric|gt:0',
                'description' => 'nullable|string',
            ]);

            if ($request->hasFile('destination_images')) {

                $imagePath = $request->file('destination_images')->store('destination_images', 'public');

                $validatedData['destination_images'] = $imagePath;
            }
            $destination->update($validatedData);

            return back()->with('message', 'Destination Updated successfully');
        }
        catch(\Exception $e){
            return back()->with('error', 'Error Update Destination ');
            }
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();


    }



    // ============================customer==================================

public function viewDestination(){

    $destinations=Destination::all();
    $offers=Offers::first();
    $hotelsOffer = Hotel::take(4)->get();
    return view('User.Destination.view-destination',compact('destinations','hotelsOffer','offers'));
}


}




