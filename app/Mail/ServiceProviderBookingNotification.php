<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceProviderBookingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $hotel;
    public $bookingDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Hotel $hotel, $bookingDetails)
    {
        $this->user = $user;
        $this->hotel = $hotel;
        $this->bookingDetails = $bookingDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Hotel Booking')->view('Email.admin_email');
    }
}
