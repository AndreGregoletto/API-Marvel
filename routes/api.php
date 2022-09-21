<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarvelApiController;
use App\Http\Controllers\CatchingApiSpaceFlightController;
use App\Http\Controllers\Mail\SendController;

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [AuthController::class, 'user']);
    
    Route::prefix('marvel')->group(function () {
        Route::get('consumo', [CatchingApiSpaceFlightController::class, 'apiConsume']);
        
        Route::get('hq', [MarvelApiController::class, 'getAll']);
        
        Route::get('hq/{id}', [MarvelApiController::class, 'getOne']);
        
        Route::post('hq', [MarvelApiController::class, 'create']);
        
        Route::put('hq/{id}', [MarvelApiController::class, 'update']);
        
        Route::delete('hq/{id}', [MarvelApiController::class, 'delete']);
    });
    
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('forgot-password', [SendController::class, 'send']);