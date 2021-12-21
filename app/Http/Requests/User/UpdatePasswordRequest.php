<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class UpdatePasswordRequest extends FormRequest
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
            'password_data.current_password' => 'required|string|min:8',
            'password_data.new_password' => 'required|string|min:8',
            'password_data.password_confirmation' => 'required_with:new_password|same:new_password|min:8',
        ];
    }

}
