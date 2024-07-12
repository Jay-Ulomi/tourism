<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $activityId)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->activity_id = $activityId;
        $review->rating = $validated['rating'];
        $review->comment = $validated['comment'] ?? '';
        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function show($activityId)
    {
        $activity = Activity::findOrFail($activityId);
        $reviews = $activity->reviews()->with('user')->get();

        return view('activities.show', compact('activity', 'reviews'));
    }
}
