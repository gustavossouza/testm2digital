<?php

use App\Domain\Cities\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;

Route::controller(CitiesController::class)->group(function () {
    Route::get('/cities', 'index');
});