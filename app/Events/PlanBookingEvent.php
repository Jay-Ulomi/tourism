<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\PlanBooking;

class PlanBookingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public PlanBooking $planbooking;
    public int $userId;
    public int $planId;

    /**
     * Create a new event instance.
     */
    public function __construct(PlanBooking $planbooking, int $userId, int $planId)
    {
        $this->planbooking = $planbooking;
        $this->userId = $userId;
        $this->planId = $planId;
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
