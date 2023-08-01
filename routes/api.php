<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', AuthController::class)->name('login');