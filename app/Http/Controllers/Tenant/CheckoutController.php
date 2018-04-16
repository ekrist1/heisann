<?php

namespace App\Http\Controllers\Tenant;

Use App\Repositories\Payment\Checkout;
use App\Events\Payment\InvoiceCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;



class CheckoutController extends Controller
{

    public $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
    }

    public function index() {

        $company = Company::findOrFail(request()->tenant()->id);

        return view('layouts.dashboard.payment.index', compact('company'));
    }


    public function store(Request $request) {

        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $payment = $this->checkout->payment($request);

        if ($payment['status']) {
            $invoice = $this->checkout->createInvoice($request);
            event(new InvoiceCreated($invoice));
        }

        return response($payment['status'] ? $payment['message'] : $payment['error'])
            ->setStatusCode($payment['status'] ? 200 : 402);
    }


}
