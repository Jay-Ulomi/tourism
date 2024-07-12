<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $activities = Activity::all();

        return view('Admin.Activitiesall.View-Activity', compact('activities', 'user'));
    }

    public function addActivities()
    {

        $user = Auth::user();
        return view('Admin.Activitiesall.Add-Activity', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $images = [];
            for ($i = 1; $i <= 4; $i++) {
                $imageKey = 'image' . $i;
                if ($request->hasFile($imageKey)) {
                    $imagePath = $request->file($imageKey)->store('activities', 'public');
                    $images[$imageKey] = $imagePath;
                }
            }

            $activity = new Activity();
            $activity->title = $validatedData['title'];
            $activity->description = $validatedData['description'];
            $activity->image1 = $images['image1'] ?? null;
            $activity->image2 = $images['image2'] ?? null;
            $activity->image3 = $images['image3'] ?? null;
            $activity->image4 = $images['image4'] ?? null;
            $activity->save();

            return redirect()->route('activities.index')->with('success', 'Activity created successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }



    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        try {
            $activity = Activity::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            for ($i = 1; $i <= 4; $i++) {
                $imageKey = 'image' . $i;
                if ($request->hasFile($imageKey)) {
                    // Delete old image
                    if ($activity->$imageKey) {
                        Storage::delete('public/' . $activity->$imageKey);
                    }

                    // Store new image
                    $imagePath = $request->file($imageKey)->store('activities', 'public');
                    $activity->$imageKey = $imagePath;
                }
            }

            $activity->title = $validatedData['title'];
            $activity->description = $validatedData['description'];
            $activity->save();

            return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $activity = Activity::findOrFail($id);

            // Delete images from storage
            for ($i = 1; $i <= 4; $i++) {
                $imageField = 'image' . $i;
                if ($activity->$imageField) {
                    Storage::delete('public/' . $activity->$imageField);
                }
            }

            $activity->delete();

            return redirect()->back()->with('success', 'Activity deleted successfully.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function viewall()
    {
        $user = Auth::user();
        $activities = Activity::all();

        return view('User.Activity.All-Activities', compact('activities', 'user'));
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        $reviews = $activity->reviews()->with('user.profileimage')->get();
      
        return view('User.Activity.Info-Activity', compact('activity','reviews'));
    }

}
