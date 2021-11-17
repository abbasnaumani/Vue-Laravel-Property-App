<?php

namespace Route\Api;

use App\Http\Controllers\PropertyController;
use \Illuminate\Support\Facades\Route;

class Property
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::get('/properties', [PropertyController::class,'index'])->name('property.index');
            Route::post('/properties', [PropertyController::class,'store'])->name('property.store');
            Route::put('/properties/{propertyId}', [PropertyController::class,'update'])->name('property.update');
            Route::get('/properties/{propertyId}',[PropertyController::class, 'show'])->name('property.show');
            Route::delete('/properties/{propertyId}',[PropertyController::class, 'destroy'])->name('property.destroy');
            Route::get('/property/types',[PropertyController::class, 'getPropertyTypes'])->name('property.types');
            Route::get('/property/area/unit',[PropertyController::class, 'getPropertyAreaUnits'])->name('property.area.unit');

        });
    }
}
