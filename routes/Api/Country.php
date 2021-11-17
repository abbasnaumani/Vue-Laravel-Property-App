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
    }
}
