<?php

use App\Domain\Groups\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;

Route::controller(GroupsController::class)->group(function () {
    Route::get('/groups/withoutcampaign', 'indexWithoutCampaign');
    Route::get('/groups', 'index');
    Route::post('/groups', 'store');
    Route::put('/groups/{group}', 'update');
    Route::delete('/groups/{group}', 'destroy');
});