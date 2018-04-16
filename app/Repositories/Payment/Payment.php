<?php

namespace App\Repositories\Payment;

use App\Company;
use Carbon\Carbon;
use Stripe\{Stripe, Customer, Charge};
use App\Events\Payment\InvoiceCreated;


class Checkout {

    public function createInvoice($request) {

        $invoice = Company::CurrentCompany()->invoices()->create([
            'sum' => $request->amount,
            'amount' => $request->amount / config('constants.norway'),
            'VAT' => $request->amount - ($request->amount / config('constants.norway')),
            'order_date' => Carbon::now(),
            'user_id' => Auth()->user()->id
        ]);

        return $invoice;

    }

    public function payment($request) {

        $amount = (int)$request->input('amount');

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $customer = Customer::create([
                'email' => request('stripeEmail'),
                'source' => request('stripeToken'),
            ]);

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $amount,
                'currency' => 'nok',
            ));

        } catch (\Exception $e) {

            return ['error' => $e->getMessage(), 'status' => false];

        }

        $this->addBalance($amount);

        return ['message' => 'Betaling ble gjennomført', 'status' => true];
    }

    protected function addBalance($amount) {

        $newamount = (($amount / 100) / Config('constants.norway')) + Company::CurrentCompany()->credit;
        Company::CurrentCompany()->update([
            'credit' => $newamount,
        ]);
    }

}

