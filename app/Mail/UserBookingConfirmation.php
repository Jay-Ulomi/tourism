<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Env;

class UserBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $hotel;
    public $bookingDetails;

    public function __construct(User $user, Hotel $hotel, $bookingDetails)
    {
        $this->user = $user;
        $this->hotel = $hotel;
        $this->bookingDetails = $bookingDetails;
    }


    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Booking Confirmation')->view('Email.user_booking_confirmation');
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'User Booking Confirmation');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
