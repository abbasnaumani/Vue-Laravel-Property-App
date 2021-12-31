<?php

namespace Route\Api;

use App\Http\Controllers\AgencyController;
use Illuminate\Support\Facades\Route;

class Agency
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::post('/agency',[AgencyController::class, 'store'])->name('agency.store');
            Route::get('/agency/edit/{agencyId}',[AgencyController::class, 'edit'])->name('agency.edit');
            Route::post('/agency/{agencyId}',[AgencyController::class, 'update'])->name('agency.edit');
            Route::put('/agency/update/profile', [AgencyController::class,'updateProfile'])->name('agency.update.profile');
            Route::delete('/agency/{agencyId}', [AgencyController::class, 'destroy'])->name('agency.delete');
            Route::get('/agency/{agencyId}/users',[AgencyController::class, 'getAgencyUsers'])->name('agency.users');
        });
        Route::get('/agency/list', [AgencyController::class, 'getAgencyList'])->name('agency.list');
        Route::get('{slug}/agency/users', [AgencyController::class,'getAgencyUsersBySlug'])->name('agency.users.by.slug');
        Route::get('/agency/{slug}', [AgencyController::class,'getAgencyBySlug'])->name('agency.by.slug');
    }
}
