<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryTypeController;
use App\Http\Controllers\SaleController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [ UserController::class, 'index' ]);
    Route::get('/users/{user}', [ UserController::class, 'show' ]);
    Route::put('/users/{user}', [ UserController::class, 'update' ]);
    Route::delete('/users/{user}', [ UserController::class, 'destroy' ]);

    Route::get('/category_types', [CategoryTypeController::class, 'index']);
    Route::post('/category_types', [CategoryTypeController::class, 'store']);
    Route::get('/category_types/{category_type}', [CategoryTypeController::class, 'show']);
    Route::put('/category_types/{category_type}', [CategoryTypeController::class, 'update']);
    Route::delete('/category_types/{category_type}', [CategoryTypeController::class, 'destroy']);

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

    Route::get('/sales', [SaleController::class, 'index']);
    Route::post('/sales', [SaleController::class, 'store']);
    Route::get('/sales/{sale}', [SaleController::class, 'show']);
    Route::put('/sales/{sale}', [SaleController::class, 'update']);
    Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
