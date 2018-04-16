<?php

namespace App\Http\Controllers\Tenant;

use App\Company;
use App\Facades\SodiumEncrypter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class DashboardController extends Controller
{
    public function index() {

        $user = Auth()->user();

        if($user->companies->count() == 1) {
            session()->put('tenant', $user->companies[0]->id);
        }

        $company = Company::CurrentCompany();

        return view('layouts.Dashboard.index', compact('user', 'company'));
    }

}
