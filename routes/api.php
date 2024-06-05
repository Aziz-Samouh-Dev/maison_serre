<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Example route for authenticated user
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Protected Routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard/data', [DashboardController::class, 'data'])->name('data');
    Route::get('/dashboard/run-sensor', [DashboardController::class, 'runSensor'])->name('sensor.run');
    Route::get('/dashboard/resources', [DashboardController::class, 'showResources'])->name('resources.show');
    Route::post('/dashboard/control', [DashboardController::class, 'control'])->name('dashboard.control');
    Route::post('/dashboard/actuator/{id}', [DashboardController::class, 'updateActuator'])->name('dashboard.actuator.update');
});
