<?php

namespace App\Mail\Message;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;

class IncomingNotificationSender extends Mailable
{
    use Queueable, SerializesModels;

    public $secret_message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->secret_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.incoming.sender-notification')
            ->from('ikkesvar@heisann.no', 'Heisann')
            ->subject('Vi har mottatt din melding');
    }
}
