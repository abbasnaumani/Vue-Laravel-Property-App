<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

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
     *
     *
     *
     */
    public function __invoke(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->registerationValidator($request);
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);
            event(new Registered($user));
            $token = $this->authUserToken($user);
            $userData = $user ? $user->toArray() : [];
            $userId = $userData['id'] ?? 0;
            $user->roles()->sync(RoleUser::AGENT);
            $responseData = ['token' => $token, 'user_data' => $userData, 'user_id' => $userId, 'expiresIn' => null, 'redirect_to' => '/'];
            DB::commit();
            $response =  $this->success(trans('auth.registration_success'), $responseData);
        } catch (\Exception $e) {
            DB::rollBack();
            $response = $this->error(trans('auth.registration_failed'));
        }
        return $response;
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
}
