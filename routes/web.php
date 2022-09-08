<?php

use App\Http\Controllers\CatchingApiSpaceFlightController;
use App\Http\Controllers\MarvelApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatchingApiSpaceFlightController::class, 'apiConsume']);
// Consumindo API
Route::get('hq', [MarvelApiController::class, 'getAllHq']);
// Pegando todos dados
Route::get('hq/{id}', [MarvelApiController::class, 'getHq']);
// Pegando um dado
Route::post('hq', [MarvelApiController::class, 'createHq']);
// Criando um dado
Route::put('hq/{id}', [MarvelApiController::class, 'updateHq']);
// Atualizando um dado
Route::delete('hq/{id}', [MarvelApiController::class, ['deleteHq']]);
// Deletando um dado
