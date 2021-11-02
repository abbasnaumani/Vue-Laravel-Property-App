<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserPasswordReset;
use App\Notifications\VerifyEmail;
use App\Models\UserVerify;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $this->registerationValidator($request);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        return $this->successResponse('User Registered Successfully.', ['user' => $user]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function registerationValidator($request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);
    }
    
    
    
//    Discuss for methods placement
//    password reset methods
    /**
     * @param Request $request
     * @return false|string
     */
    public function sendVerificationToken(Request $request)
    {
        $data = $request->all();
        $rules = array('email' => 'required|exists:users,email');
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return $this->errorResponse($v->errors()->first());
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
//                        dd($verificationCode,$encodedToken);
//                        Notification::send($user, new VerifyEmail(['token' => $verificationCode]));
                        return $this->successResponse(trans('auth.email_sent'), ['token'=>$encodedToken]);
                    } else {
                        return $this->errorResponse(trans('auth.verify_email_not_sent'));
                    }
                } else {
                    return $this->errorResponse(trans('auth.verify_email_not_sent'));
                }
            } else {
                return $this->errorResponse(trans('auth.email_not_found'));
            }
        }
    }
    /**
     * @param Request $request
     * @return false|string
     */
    public function verifyEmailToken(Request $request){
        $data = $request->all();
        $rules = array('email' => 'required|exists:users,email','token' => 'required');
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return $this->errorResponse($v->errors()->first());
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
                    return $this->errorResponse(trans('auth.email_token_verified'), ['reset_password_token'=>$token]);
                } else {
                    return $this->errorResponse(trans('auth.email_token_not_verified'));
                }
            } else {
                return $this->errorResponse(trans('auth.user_not_found'));
            }
        }
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function resetPassword(Request $request){
        $data = $request->all();
        $rules = array('password' => 'required|min:8','reset_password_token'=>'required');
        $v = Validator::make($data, $rules);
        if ($v->fails()) {
            return $this->errorResponse($v->errors()->first());
        }else {
            $codeData = $this->customDecode($data['reset_password_token']);
            $userVerifyCodeData = UserVerify::firstWhere('code',$codeData);
            if($userVerifyCodeData){
                $userId = $userVerifyCodeData->user_id ?? 0;
                $user = User::find($userId);
                if ($user != null) {
                    $response = $this->verifyVerificationToken(['user_id' => $userId, 'type' => 'reset_password_code', 'code' => $codeData]);
                    if (isset($response['status']) && trim($response['status']) == 'success') {
                        $user->password = \Illuminate\Support\Facades\Hash::make($data['password']);
                        $user->save();
                        return $this->successResponse(trans('auth.password_updated'));
                    } else {
                        return $this->errorResponse(trans('auth.password_not_updated'));
                    }
                } else {
                    return $this->errorResponse(trans('auth.user_not_found'));
                }
            }else{
                return $this->errorResponse(trans('auth.token_not_found'));
            }
        }
    }
}
