<?php

namespace App\Http\Requests\Agency;

use App\Models\Agency;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;


class AgencyUpdateRequest extends FormRequest
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
        $agency = Agency::find((int) request()->segment(3));
        return [
            'agency_name' => 'required|string|min:3|max:50',
            'agency_slug' => 'required|string',
            'agency_address' => 'required|string|min:3|max:100',
            'agency_email' => 'required|unique:agencies,email,'.$agency->id.',id' ,
            'agency_phone_number' => 'required|min:11',
        ];
    }

}
