<?php

namespace App\Http\Controllers;

use App\Models\Planbooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PlanBookingEvent;


class PlanbookingController extends Controller
{


    public function index()
    {
        // Retrieve all plan bookings
        $planbookings = Planbooking::all();

        return view('planbookings.index', compact('planbookings'));
    }

    public function planStore(Request $request, $planId)
    {
        try {
            // Get the authenticated user's ID
            $userId = Auth::id();

            // Validate the request data
            $validatedData = $request->validate([
                'numberOfPeople' => 'required|integer',
                'start_at' => 'required|date',
                'end_at' => 'required|date',
                'activities' => 'array',
            ]);

            // Assign additional fields
            $validatedData['user_id'] = $userId;
            $validatedData['plan_id'] = $planId;
            $validatedData['totalPrice'] = 0;
            $validatedData['booking_status'] = 'pending';
            $validatedData['activities'] = json_encode($validatedData['activities'] ?? []);

            // Create a new plan booking
            $planbooking = PlanBooking::create($validatedData);

            // Fire the event
            event(new PlanBookingEvent($planbooking, $planId, $userId ));

            // Return a success response
            return redirect()->route('getcheckout')->with('success', 'Booking created successfully.');

        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }



    public function edit($id)
    {
        // Retrieve the plan booking to edit
        $planbooking = Planbooking::findOrFail($id);

        // Return view for editing the plan booking
        return view('planbookings.edit', compact('planbooking'));
    }


    public function updatePlanstore(Request $request, $planId,$id)
    {
        try {
            // Decode the planId if it's encoded
            $plan_id = $planId;

            // Get the authenticated user's ID
            $user_id = Auth::id();

            // Validate the request data
            $validatedData = $request->validate([
                'numberOfPeople' => 'required|integer',
                'totalPrice' => 'required|numeric',
                'start_at' => 'required|date',
                'end_at' => 'required|date',
            ]);

            // Assign user_id and plan_id directly
            $validatedData['user_id'] = $user_id;
            $validatedData['plan_id'] = $plan_id;
            $validatedData['booking_status']='pending';

            // Check if the authenticated user is the owner of the plan
            if ($validatedData['user_id'] != $user_id) {
                return response(['message' => "You don't have permission to book this plan."], 403);
            }

            $planbooking = Planbooking::findOrFail($id);

            // Create a new plan booking
            $planbooking->update($validatedData);

            // Return a success response
            return response(['message' => 'The plan has been successfully booked'], 200);
        } catch (\Exception $e) {
            // Return an error response if an exception occurs
            return response(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        // Find the plan booking to delete
        $planbooking = Planbooking::findOrFail($id);

        // Delete the plan booking
        $planbooking->delete();

        // Redirect back with success message
        // return redirect()->back()->with('messsage', 'Plan booking deleted successfully!');
    }


    //===================Admin=======================//
    public function  planBooking(){
        $user=Auth::user() ;
        $planbookings = Planbooking::all();

        return view('Admin.Booking.Planning-Booking',compact('planbookings','user'));
    }

    public function planinvoice($id)
        {
            $user=Auth::user() ;
            $planbooking = Planbooking::findOrFail($id);
            return view ('Admin.Invoice.Generate-Invoice', compact('planbooking','user'));
        }

        public function delete($id)
    {
        // Find the plan booking to delete
        $planbooking = Planbooking::findOrFail($id);

        // Delete the plan booking
        $planbooking->delete();

        // Redirect back with success message
        return redirect()->back()->with('messsage', 'Plan booking deleted successfully!');
    }

}
