<?php

namespace App\Listeners;

use App\Events\ProspectRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProspectNotification
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
     * @param  \App\Events\ProspectRegistered  $event
     * @return void
     */
    public function handle(ProspectRegistered $event)
    {
        //
        //Log::info($event->Prospect());
        $prospect = $event->prospect();

        Mail::to($prospect->prospect->send(new ProspectRegisteredMail($prospect)));        
    }
}
