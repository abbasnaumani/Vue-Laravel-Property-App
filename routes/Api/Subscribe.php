<?php

namespace Route\Api;

use App\Http\Controllers\SubscribeController;
use \Illuminate\Support\Facades\Route;

class Subscribe
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){

        });
        Route::get('/subscribers', [SubscribeController::class,'index'])->name('subscribe.index');
        Route::post('/subscribers', [SubscribeController::class,'store'])->name('subscribe.store');

    }
}
