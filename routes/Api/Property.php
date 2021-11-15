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
            Route::get('/properties/{propertyId}/edit',[PropertyController::class, 'edit'])->name('property.edit');
            Route::delete('/properties/{propertyId}',[PropertyController::class, 'destroy'])->name('property.destroy');
        });
    }
}
