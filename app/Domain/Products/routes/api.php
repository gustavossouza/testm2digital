<?php

use App\Domain\Products\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::controller(ProductsController::class)->group(function () {
    Route::get('/products', 'index');
    Route::post('/products', 'store');
    Route::put('/products/{product}', 'update');
    Route::delete('/products/{product}', 'destroy');
});