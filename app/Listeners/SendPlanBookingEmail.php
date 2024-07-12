<?php

namespace App\Listeners;

use App\Events\PlanBookingEvent;
use App\Mail\PlanbookingConfirmation;
use App\Mail\ServicePlanbookingConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Plan;
use App\Models\PlanBooking;

class SendPlanBookingEmail implements ShouldQueue
{
    use InteractsWithQueue;

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
        $planbooking = PlanBooking::find($event->planbooking->id);

        if (!$planbooking) {
            // Log an error or handle the case where the plan booking is not found
            return back()->with("PlanBooking not found for PlanBookingEvent: planbooking_id={$event->planbooking->id}");

        }

        $user = $planbooking->user;
        $plan = $planbooking->plan;

        if ($user && $plan) {
            // Send email to the user
            Mail::to($user->email)->send(new PlanbookingConfirmation($user, $plan, $planbooking));

            // Assuming the plan has an associated service provider email
            $serviceProviderEmail = $plan->service_provider_email ?? 'ulomijay160@gmail.com';

            // Email addresses to send the confirmation
            $emailRecipients = [$serviceProviderEmail, 'nicksfrumence@gmail.com'];

            // Send email to the service provider and the additional email
            Mail::to($emailRecipients)->send(new ServicePlanbookingConfirmation($user, $plan, $planbooking));

        } else {
            // Log an error or handle the case where user or plan is not found
            return back()->with( 'error',("User or Plan not found for PlanBookingEvent: user_id={$user}, plan_id={$plan}"));
        }
    }
}
