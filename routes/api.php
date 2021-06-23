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



Route::group(['middleware'=>'auth:api'],function (){
    Route::get('user',function (){
        return request()->user();
    });
    Route::get('init',[\App\Http\Controllers\ApiLoginController::class,'init']);
    Route::get('result_data',[\App\Http\Controllers\ApiResusltController::class,'index']);
    Route::get('logout',[\App\Http\Controllers\ApiLoginController::class,'logout']);
});

Route::apiResources([
    'exam_type'=> \App\Http\Controllers\ExamTypesController::class,
]);


Route::post('pre-login',[\App\Http\Controllers\ApiLoginController::class,'beforeLogin']);
Route::post('send_sms',[\App\Http\Controllers\ApiLoginController::class,'sendSms']);
Route::post('login',[\App\Http\Controllers\ApiLoginController::class,'login']);
