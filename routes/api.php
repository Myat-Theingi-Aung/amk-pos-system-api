<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryTypeController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [ UserController::class, 'index' ]);
    Route::get('/users/{user}', [ UserController::class, 'show' ]);
    Route::put('/users/{user}', [ UserController::class, 'update' ]);
    Route::delete('/users/{user}', [ UserController::class, 'destroy' ]);

    Route::get('/categories_type', [CategoryTypeController::class, 'index']);
    Route::post('/categories_type', [CategoryTypeController::class, 'store']);
    Route::get('/categories_type/{category_type}', [CategoryTypeController::class, 'show']);
    Route::put('/categories_type/{category_type}', [CategoryTypeController::class, 'update']);
    Route::delete('/categories_type/{category_type}', [CategoryTypeController::class, 'destroy']);

    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
