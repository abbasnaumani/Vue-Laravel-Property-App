<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ForgotPasswordService;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    protected $forgotPasswordService;

    public function __construct(ForgotPasswordService $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }

    /**
     * @param Request $request
     *
     *  Method for sending Verification token to user email
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPasswordByEmail(Request $request)
    {
        $this->forgotPasswordService->resetPasswordByEmail($request);
        return $this->getApiResponse();
    }

    /**
     * @param Request $request
     *
     *  Method for Verify Email Token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyPasswordToken(Request $request){
        $this->forgotPasswordService->verifyPasswordToken($request);
        return $this->getApiResponse();
    }
    /**
     * @param Request $request
     *
     *  Method for reset password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request){
        $this->forgotPasswordService->resetPassword($request);
        return $this->getApiResponse();
    }
}
