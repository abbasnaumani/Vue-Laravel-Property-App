<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $request->authenticate();
        $user = $this->getAuthUser();
        $this->setApiSuccessMessage(trans('auth.login_success'), [
            'token' => $this->authUserToken($user),
            'user_data' => $user,
            'expires_in' => null
        ]);
        $this->destroySession(); // It's only for APIs to destroy session if any
        return $this->getApiResponse();
    }

    /**
     * Destroy an authenticated session.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): \Illuminate\Http\JsonResponse
    {
        $user = $this->getAuthUser();
        if ($user) {
            $user->currentAccessToken()->delete();
        }
        $this->setApiSuccessMessage(trans('auth.logout_success'));
        return $this->getApiResponse();
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function destroySession()
    {
        Auth::guard('web')->logout();
    }
}
