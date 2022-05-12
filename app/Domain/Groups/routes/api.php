<?php

use App\Domain\Groups\Controllers\GroupsController;
use Illuminate\Support\Facades\Route;

Route::controller(GroupsController::class)->group(function () {
    Route::get('/groups', 'index');
});