<?php
// app/Http/Controllers/HistoricalSiteController.php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Offers;
use Illuminate\Http\Request;
use App\Models\HistoricalSite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class HistoricalSiteController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $historicalSites = HistoricalSite::all();
        return view('Admin.HistoricalSite.add_historical',compact('user'));
    }

    public function showHistory(){
        $user=Auth::user();
        $historicalsites=HistoricalSite::all();

        return view('Admin.HistoricalSite.view_historical',compact('user','historicalsites'));
    }

    public function show($id)
    {
        $historicalSite = HistoricalSite::findOrFail($id);
        return response()->json($historicalSite);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'history_name' => 'required|string|max:255',
                'history_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'price' => 'required|numeric|gt:0',
                'city' => 'nullable|string|max:255',
            ]);

            // Check if an image is uploaded
            if ($request->hasFile('history_image')) {
                // Upload the new image
                $imagePath = $request->file('history_image')->store('history_images', 'public');
                $validatedData['history_image'] = $imagePath;
            }

            $historicalSite = HistoricalSite::create($validatedData);

            return back()->with('message', 'Historical site added successfully');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return back()->with('error', 'Error adding historical site');
        }
    }

    public function edit($id){
        $user=Auth::user();
        $historicalSite = HistoricalSite::findOrFail($id);

        return view('Admin.HistoricalSite.edit',compact('user','historicalSite'));

    }
    public function update(Request $request, $id)
    {
        $historicalSite = HistoricalSite::findOrFail($id);

        try {
            $validatedData = $request->validate([
                'history_name' => 'required|string|max:255',
                'history_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
                'price' => 'required|numeric|gt:0',
                'city' => 'nullable|string|max:255',
            ]);

            // Check if an image is uploaded
            if ($request->hasFile('history_image')) {
                // Upload the new image
                $imagePath = $request->file('history_image')->store('history_images', 'public');
                $validatedData['history_image'] = $imagePath;
            }

            $historicalSite->update($validatedData);

            return back()->with('message', 'Historical site Updated successfully');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return back()->with('error', 'Error Update historical site');
        }
    }

    public function destroy($id)
    {

        $historicalSite = HistoricalSite::findOrFail($id);
        $historicalSite->delete();


    }



// customer


public function HistoricalSites(){
    $historical=HistoricalSite::all();
    $offers=Offers::first();
    $hotelsOffer = Hotel::take(4)->get();
    return view('User.HistoricalSites.view-historicalSite',compact('historical','offers','hotelsOffer'));
}


}
