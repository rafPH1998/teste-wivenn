<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', AuthController::class)->name('login');

Route::middleware('apiJwt')->group(function() {
    Route::apiResource('/departments', DepartmentController::class)->except('create');
});


