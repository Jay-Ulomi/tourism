<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Offers;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Destination;
use App\Models\Planbooking;
use App\Models\ProfileImage;
use Illuminate\Http\Request;
use App\Models\HistoricalSite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $destinations=Destination::all();
        return view('User.index',compact('destinations'));
    }

    public function Home(){
        $user = Auth::user();
        $destinations = Destination::take(5)->get();
        $offers=Offers::first();
        $hotelsOffer=Hotel::take(4)->get();
        $historicalSites=HistoricalSite::take(5)->get();
        $restaurants=Restaurant::all();
        $categories=Category::all();
        return view('User.index', compact('destinations', 'user','offers','hotelsOffer','historicalSites','categories','restaurants'));
    }


    public function about(){
        return view('User.About.about-us');
    }

    public function contact(){
        return view('User.Contact.contact-us');
    }


    public function profile(){
        $user = User::find(Auth::id());

        if (Auth::check()){
            $id = Auth::id();
            $profile = User::find($id);
            $uniqueUsername = strtolower($profile->first_name . '_' . $profile->last_name . '_' . $profile->id);

            // Retrieve the booking data using the user ID and hotel ID
             $bookingHotel = $user->hotels()->first();
             $bookingPlans=Planbooking::all( )->where('user_id','=',$id) ;



            return view('User.Profile.view-profile', compact('profile','uniqueUsername','bookingHotel','bookingPlans')) ;            // Return to the profile page with all the information of the logged in user
        }

        else {
            return redirect('/login')->with('error', 'You should login first!');
        }
    }





    public function admindashboard(){
        $user=Auth::user();
        $users=User::all()->count() - 1;
        $userss = User::all();
        $totalBookingHotels = 0;

        foreach ($userss as $user) {
            $bookingHotelCount = $user->hotels()->count();
            $totalBookingHotels += $bookingHotelCount;
        }

        $planBooking= Planbooking::all()->count();

        $totalPlanBookingPrice = Planbooking::sum('totalPrice');

    $totalHotelBookingPrice = 0;

        foreach ($userss as $user) {
        $bookingHotels = $user->hotels()->get();
        foreach ($bookingHotels as $bookingHotel) {
            $totalHotelBookingPrice += $bookingHotel->pivot->total_price;
        }
    }

    $totalPrice = $totalPlanBookingPrice + $totalHotelBookingPrice;

// dd($totalHotelBookingPrice);

            return view('Admin.dashboard',compact('user', 'users','totalBookingHotels','planBooking','totalPrice'));
        }


}
