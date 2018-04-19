<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Message;
use App\File;
use Illuminate\Support\Facades\Storage;
use App\Services\StreamDownload;
use Illuminate\Support\Facades\Log;



class ReceiveController extends Controller
{
    public function index(Request $request) {

        if ($request->has('file_id')) {
            $file = File::where('uuid',$request->query('file_id'))->firstOrfail();
            $filePath = $file->uuid;
            try {
                StreamDownload::Download($filePath, $file->original_name);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return back()->with('status', 'Noe gikk galt ved nedlasting');
            }

        }

        $messages = Message::where('is_received', true)->with('group')->latest()->simplePaginate(10);


    return view('layouts.dashboard.receive.index', compact('messages'));

    }

    public function destroy($id) {
        File::where('message_id', $id)->delete();
        Message::find($id)->delete();

        session()->flash('status', 'Melding ble slettet');
        return ['redirect' => action('Tenant\ReceiveController@index')];

    }
}
