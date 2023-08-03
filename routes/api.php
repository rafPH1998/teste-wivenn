<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('/login', AuthController::class)->name('login');

Route::middleware('apiJwt')->group(function() {
    Route::apiResource('/departments', DepartmentController::class)->except(['create', 'edit']);
    Route::apiResource('/employees', EmployeeController::class)->except(['create', 'edit']);

    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/{taskId}', [TaskController::class, 'show'])->name('task.show');
    Route::put('/tasks/{taskId}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/tasks/{taskId}', [TaskController::class, 'destroy'])->name('task.destroy');
});


