<?php

use App\Domain\Campaigns\Controllers\CampaignsController;
use Illuminate\Support\Facades\Route;

Route::controller(CampaignsController::class)->group(function () {
    Route::get('/campaigns', 'index');
    Route::post('/campaigns', 'store');
    Route::put('/campaigns/{compaign}', 'update');
    Route::delete('/campaigns/{campaign}', 'destroy');
});