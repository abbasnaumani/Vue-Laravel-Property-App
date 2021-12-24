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
            Route::put('/agency/update/profile', [AgencyController::class,'update'])->name('agency.update');
            Route::delete('/agency/{agencyId}', [AgencyController::class, 'destroy'])->name('agency.delete');
            Route::get('/agency/list', [AgencyController::class, 'getAgencyList'])->name('agency.list');
            Route::get('/agency/{agencyId}',[AgencyController::class, 'getAgencyUsers'])->name('agency.users');
        });
        Route::get('{slug}/agency/users', [AgencyController::class,'getAgencyUsersBySlug'])->name('agency.users.by.slug');
    }
}
