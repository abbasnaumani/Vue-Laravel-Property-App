<?php

namespace App\Http\Requests\Property;

use App\Models\User;
use App\Traits\CustomHash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddPropertyRequest extends FormRequest
{
    use CustomHash;

    protected $email;

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
            'property_sub_type_id' => 'required|exists:property_sub_types,id',
            'area_unit_id' => 'required|exists:area_units,id',
            'city_id' => 'required|exists:cities,id',
            'title' => 'required|string|min:3|max:128',
            'area' => 'required|numeric',
            'purpose' => 'required|integer',
            'price' => 'required|integer|min:0|not_in:0',
            'location' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string'
        ];
    }

    /**
     * Method to Set Email from the request inputs
     */
    public function setEmailFromInput()
    {
        if ($this->input('email')) {
            $this->email = $this->input('email');
        } elseif ($this->input('token')) {
            $tokenData = $this->customDecode($this->input('token'));
            if ($tokenData) {
                $tokenDataArr = explode('|', $tokenData);
                $this->email = $tokenDataArr[0] ?? null;
            }
        }
    }
    /**
     * Method to Get Email from the request inputs
     * @throws ValidationException
     */
    public function getEmail()
    {
        $this->setEmailFromInput();
        if ($this->email) {
            return $this->email;
        }
        throw ValidationException::withMessages([
            'email' => __('auth.email_not_found'),
        ]);
    }

    /**
     * Method to get User
     * @throws ValidationException
     */
    public function getUserFromRequest()
    {
        $user = User::where('email', $this->getEmail())->first();
        if ($user) {
            return $user;
        }
        throw ValidationException::withMessages([
            'email' => __('auth.user_not_found'),
        ]);
    }
}

