<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServicePlanbookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plan;
    public $planbooking;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $plan, $planbooking)
    {
        $this->user = $user;
        $this->plan = $plan;
        $this->planbooking = $planbooking;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('Email.admin-planningbooking')
                    ->subject('New Plan Booking')
                    ->with([
                        'user' => $this->user,
                        'plan' => $this->plan,
                        'planbooking' => $this->planbooking,
                    ]);
    }
}
