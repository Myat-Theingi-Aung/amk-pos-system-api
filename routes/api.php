<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [ UserController::class, 'index' ]);
    Route::get('/user/{user}', [ UserController::class, 'show' ]);
    Route::put('/user/{user}', [ UserController::class, 'update' ]);
    Route::delete('/user/{user}', [ UserController::class, 'destroy' ]);
    Route::post('/logout', [AuthController::class, 'logout']);
});
