<?php

namespace Route\Api;

use App\Http\Controllers\UploadController;
use \Illuminate\Support\Facades\Route;

class Upload
{
    static function register()
    {
        Route::get('upload/create', [UploadController::class, 'create']);
        Route::post('/uploads', [UploadController::class, 'store'])->middleware('auth:sanctum');
        Route::post('/upload/{teamId?}', [UploadController::class, 'store'])->middleware('auth:sanctum');
        Route::get('/show/{image}', [UploadController::class, 'show']);
        Route::get('/download/{image}', [UploadController::class, 'download']);
        Route::group(['middleware' => ['auth:sanctum']], function () {
        });
    }
}
