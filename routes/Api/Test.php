<?php

namespace Route\Api;

use App\Http\Controllers\Test\TestController;
use \Illuminate\Support\Facades\Route;

class Test
{
    static function register()
    {
        Route::prefix('test')->group(function () {
            Route::get('/method', [TestController::class,'testMethod'])->name('test.method');
        });
    }
}
