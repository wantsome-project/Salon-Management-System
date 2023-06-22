<?php

namespace App\Mail;

use App\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;


    /**
     * Create a new message instance.
     *
     * @param Appointment $appointment
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): AppointmentConfirmation
    {
        return $this->markdown('emails.appointment-confirmation')
            ->with([
                'appointment'=> $this->appointment
            ]);
    }
}
