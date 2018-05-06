<?php

namespace App\Http\Controllers\tenant;

use App\Http\Requests\StoreGroup;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $groups = Group::all();

    return view('layouts.dashboard.groups.index', compact('groups'));

    }


    public function create()
    {
        $users = User::CompanyUsers()->get(['name', 'id']);

        return view('layouts.dashboard.groups.create', compact('users'));
    }

    public function store(StoreGroup $request)
    {

        $group = Group::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);

        $group->users()->sync($request->tagToArray());

        session()->flash('status', 'Gruppe ble opprettet');
        return ['redirect' => route('settings')];

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $group = Group::find($id);
        $users = User::CompanyUsers()->get(['name', 'id']);

        //dd($group->users()->get(['id', 'name']));
        $group = array_add($group,'user_group', $group->users()->get(['id', 'name']));
        //dd($group);

        return view('layouts.dashboard.groups.edit', compact('group', 'users'));
    }


    public function update(StoreGroup $request, $id)
    {

        $group = Group::findOrFail($id);

        $group->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);

        $group->users()->sync($request->tagToArray());

        session()->flash('status', 'Gruppe ble oppdatert');
        return ['redirect' => route('settings')];
    }


    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->users()->detach();
        Group::destroy($id);

        session()->flash('status', 'Gruppe ble slettet');
        return ['redirect' => action('Tenant\GroupController@index')];
    }


}
