<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Route\Api\Auth;
use Route\Api\ContactUs;
use Route\Api\Property;
use Route\Api\Subscribe;
use Route\Api\User;
use Route\Api\Country;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::register();
Property::register();
Country::register();
User::register();
Subscribe::register();
ContactUs::register();
\Route\Api\Test::register();
\Route\Api\Upload::register();
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
