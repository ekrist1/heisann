<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\Group;
use App\Company;
use App\Http\Requests\StoreMessage;
Use App\Events\Message\SendMessageToReceiver;
use App\Services\LogToStat;

class SendController extends Controller
{
    public function index() {

        $messages = Message::where('is_received', false)->simplePaginate(10);


        return view('layouts.dashboard.send.index', compact('messages'));
    }
    public function create() {

        $groups = Group::all()->pluck('email');

        $groups->prepend(auth()->user()->email);

        return view('layouts.Dashboard.send.create', compact('groups'));
    }

    public function store(StoreMessage $request) {

        $message = Message::create($request->MessageFillData());

        $request->storeFiles($message);

        event(new SendMessageToReceiver($message));

        $newcredit = Company::CurrentCompany()->updateCredit(config('constants.price'));

        LogToStat::logUsage('Message');

        session()->flash('status', 'Melding ble sendt');
        return ['redirect' => action('Tenant\DashboardController@index')];

    }

}
