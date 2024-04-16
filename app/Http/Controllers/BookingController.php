<?php
// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\HistoricalSite;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Hotel;
use GuzzleHttp\Psr7\Message;
use App\Events\HotelBookingEvent;
use App\Mail\UserBookingConfirmation;
use App\Models\Planbooking;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index($id)
    {
        $user=Auth::user();
        $hotel = Hotel::findOrFail($id);
        return view('User.Booking.booking',compact('hotel','user'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    public function store(Request $request, $userId, $id)
    {

        try {
            $user = User::findOrFail($userId);
            $hotel = Hotel::findOrFail($id);


            // Validate the request data
            $validatedData = $request->validate([
                'check_in_date' => 'required|date',
                'check_out_date' => 'required|date|after:check_in_date',
            ]);


            // Attach the hotel to the user with additional booking information
            $user->hotels()->attach($hotel->id, [
                'check_in_date' => $validatedData['check_in_date'],
                'check_out_date' => $validatedData['check_out_date'],
                'booking_status' => 'pending',

            ]);
            $bookingDetails = $user->hotels()->where('hotel_id', $hotel->id)->first();

           event(new HotelBookingEvent($user, $hotel, $bookingDetails));
            // Return a successful response
            return redirect()->route('getcheckout');
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'Failed to attach hotel.');
        }
    }




    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'hotel_id' => 'exists:hotels,id',
            'destination_id' => 'exists:destinations,id',
            'number_people' => 'integer|min:1',
            // You can add more validation rules as needed
        ]);

        $booking->update($validatedData);

        return response()->json($booking, 200);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(null, 204);
    }



    // ===================user========================

    public function viewPlan(){
        $plans=Plan::all();
        $user=Auth::user();

        return view("User.Booking.view-bookingplan", compact('plans','user'));
    }

        public function info_plan(){
        $user=Auth::user();
        $destinations = Destination::all();
        $historicalSites = HistoricalSite::all();
        return view("User.Booking.info-booking", compact('user','destinations','historicalSites'));
    }

    public function getHotelNames(Request $request){
        $rate = $request->input('rate');

    // Query the database to get hotel names based on the selected rate
    $hotelNames = Hotel::where('rate', $rate)->pluck('hotel_name');

    return response()->json($hotelNames);
    }


    public function  store_plan(Request $request){
        $validated=$request->validated([
            'date'=>'required|date|after:today',
            'time'=>'required',
            'numberOfPeople'=>'required|integer|min:1',

        ]);

    }

    public function store_customer(Request $request){
        $user=Auth::user();
        if(!$user){
            abort(403, "You don't have permission to access this page.");
        }
        $validatedData = $request->validate([
            'rate' => 'required|numeric',
            'hotel_name' => 'required|string',
            'destination' => 'required|array',
            'destination.*' => 'exists:destinations,id', // Assuming destinations table
            'historical_site' => 'required|array',
            'historical_site.*' => 'exists:historical_sites,id', // Assuming historical_sites table
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $destinationString = implode(',', $validatedData['destination']);
        $historicalSiteString = implode(',', $validatedData['historical_site']);

        dd($validatedData);
    }


    public function payment($id){
        $user=Auth::user();
        $plan=Plan::findOrFail($id);
        return view('User.Booking.booking-payment',compact('user','plan'));

    }


    public function getcheckout(){
        return view('User.Booking.checkout');
    }


    public function checkout(Request $request)
{
    // // Validate the incoming request data
    // $validator = Validator::make($request->all(), [
    //     'title' => 'required|string',
    //     'numberOfPeople' => 'required|integer|min:1',
    //     'totalPrice' => 'required|numeric|min:0',
    //     'start_at'=>'required|date',
    //     'end_at'=>'required|date|after_or_equal:start_at',
    //     // Add more validation rules as needed
    // ]);

    // dd($validator);
    // // If validation fails, redirect back with errors
    // if ($validator->fails()) {
    //     return redirect()->back()->withErrors($validator)->withInput();
    // }

    // // Process the payment and save booking details to the database
    // // Implement your payment processing logic here (e.g., check if the card is valid)
    // // Save the booking details to the database
    // dd($validator);
    // return redirect()->route('success')->with('success', 'Booking completed successfully.');
}
}
