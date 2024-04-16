<?php
// app/Http/Controllers/CategoryOfferController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryOffer;

class CategoryOfferController extends Controller
{
    public function index()
    {
        $categoryOffers = CategoryOffer::all();
        return response()->json($categoryOffers);
    }

    public function show($id)
    {
        $categoryOffer = CategoryOffer::findOrFail($id);
        return response()->json($categoryOffer);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'offer_id' => 'required|exists:offers,id',
        ]);

        $categoryOffer = CategoryOffer::create($validatedData);

        return response()->json($categoryOffer, 201);
    }

    public function update(Request $request, $id)
    {
        $categoryOffer = CategoryOffer::findOrFail($id);

        $validatedData = $request->validate([
            'category_id' => 'exists:categories,id',
            'offer_id' => 'exists:offers,id',
        ]);

        $categoryOffer->update($validatedData);

        return response()->json($categoryOffer, 200);
    }

    public function destroy($id)
    {
        $categoryOffer = CategoryOffer::findOrFail($id);
        $categoryOffer->delete();

        return response()->json(null, 204);
    }
}
