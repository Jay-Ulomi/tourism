<?php

namespace App\Http\Controllers;

use App\Models\WebsiteReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteReviewController extends Controller
{
    public function index()
    {
        $reviews =  WebsiteReview::with('user.profileimage')->get();

        return view('User.Review.Add-review', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'title'=>'nullable|string',
        ]);

        WebsiteReview::create([
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? '',
            'title' => $validated['title'] ?? '',
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
