<?php

namespace App\Listeners;

use App\Events\PlanBookingEvent;
use App\Mail\PlanbookingConfirmation;
use App\Mail\ServicePlanbookingConfirmation;
use App\Mail\UserBookingConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Plan;
use App\Models\PlanBooking;
class SendPlanBookingEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PlanBookingEvent $event)
    {
        $userId = $event->userId;
        $planId = $event->planId;
        $planbooking = $event->planbooking;

        $user = User::find($userId);
        $plan = Plan::find($planId);

        // Send email to the user
        Mail::to($user->email)->send(new PlanbookingConfirmation($user, $plan, $planbooking));

        // Send email to the hotel
        // Mail::to($plan->hotel->email)->send(new HotelBookingNotification($user, $plan, $booking));

        // Send email to the service provider
        Mail::to('ulomijay160@gmail.com')->send(new ServicePlanbookingConfirmation($user, $plan, $planbooking));    }
}
