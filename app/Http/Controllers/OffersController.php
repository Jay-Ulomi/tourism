<?php
// app/Http/Controllers/OffersController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offers;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        return view('Admin.Offer.add-offer',compact('user'));
    }

    public function showOffer(){
        $user= Auth::user();
        $offers=Offers::all();

        return view('Admin.Offer.view-offer', compact('user','offers'));
    }

    public function show($id)
    {
        $offer = Offers::findOrFail($id);
        return response()->json($offer);
    }

    public function store(Request $request)
    {
        try{
        $validatedData = $request->validate([
            'offer_title' => 'required|string|max:255',
            'percent'=>'required|integer|max:100',
        ]);

        $offer = Offers::create($validatedData);

        return back()->with('message', 'Offer Added successfully');
    }
    catch(\Exception $e){
        return back()->with('error', 'Error Add Offer ');
    }
    }

    public function edit($id){
        $user=Auth::user();
        $offer = Offers::findOrFail($id);
        return view('Admin.Offer.edit-offer', compact('user','offer'));

    }

    public function update(Request $request, $id)
    {
        $offer = Offers::findOrFail($id);

        try{
            $validatedData = $request->validate([
                'offer_title' => 'required|string|max:255',
                'percent'=>'required|integer|max:100',
            ]);

            $offer->update($validatedData);

            return back()->with('message', 'Offer Updated successfully');
        }
        catch(\Exception $e){
            return back()->with('error', 'Error Update Offer ');
        }
    }

    public function destroy($id)
    {
        $offer = Offers::findOrFail($id);
        $offer->delete();


    }
}
