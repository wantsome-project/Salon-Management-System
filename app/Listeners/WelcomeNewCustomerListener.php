<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewCustomerListener
{

    public function handle(object $event)
    {
        $mailable = new WelcomeNewUserMail($event->user);
        Mail::send($mailable);
    }
}
