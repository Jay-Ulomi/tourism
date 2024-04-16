<?php
// HotelBookingEvent.php
namespace App\Events;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HotelBookingEvent
{
    use Dispatchable, SerializesModels;

    public $user;
    public $hotel;
    public $bookingDetails;

    public function __construct(User $user, Hotel $hotel, $bookingDetails)
    {
        $this->user = $user;
        $this->hotel = $hotel;
        $this->bookingDetails = $bookingDetails;
    }
}
