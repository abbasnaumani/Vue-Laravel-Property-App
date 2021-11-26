<?php

namespace Route\Api;

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

class Country
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::get('/country/cities', [CountryController::class,'getAllCities'])->name('country.cities');
        });
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::get('/country/{cityId}/locations', [CountryController::class,'getAllLocationsByCItyId'])->name('country.city.locations');
        });
    }
}
