<?php

use App\Http\Controllers\ApiClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:sanctum', 'as' => 'api.'], function () {

    Route::get('user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('clients', ApiClientController::class);

    Route::put('clients/{client}/campaigns', [ApiClientController::class, 'store_campaign']);

});

