<?php

use App\Domain\Discounts\Controllers\DiscountsController;
use Illuminate\Support\Facades\Route;

Route::controller(DiscountsController::class)->group(function () {
    Route::get('/discounts', 'index');
    Route::post('/discounts', 'store');
    Route::put('/discounts/{discount}', 'update');
    Route::delete('/discounts/{discount}', 'destroy');
});