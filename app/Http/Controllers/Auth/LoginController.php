<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return array
     */
    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $user = $this->getAuthUser();
        $token = $this->authUserToken($user);
        $userData = $user ? $user->toArray() : [];
        $userId = $userData['id'] ?? 0;
        $responseData = ['token' => $token, 'user_data' => $userData, 'user_id' => $userId, 'expiresIn' => null, 'redirect_to' => '/'];
        return $this->success(trans('auth.login_success'), $responseData);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $user = $this->getAuthUser();
        if ($user) {
            $user->currentAccessToken()->delete();
        }
        return $this->success(trans('auth.logout_success'));
    }
}
