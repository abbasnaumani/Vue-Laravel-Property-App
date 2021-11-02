<?php

namespace Route\Api;

use App\Http\Controllers\UserController;
use \Illuminate\Support\Facades\Route;

class User
{
    static function register()
    {
        Route::get('/user/list', [UserController::class,'userList'])
            ->name('user.list')
            ->middleware('auth:sanctum');
    }
}
