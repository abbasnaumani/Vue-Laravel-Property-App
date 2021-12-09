<?php

namespace App\Http\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;


class AgencyProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'agency_name' => 'required|string|min:3|max:50',
            'agency_address' => 'required|string|min:3|max:150',
            'agency_email' => 'required|email',
            'agency_phone_number' => 'required|min:11',
            'password' => 'required|string|confirmed|min:8',
        ];
    }

}
