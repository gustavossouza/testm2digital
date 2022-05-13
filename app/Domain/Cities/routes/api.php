<?php

use App\Domain\Cities\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;

Route::controller(CitiesController::class)->group(function () {
    Route::get('/cities', 'index');
    Route::post('/cities', 'store');
    Route::put('/cities/{city}', 'update');
    Route::delete('/cities/{city}', 'destroy');
});