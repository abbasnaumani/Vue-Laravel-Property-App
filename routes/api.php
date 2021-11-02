<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Route\Api\Auth;
use Route\Api\Property;
use Route\Api\User;
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
User::register();
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
