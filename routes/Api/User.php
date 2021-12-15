<?php

namespace Route\Api;

use App\Http\Controllers\UserChatController;
use App\Http\Controllers\UserController;
use \Illuminate\Support\Facades\Route;

class User
{
    static function register()
    {
        Route::get('/user/list', [UserController::class, 'getAgencyUsersList'])
            ->name('user.list')
            ->middleware('auth:sanctum');
        Route::get('/user/menu', [UserController::class, 'userMenu'])
            ->name('user.menu')
            ->middleware('auth:sanctum');
        Route::post('/user/chat/send/message', [UserChatController::class, 'store'])
            ->middleware('auth:sanctum');
        Route::get('/user/edit/profile', [UserController::class, 'editUserProfile'])->name('user.edit.profile')
            ->middleware('auth:sanctum');
        Route::get('/user/update/profile', [UserController::class, 'updateUserProfile'])->name('user.update.profile')
            ->middleware('auth:sanctum');
        Route::post('/user/update/password', [UserController::class, 'updateUserPassword'])->name('user.update.password')
            ->middleware('auth:sanctum');
        Route::post('/user/add', [UserController::class, 'store'])->name('user.store')
            ->middleware('auth:sanctum');
        Route::get('/roles', [UserController::class, 'getAllRoles'])
            ->name('user.roles')
            ->middleware('auth:sanctum');
    }
}
