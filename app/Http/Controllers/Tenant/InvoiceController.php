<?php

namespace App\Http\Controllers\Tenant;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;

class InvoiceController extends Controller
{
    public function index() {

        $invoices = Invoice::simplePaginate(10);

        return view('layouts.dashboard.invoice.index', compact('invoices'));
    }

    public function show($id) {

        $invoice = Invoice::findOrFail($id);
        $company = Company::CurrentCompany();

        return view('layouts.dashboard.invoice.show', compact('invoice', 'company'));
    }
}
