<?php

namespace App\Listeners\Message;

use App\Events\Message\MessageIsReceived;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message\IncomingNotificationSender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncomingSendEmailSender
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
     * @param  MessageIsReceived  $event
     * @return void
     */
    public function handle(MessageIsReceived $event)
    {
        Mail::to($event->encrypted_message->from)
            ->send(new IncomingNotificationSender($event->encrypted_message));
    }
}
