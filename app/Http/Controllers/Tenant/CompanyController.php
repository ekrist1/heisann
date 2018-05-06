<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use app\Company;
use App\Http\Requests\CompanyUpdate;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function edit() {

        $company = Auth()->user()->companies->where('id', request()->tenant()->id)->first();

        return view('layouts.dashboard.company.edit', compact('company'));

    }

    public function update(CompanyUpdate $request) {

        //$company = auth()->user()->companies->where('id', session()->get('tenant'))->first();

        Company::where('id', request()->tenant()->id)->update($request->CompanyFillData());

        return redirect(route('settings'))->with('status', 'Firmaopplysniger ble oppdatert');
    }
}
