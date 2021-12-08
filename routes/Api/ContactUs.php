<?php

namespace Route\Api;

use App\Http\Controllers\ContactUsController;
use \Illuminate\Support\Facades\Route;

class ContactUs
{
    static function register()
    {
        Route::group(['middleware' => ['auth:sanctum']], function(){

        });
        Route::get('/contact/us', [ContactUsController::class,'index'])->name('contact.us.index');
        Route::post('/contact/us', [ContactUsController::class,'store'])->name('contact.us.store');

    }
}
