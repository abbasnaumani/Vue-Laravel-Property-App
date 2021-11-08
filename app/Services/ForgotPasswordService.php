<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserVerify;
use App\Notifications\VerifyEmail;
use App\Services\BaseService\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordService extends BaseService
{
    /**
     * @param Request $request
     *
     *  Method for sending Verification token to user email
     *
     * @return array
     */
    public function resetPasswordEmail(Request $request){
        $data = $request->all();
        $rules = array('email' => 'required|exists:users,email');
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return $this->setApiErrorMessage($v->errors()->first());
        }else{
            $email = $data['email'] ?? '';
            $user = User::where('email',$email)->first();
            if ($user) {
                $userId = !is_null($user->id) ? $user->id : 0;
                if ($userId != '') {
                    $verification = $this->updateOrCreateVerificationToken(['user_id' => $userId, 'type' => 'reset_password', 'type_value' => $email]);
                    $verificationCode = $verification->code ?? null;
                    if ($verificationCode) {
                        $encodedToken = $this->customEncode($verificationCode);
                        Notification::send($user, new VerifyEmail(['token' => $verificationCode]));
                        return $this->setApiSuccessMessage(trans('auth.email_sent'), ['token'=>$encodedToken]);
                    } else {
                        return $this->setApiErrorMessage(trans('auth.verify_email_not_sent'));
                    }
                } else {
                    return $this->setApiErrorMessage(trans('auth.verify_email_not_sent'));
                }
            } else {
                return $this->setApiErrorMessage(trans('auth.email_not_found'));
            }
        }
    }
    /**
     * @param Request $request
     *
     *  Method for Verify Email Token
     *
     * @return array
     */
    public function verifyPasswordToken(Request $request){
        $data = $request->all();
        $rules = array('email' => 'required|exists:users,email','token' => 'required');
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return $this->setApiErrorMessage($v->errors()->first());
        }else{
            $user = User::where('email', $data['email'])->first();
            if ($user != null) {
                $userId = $user->id ?? 0;
                $response = $this->verifyVerificationToken(['user_id' => $userId, 'type' => 'reset_password', 'code' => $data['token']]);
                if (isset($response['status']) && trim($response['status']) == 'success') {
                    $email = $user->email ?? "";
                    $verification = $this->updateOrCreateVerificationToken(['user_id' => $userId, 'type' => 'reset_password', 'type_value' => $email]);
                    $verificationCode = $verification->code ?? null;
                    $token = "";
                    if ($verificationCode) {
                        $encodedToken = $this->customEncode($verificationCode);
                        $token = $encodedToken;
                    }
                    return $this->setApiSuccessMessage(trans('auth.email_token_verified'), ['reset_password_token'=>$token]);
                } else {
                    return $this->setApiErrorMessage(trans('auth.email_token_not_verified'));
                }
            } else {
                return $this->setApiErrorMessage(trans('auth.user_not_found'));
            }
        }
    }
    /**
     * @param Request $request
     *
     *  Method for reset password
     *
     * @return array
     */
    public function resetPassword(Request $request){
        $data = $request->all();
        $rules = array('password' => 'required|min:8','reset_password_token'=>'required');
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return $this->setApiErrorMessage($v->errors()->first());
        }else {
            $codeData = $this->customDecode($data['reset_password_token']);
            $userVerifyCodeData = UserVerify::firstWhere('code',$codeData);
            if($userVerifyCodeData){
                $userId = $userVerifyCodeData->user_id ?? 0;
                $user = User::find($userId);
                if ($user != null) {
                    $response = $this->verifyVerificationToken(['user_id' => $userId, 'type' => 'reset_password_code', 'code' => $codeData]);
                    if (isset($response['status']) && trim($response['status']) == 'success') {
                        $user->password = Hash::make($data['password']);
                        $user->save();
                        return $this->setApiSuccessMessage(trans('auth.password_updated'));
                    } else {
                        return $this->setApiErrorMessage(trans('auth.password_not_updated'));
                    }
                } else {
                    return $this->setApiErrorMessage(trans('auth.user_not_found'));
                }
            }else{
                return $this->setApiErrorMessage(trans('auth.token_not_found'));
            }
        }
    }
}
