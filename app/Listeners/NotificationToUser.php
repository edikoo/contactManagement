<?php

namespace App\Listeners;

use App\Events\NotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Services\NotificationService;

class NotificationToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        $NotificationService = new NotificationService;
        $NotificationService->createNotification('User', $event->notification);
    }
}
