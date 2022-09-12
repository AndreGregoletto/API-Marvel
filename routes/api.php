<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarvelApiController;
use App\Http\Controllers\CatchingApiSpaceFlightController;


Route::prefix('marvel')->group(function () {
    // Consumindo API
    Route::get('consumo', [CatchingApiSpaceFlightController::class, 'apiConsume']);
    
    // Pegando todos dados
    Route::get('hq', [MarvelApiController::class, 'getAllHq']);
    
    // Pegando um dado
    Route::get('hq/{id}', [MarvelApiController::class, 'getHq']);
    
    // Criando um dado
    Route::post('hq', [MarvelApiController::class, 'createHq']);
    
    // Atualizando um dado
    Route::put('hq/{id}', [MarvelApiController::class, 'updateHq']);
    
    // Deletando um dado
    Route::delete('hq/{id}', [MarvelApiController::class, ['deleteHq']]);
});

