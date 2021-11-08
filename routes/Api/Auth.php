<?php

namespace Route\Api;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use \Illuminate\Support\Facades\Route;

class Auth
{
    static function register()
    {
        Route::post('/register', RegisterController::class)
            ->name('register')
            ->middleware('guest');
        Route::post('/login', [LoginController::class, 'login'])->name('login')
            ->middleware('guest');
        Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])
            ->name('logout')
            ->middleware('auth:sanctum');

        //password reset routes
        Route::post( '/forgot/password', [ForgotPasswordController::class, 'resetPasswordEmail'])
            ->name('send.verification.token');
        Route::post( '/reset/password/token', [ForgotPasswordController::class, 'verifyPasswordToken']) //reset-password/{token}    create
            ->name('send.email.token');
        Route::post('/reset/password', [ForgotPasswordController::class,'resetPassword'])
            ->name('reset.password');
    }
}
