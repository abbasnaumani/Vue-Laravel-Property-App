<?php

namespace Route\Api;

use App\Http\Controllers\PropertyController;
use \Illuminate\Support\Facades\Route;

class Property
{
    static function register()
    {
//        Route::prefix('property')->group(function () {
//        Route::group(['prefix' => 'property'], function () {
//        Route::group(['prefix' => 'property', 'middleware' => ['auth:sanctum']], function(){
        Route::post('/properties', [PropertyController::class,'store'])
            ->name('properties.store');
        Route::put('/properties/{property_id}', [PropertyController::class,'update'])
            ->name('properties.update');
        Route::get('/property/list',[PropertyController::class, 'listProperty'])
            ->name('property.list');
        Route::post('/property/delete/{id}',[PropertyController::class, 'deleteProperty']);
//        });
    }
}
