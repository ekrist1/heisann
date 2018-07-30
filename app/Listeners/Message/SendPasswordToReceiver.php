<?php

namespace App\Listeners\Message;

use App\Events\Message\SendMessageToReceiver;
use App\OnetimeCode;
use App\Company;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Nexmo\Laravel\Facade\Nexmo;
use App\Message;
use Illuminate\Support\Facades\Log;

class SendPasswordToReceiver
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

        $sms_text = $this->createOTP($event);

        //$nexmo = app('Nexmo\Client');

        Nexmo::message()->send([
            'to'   => $event->encrypted_message->mobile,
            'from' => 'heisann',
            'text' => $sms_text
        ]);

    }

    protected function createOTP($event) {

        $ontimecode = OnetimeCode::firstOrCreate([
            'message_id' => $event->encrypted_message->id,
        ], [
            'code' => str_random(4),
            'sms_tries' => 0
        ]);

        $sms_text = Company::CurrentCompany()->name
            . ' har sendt deg en sikker melding via heisann.no. PASSORD: '
            . $ontimecode->code
            . ' (lenke sendt på e-post).';

        return $sms_text;

    }
}
