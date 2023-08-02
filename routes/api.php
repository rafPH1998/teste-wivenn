<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::post('/login', AuthController::class)->name('login');

Route::middleware('apiJwt')->group(function() {
    Route::apiResource('/departments', DepartmentController::class)->except(['create', 'edit']);
    Route::apiResource('/employees', EmployeeController::class)->except(['create', 'edit']);
});


