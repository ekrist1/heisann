<?php

namespace App\Mail\Message;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ReceiverNotificationEmail extends Mailable
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
        return $this->markdown('emails.receiver-notification')
            ->from('ikkesvar@heisann.no', Auth::user()->name)
            ->subject('Du har mottatt en sikker melding');
    }
}
