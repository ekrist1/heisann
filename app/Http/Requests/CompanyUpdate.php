<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdate extends FormRequest
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
            'name' => 'required|max:255',
            'zipcode' => 'max:10',
            'organization_number' => 'max:30',
            'email' => 'email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Firmanavn er påkrevd',
            'zipcode.max'  => 'Maksimalt 10 tall/bokstaver',
            'organization_number' => 'Maksimalt 30 tall/bokstaver',
            'email.email' => 'Må være en e-postadresse',
        ];
    }

    public function CompanyFillData() {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'zipcode' => $this->zipcode,
            'organization_number' => $this->organization_number,
            'email' => $this->email,
            'domain' => $this->domain
        ];
    }
}
