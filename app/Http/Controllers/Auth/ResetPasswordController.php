<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\SendVerificationCodeRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     *
     *  Method for sending Verification token to user email
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendVerificationCode(SendVerificationCodeRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->authService->sendVerificationCode($request->getUserFromRequest());
        return $this->getApiResponse();
    }

    /**
     * @param ResetPasswordRequest $request
     *
     *  Method for Verify Email Token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->authService->resetPassword($request);
        return $this->getApiResponse();
    }
}
