<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\ForgotPasswordService;
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
    public function sendVerificationToken(Request $request)
    {
        $response = $this->forgotPasswordService->sendVerificationToken($request);
        if (isset($response['status']) && trim($response['status']) == 'success') {
            return $this->success($response);
        }else{
            return $this->error($response);
        }
    }
    /**
     * @param Request $request
     *
     *  Method for Verify Email Token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyEmailToken(Request $request){
        $response = $this->forgotPasswordService->verifyEmailToken($request);
        if (isset($response['status']) && trim($response['status']) == 'success') {
            return $this->success($response);
        }else{
            return $this->error($response);
        }
    }
    /**
     * @param Request $request
     *
     *  Method for reset password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetPassword(Request $request){
        $response = $this->forgotPasswordService->resetPassword($request);
        if (isset($response['status']) && trim($response['status']) == 'success') {
            return $this->success($response);
        }else{
            return $this->error($response);
        }
    }
}
