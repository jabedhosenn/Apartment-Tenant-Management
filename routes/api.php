<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\DashboardController;
use App\Http\Controllers\API\V1\ApartmentController;
use App\Http\Controllers\API\V1\BookingController;
use App\Http\Controllers\API\V1\TenantController;
use App\Http\Controllers\Auth\AuthController;

// Route::apiResource('apartments', ApartmentController::class);

Route::prefix('/v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard/summery', [DashboardController::class, 'index']);
        Route::apiResource('apartments', ApartmentController::class);
        Route::apiResource('bookings', BookingController::class);
        Route::apiResource('tenants', TenantController::class);
    });
});
