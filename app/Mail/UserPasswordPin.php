<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPasswordPin extends Mailable
{
    use Queueable, SerializesModels;
    public $pin;


    /**
     * Create a new message instance.
     *
     * @param $pin
     */
    public function __construct( $pin )
    {
        $this->pin = $pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.userpin')->with([
            'pin' => $this->pin
        ]);
    }
}
