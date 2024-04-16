<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
        try {
            $plans = Plan::all();
            return view('plans.index', compact('plans'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error fetching plans');
        }
    }

    public function create()
    {
        $user=Auth::user();
        return view('Admin.Plan.add-plan',compact('user'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'info' => 'required|string',
            ]);

            // Adjust the 'info' field to split categories by commas and store them in an array
            $categories = explode(',', $validatedData['info']);
            $validatedData['info'] = $categories;

            // dd($validatedData);
            $plan = Plan::create($validatedData);


            return back()->with('message', 'Plan added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error adding plan');
        }
    }

    public function edit($id)
    {
        try {
            $plan = Plan::findOrFail($id);
            return view('plans.edit', compact('plan'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error fetching plan details');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'info' => 'required|json',
            ]);

            $plan = Plan::findOrFail($id);
            $plan->update($validatedData);

            return redirect()->route('plans.index')->with('success', 'Plan updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating plan');
        }
    }

    public function destroy($id)
    {
        try {
            $plan = Plan::findOrFail($id);
            $plan->delete();

            return redirect()->route('plans.index')->with('success', 'Plan deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting plan');
        }
    }
}
