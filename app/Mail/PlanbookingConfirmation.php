<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlanbookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $plan;
    public $planbooking;

    public function __construct($user, $plan, $planbooking)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->planbooking = $planbooking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Planbooking Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->markdown('Email.user-planingBooking')
                    ->subject('Confirmation for Your Planbooking');
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
