<?php

namespace Route\Api;

use App\Http\Controllers\PropertyController;
use \Illuminate\Support\Facades\Route;

class Property
{
    static function register()
    {
//        Route::prefix('properties')->group(function () {
//        Route::group(['prefix' => 'properties'], function () {
//        Route::group(['prefix' => 'properties', 'middleware' => ['auth:sanctum']], function(){
        Route::get('/properties/{property_id?}',[PropertyController::class, 'show'])->name('properties.show');
        Route::post('/properties', [PropertyController::class,'store'])->name('properties.store');
        Route::put('/properties', [PropertyController::class,'update'])->name('properties.update');
        Route::delete('/properties/{property_id}/delete',[PropertyController::class, 'destroy'])->name('properties.destroy');
//        });
    }
}
