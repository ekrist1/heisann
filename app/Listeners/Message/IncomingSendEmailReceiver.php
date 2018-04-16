<?php

namespace App\Listeners\Message;

use App\Events\Message\MessageIsReceived;
use App\Mail\Message\IncomingNotificationReceiver;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncomingSendEmailReceiver
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
        Mail::to($event->encrypted_message->to)
            ->send(new IncomingNotificationReceiver($event->encrypted_message));
    }
}
