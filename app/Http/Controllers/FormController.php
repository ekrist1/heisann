<?php

namespace App\Http\Controllers;

use App\Events\Message\MessageIsReceived;
use App\Http\Requests\StoreForm;
use App\Company;
use App\Message;
use App\Group;
use App\Tenant\Manager;
use App\Services\SetConfigSecretKey;

class FormController extends Controller
{
    public function show($company) {

    $company = Company::where('uuid', $company)->firstOrFail();

    $groups = Group::GroupToForm($company->id)->get();

    //dd($groups);

    return view('layouts.form.show', compact('company', 'groups'));
    }

    public function store(StoreForm $request) {

        $company = Company::where('uuid', $request->input('uuid'))->firstOrFail();
        app(Manager::class)->setTenant($company);
        config()->set('app.name', $company->name);
        SetConfigSecretKey::SetSecretKey($company->secret_key);


        $group = Group::find($request->input('group'));

        $message = Message::create($request->MessageFillData($group, $company));

        $request->storeFiles($message);

        event(new MessageIsReceived($message));

        session()->flash('status', 'Melding ble sendt');
        return response('ok', 200);
    }
}
