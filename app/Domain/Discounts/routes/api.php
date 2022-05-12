<?php

use App\Domain\Discounts\Controllers\DiscountsController;
use Illuminate\Support\Facades\Route;

Route::controller(DiscountsController::class)->group(function () {
    Route::get('/discounts', 'index');
});