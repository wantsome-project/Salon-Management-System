<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $mailable = new \App\Mail\WelcomeNewUserMail($event->user);
        Mail::send($mailable);
    }
}
