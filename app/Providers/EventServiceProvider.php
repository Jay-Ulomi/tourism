<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\HotelBookingEvent;
use App\Listeners\SendBookingConfirmationEmail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PlanBookingEvent;
use App\Listeners\SendPlanBookingEmail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        HotelBookingEvent::class => [
            SendBookingConfirmationEmail::class,
        ],

        PlanBookingEvent::class => [
            SendPlanBookingEmail::class,
        ],
    ];





    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
