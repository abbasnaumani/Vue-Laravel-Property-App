<?php

namespace Route\Api;

use App\Http\Controllers\ContactUsController;
use \Illuminate\Support\Facades\Route;

class ContactUs
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){
            Route::get('/contact/us', [ContactUsController::class,'index'])->name('contact.us.index');
            Route::delete('/contact/us/{contactUsId}', [ContactUsController::class,'destroy'])->name('contact.us.delete');

        });
        Route::post('/contact/us', [ContactUsController::class,'store'])->name('contact.us.store');

    }
}
