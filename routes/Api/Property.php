<?php

namespace Route\Api;

use App\Http\Controllers\PropertyController;
use \Illuminate\Support\Facades\Route;

class Property
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::get('/user/properties', [PropertyController::class,'getUserPropertyList'])->name('property.user.list');
            Route::post('/properties', [PropertyController::class,'store'])->name('property.store');
            Route::put('/properties/{propertyId}', [PropertyController::class,'update'])->name('property.update');
            Route::get('/properties/{propertyId}',[PropertyController::class, 'show'])->name('property.show');
            Route::delete('/properties/{propertyId}',[PropertyController::class, 'destroy'])->name('property.destroy');
            Route::get('/property/parent/types',[PropertyController::class, 'getPropertyParentTypes'])->name('property.parent.types');
            Route::get('/property/types',[PropertyController::class, 'getPropertyTypes'])->name('property.types');
            Route::get('/property/area/unit',[PropertyController::class, 'getPropertyAreaUnits'])->name('property.area.unit');
        });
        Route::get('{slug}/properties', [PropertyController::class,'getPropertyListBySlug'])->name('property.agency.list');
        Route::get('property/{propertyId}', [PropertyController::class,'getPropertyById'])->name('property.by.id');

    }
}
