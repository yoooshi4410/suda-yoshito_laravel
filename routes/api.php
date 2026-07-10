<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthController;

//認証用ルート
Route::post('/login',[AuthController::class,'login']);

//認証が必要なルート
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/purchase',[SaleController::class,'purchase']);
});
