<?php
// SendBookingConfirmationEmail.php
namespace App\Listeners;

use App\Events\HotelBookingEvent;
use App\Mail\ServiceProviderBookingNotification;
use App\Mail\UserBookingConfirmation;
use Illuminate\Support\Facades\Mail;

class SendBookingConfirmationEmail
{
    public function handle(HotelBookingEvent $event)
    {
        // Send email notification to the user
        Mail::to($event->user->email)->send(new UserBookingConfirmation($event->user, $event->hotel, $event->bookingDetails));

        // You can uncomment and customize these lines to send emails to the hotel and service provider
        // Mail::to($event->hotel->email)->send(new HotelBookingNotification($event->user, $event->hotel, $event->bookingDetails));

            Mail::to('ulomijay160@gmail.com')->send(new ServiceProviderBookingNotification($event->user, $event->hotel, $event->bookingDetails));

    }
}
