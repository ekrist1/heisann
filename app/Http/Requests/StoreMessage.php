<?php

namespace App\Http\Requests;

use App\Company;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Facades\SodiumEncrypter;
use Propaganistas\LaravelPhone\PhoneNumber;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Message;

class StoreMessage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'emailfrom' =>  'required|email',
            'emailto' => 'required|email',
            'country' => 'required_with:mobile',
            'mobile' => 'phone:country',
            'message' => 'required',
            'attachments.*' => 'max:100000',
        ];
    }

    public function MessageFillData() {
        return [
            'hashed_url' => Hash::make(str_random(255)),
            'from' => $this->emailfrom,
            'to' => $this->emailto,
            'body' => SodiumEncrypter::safeEncrypt($this->message),
            'mobile' => PhoneNumber::make($this->mobile)->ofCountry($this->country),
            'password' => $this->password,
            'time_live' => Carbon::now()->addDays(45),
            ];
    }

    public function storeFiles($message) {

        if ($this->hasFile('attachments')) {
            foreach ( $this->file('attachments') as $file) {
                $file_info = Storage::disk('s3')->putFile('attatchment', $file, 'private');
                $message->files()->create([
                    'uuid' => $file_info,
                    'original_name' => $file->getClientOriginalName(),
                    'folder' => 'Attachment',
                    'time_live' => Carbon::now()->addDays(45),
                    'download_times' => 0,
                ]);
            }
        }
    }
}
