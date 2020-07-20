<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
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
        $to_name = $event->user->name;
        $to_email = $event->user->email;
        $data = ['name'=>$event->user->name];
        Mail::send(
            "emails.mail",
            $data,
            function($message) use ($to_name, $to_email){
                $message->to($to_email, $to_name)
                    ->subject("Your account has been created");
                $message->from("sirbuanca2@gmail.com","Beauty salon");
            }
        );
    }
}
