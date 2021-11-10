<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use App\Traits\CustomHash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SendVerificationCodeRequest extends FormRequest
{
    use CustomHash;

    protected $email;

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
            'email' => 'required_without:token|nullable|exists:users,email',
            'token' => 'required_without:email'
        ];
    }

    public function fetchEmailFromInput()
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

    public function getEmail()
    {
        $this->fetchEmailFromInput();
        if ($this->email) {
            return $this->email;
        }
        throw ValidationException::withMessages([
            'email' => __('auth.email_not_found'),
        ]);
    }

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
