<?php

use App\Http\Controllers\CatchingApiSpaceFlightController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CatchingApiSpaceFlightController::class, 'apiConsume']);
