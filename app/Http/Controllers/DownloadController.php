<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use App\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Services\SetConfigSecretKey;
use App\Services\StreamDownload;


class DownloadController extends Controller
{
    public function index() {

        return view('layouts.Download.index');
    }

    public function download(Request $request) {

        $download = Message::Download()->where('to', $request->input('email'))->where('hashed_url', $request->input('hashed_url'))->firstOrFail();

        $sms_code = $download->onetimecode()->first();

        if ($request->input('onetimepassword') != $sms_code->code) {
            return back()->with('status', 'Feil kode. Prøv på nytt');
        }

        $honeytrap = str_random(10);

        $data = encrypt([
            'hashed_url' => $download->hashed_url,
            'honeytrap' => $honeytrap
        ]);

        session()->put('secret', $data);

        return redirect(URL::temporarySignedRoute(
            'secret', now()->addMinutes(30), ['honeytrap' => $honeytrap]
        ));

    }

    public function secret(Request $request) {

        $this->validateSignature($request);

        $message_token = $this->decryptMessage($request);

        SetConfigSecretKey::SetSecretKey(Message::RetrieveCompany($message_token['hashed_url']));

        $secret_message = Message::RetrieveMessage($message_token['hashed_url']);

        $files = File::RetrieveFiles($secret_message->id)->get();

        $downloadlinks = $files->map(function ($item) {
            $item['url'] = URL::temporarySignedRoute('filedownload', now()->addMinutes(30), ['file_id' => $item->id]);
            return $item;
        });

        $secret_message->update(['is_read' => true]);

        session()->regenerate();

        return view('layouts.Download.secret', compact('secret_message', 'downloadlinks'));
    }

    public function filedownload(Request $request, $fileid) {

        $this->validateSignature($request);

        $message_token = $this->decryptMessage($request);

        $file = File::DownloadFile($fileid);

        $filePath = $file->uuid;

        StreamDownload::Download($filePath, $file->original_name);
        return;
        //return Storage::disk('s3')->download($filePath, $file->original_name);



    }

    private function decryptMessage($request) {

        try {
            $decryptedMessage = decrypt($request->session()->get('secret'));
        } catch (DecryptException $e) {
            abort(403, 'Forespørsel ikke godkjent');
        }

        return $decryptedMessage;
    }

    private function validateSignature($request) {

        if (! $request->hasValidSignature()) {
            abort(401);
        }
    }
}
