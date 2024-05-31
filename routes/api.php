<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/data', [DashboardController::class, 'data']);
    Route::post('/dashboard/control', [DashboardController::class, 'control']);
    Route::post('/dashboard/actuator/{id}', [DashboardController::class, 'updateActuator']);
});
