<?php

namespace Route\Api;

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

        // Discuss for route placement
        //password reset routes
        Route::post( '/send/verification/token', [RegisterController::class, 'sendVerificationToken'])
            ->name('send.verification.token');
        Route::post( '/verify/email/token', [RegisterController::class, 'verifyEmailToken'])
            ->name('send.email.token');
        Route::post('/reset/password', [RegisterController::class,'resetPassword'])
            ->name('reset.password');
    }
}
