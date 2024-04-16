<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
use App\Models\Plan;
use App\Models\PlanBooking;

class PlanBookingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $planId;
    public $planbooking;
    public function __construct($userId, $planId, $planbooking)
    {
        $this->userId = $userId;
        $this->planId = $planId;
        $this->planbooking = $planbooking;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
