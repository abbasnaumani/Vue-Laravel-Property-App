<?php

namespace Route\Api;

use App\Http\Controllers\AgencyController;
use Illuminate\Support\Facades\Route;

class Agency
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::get('/agency/edit/{agencyId}',[AgencyController::class, 'edit'])->name('agency.edit');
            Route::put('/agency/{agencyId}', [AgencyController::class,'update'])->name('agency.update');
        });

    }
}
