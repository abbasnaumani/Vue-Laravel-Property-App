<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Traits\CustomHash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ResetPasswordRequest extends FormRequest
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
            'verification_code'=>'required|numeric|min:6|max:6',
            'email' => 'required_without:token|nullable|exists:users,email',
            'token' => 'required_without:email'
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
