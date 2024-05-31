<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ActuatorController;
use App\Http\Controllers\DashboardController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/data', [DashboardController::class, 'fetchSensorData']);
Route::post('/dashboard/actuator/{id}', [DashboardController::class, 'updateActuator'])->name('dashboard.updateActuator');
