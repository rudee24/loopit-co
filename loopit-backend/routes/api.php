<?php

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


Route::post('login',[App\Http\Controllers\API\AuthController::class,'login']);

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::get('test', function () {
        return "success";
    });
    Route::get('cars',[App\Http\Controllers\API\CarsController::class,'index']);
});

