<?php

use App\Domain\Campaigns\Controllers\CampaignsController;
use Illuminate\Support\Facades\Route;

Route::controller(CampaignsController::class)->group(function () {
    Route::get('/campaigns', 'index');
});