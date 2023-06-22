<?php

namespace App\Listeners;

use App\Mail\AppointmentConfirmation;
use Illuminate\Support\Facades\Mail;

class AppointmentStatusListener
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
     * @param object $event
     * @return void
     */
    public function handle(object $event)
    {
        Mail::to($event->appointment->customer->user->email)->send( new AppointmentConfirmation($event->appointment));
    }
}
