<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class SendToken extends Mailable
{
    use Queueable, SerializesModels;

    public $token_2fa;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token_2fa)
    {
        $this->token_2fa = $token_2fa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send_token')
            ->from('ikkesvar@heisann.no', Auth::user()->name)
            ->subject('Engangskode');
    }
}
