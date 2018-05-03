<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Company;
use App\Tenant\Manager;
use Illuminate\Support\Facades\Hash;
use Propaganistas\LaravelPhone\PhoneNumber;

class UserManagerController extends Controller
{
    public function index() {

        $users = User::CompanyUsers()->get();

        return view('layouts.dashboard.usermanager.index', compact('users'));
    }

    public function create() {

        return view('layouts.dashboard.usermanager.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'country' => 'required_with:mobile',
            'mobile' => 'phone:country',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => PhoneNumber::make($request->mobile)->ofCountry($request->country),
            'password' => Hash::make($request->password),
            'active' => true,
        ]);
        $user->giveRoleTo('user');

        $company = $user->companies()->attach(app(Manager::class)->getTenant()->id);

        return redirect(route('settings'))->with('status', 'Bruker ble opprettet');
    }

    public function edit($id) {

        $user = User::CompanyUsers()->find($id);


        if(!$user) {
            return redirect()->action('Tenant\UserManagerController@index');
        }

        return view('layouts.dashboard.usermanager.edit', compact('user'));
    }

    public function update(Request $request, $id) {

        $user = User::CompanyUsers()->find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'country' => 'required_with:mobile',
            'mobile' => 'phone:country',
            'password' => 'nullable|sometimes|string|min:6|confirmed'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->mobile;
        $user->active = true;
       if(!empty($request->input('password')))
       {
           $user->password = bcrypt($request->input('password'));
       }

        $user->save();

        return redirect(route('settings'))->with('status', 'Bruker ble oppdatert');

    }
}
