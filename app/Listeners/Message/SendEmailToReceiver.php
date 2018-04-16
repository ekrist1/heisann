<?php

namespace App\Listeners\Message;

use App\Events\Message\SendMessageToReceiver;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Message\ReceiverNotificationEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailToReceiver implements ShouldQueue
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
     * @param  SendMessageToReceiver  $event
     * @return void
     */
    public function handle(SendMessageToReceiver $event)
    {
        //dd($event->encrypted_message->to);
        Mail::to($event->encrypted_message->to)
            ->send(new ReceiverNotificationEmail($event->encrypted_message));
    }
}
