<?php

namespace App\Listeners;

use App\Services\FCMService;
use App\Events\SendNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(SendNotification $event)
    {
        try {
            FCMService::send([$event->user->id] ,$event->notification); 
        } catch (\Throwable $th) {
        }
        
    }
}
