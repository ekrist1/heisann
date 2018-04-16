<?php

namespace App\Http\Controllers\Tenant;

use App\Company;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index() {

        $company = Company::CurrentCompany();
        $group = Group::all();

        $contactFormIframe = '<iframe src=' . '"https://heisann.no/form/' . $company->uuid . '" ' . 'frameborder="0" allowfullscreen></iframe>';
        $contactFormUrl = 'https://heisann.no/form/' . $company->uuid;

        return view('layouts.dashboard.form.index', compact('contactFormIframe', 'contactFormUrl', 'group'));
    }
}
