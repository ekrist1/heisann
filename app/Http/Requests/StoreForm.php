<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Facades\SodiumEncrypter;
use Propaganistas\LaravelPhone\PhoneNumber;
use Carbon\Carbon;


class StoreForm extends FormRequest
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
            'emailfrom' => 'required|email',
            'message' => 'required',
            'group' => 'required',
            'from' => 'required',
            'humantest' => 'present|max:0',
            'attachments.*' => 'max:100000'
        ];
    }

    public function MessageFillData($group) {
        return [
            'hashed_url' => Hash::make(str_random(255)),
            'to' => $group->email,
            'from' => $this->emailfrom,
            'received_from' => $this->from,
            'received_phone' => $this->mobile,
            'mobile' => $this->mobile,
            'body' => SodiumEncrypter::safeEncrypt($this->message),
            'is_received' => true,
            'group_id' => $this->group,
            'time_live' => Carbon::now()->addDays(30),
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
                    'time_live' => Carbon::now()->addDays(30),
                    'download_times' => 0,
                ]);
            }
        }
    }
}
