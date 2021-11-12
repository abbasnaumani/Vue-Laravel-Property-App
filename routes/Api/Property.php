<?php

namespace Route\Api;

use App\Http\Controllers\PropertyController;
use \Illuminate\Support\Facades\Route;

class Property
{
    static function register()
    {

        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::post('/properties', [PropertyController::class,'store'])
                ->name('properties.store');
            Route::put('/properties/{property_id}', [PropertyController::class,'update'])
                ->name('properties.update');
            Route::get('/properties/{property_id?}',[PropertyController::class, 'show'])
                ->name('properties.show');
            Route::delete('/properties/{property_id}',[PropertyController::class, 'destroy'])
                ->name('properties.destroy');
        });
    }
}
