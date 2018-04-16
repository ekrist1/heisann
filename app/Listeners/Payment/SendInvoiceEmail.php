<?php

namespace App\Listeners\Payment;

use App\Events\Payment\InvoiceCreated;
use App\Mail\Invoice\SendInvoice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class SendInvoiceEmail
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
     * @param  InvoiceCreated  $event
     * @return void
     */
    public function handle(InvoiceCreated $event)
    {

        Mail::to(auth()->user()->email)
            ->send(new SendInvoice($event->invoice));
    }
}
