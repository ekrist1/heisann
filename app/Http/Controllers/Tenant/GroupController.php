<?php

namespace App\Http\Controllers\tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;

class GroupController extends Controller
{
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
        return view('layouts.dashboard.groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'email',
        ]);

        Group::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);

        return redirect(route('settings'))->with('status', 'Gruppe ble opprettet');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $group = Group::find($id);
        return view('layouts.dashboard.groups.edit', compact('group'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'email',
        ]);

        $group = Group::find($id);

        $group->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description
        ]);
        return redirect(route('settings'))->with('status', 'Firmaopplysniger ble oppdatert');
    }


    public function destroy($id)
    {
        Group::destroy($id);
        session()->flash('status', 'Gruppe ble slettet');
        return ['redirect' => action('Tenant\GroupController@index')];
    }
}
