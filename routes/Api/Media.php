<?php

namespace Route\Api;

use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

class Media
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::delete('/media/{mediaId}', [MediaController::class,'destroy'])->name('media.destroy');
        });
    }
}
