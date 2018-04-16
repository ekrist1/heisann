<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Auth\UserRequestActivationEmail' => [
            'App\Listeners\Auth\SendActivationEmail',
        ],
        'App\Events\Message\SendMessageToReceiver' => [
            'App\Listeners\Message\SendEmailToReceiver',
            'App\Listeners\Message\SendPasswordToReceiver'
        ],
        'App\Events\Payment\InvoiceCreated' => [
            'App\Listeners\Payment\SendInvoiceEmail',
        ],
        'App\Events\Message\MessageIsReceived' => [
            'App\Listeners\Message\IncomingSendEmailReceiver',
            'App\Listeners\Message\IncomingSendEmailSender',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
