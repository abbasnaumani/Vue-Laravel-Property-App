<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->destroySession($request); // It's only for APIs to destroy session if any
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
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroySession(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
