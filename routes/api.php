<?php

use App\Http\Middleware\RoleChecker;
use App\Http\Middleware\PreventRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\CategoryTypeController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Middleware\PreventOtherUserAccess;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::middleware([PreventRoute::class])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/forgot', [ForgotPasswordController::class, 'forgot']);
    Route::post('/reset/{user}', [ResetPasswordController::class, 'reset']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware([RoleChecker::class . ':admin'])->group(function () {
        Route::get('/users', [ UserController::class, 'index' ]);
        Route::post('/users/create', [UserController::class, 'store']);
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
        
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{product}', [ProductController::class, 'update']);
        Route::delete('/products/{product}', [ProductController::class, 'destroy']);

        Route::get('/sales', [SaleController::class, 'index']);
        Route::post('/sales', [SaleController::class, 'store']);
        Route::get('/sales/{sale}', [SaleController::class, 'show']);
        Route::put('/sales/{sale}', [SaleController::class, 'update']);
        Route::delete('/sales/{sale}', [SaleController::class, 'destroy']);

        Route::get('/sale_items', [SaleItemController::class, 'index']);
        Route::post('/sale_items', [SaleItemController::class, 'store']);
        Route::get('/sale_items/{saleItem}', [SaleItemController::class, 'show']);
        Route::put('/sale_items/{saleItem}', [SaleItemController::class, 'update']);
        Route::delete('/sale_items/{saleItem}', [SaleItemController::class, 'destroy']);

        Route::get('/payments', [PaymentController::class, 'index']);
        Route::post('/payments', [PaymentController::class, 'store']);
        Route::get('/payments/{payment}', [PaymentController::class, 'show']);
        Route::put('/payments/{payment}', [PaymentController::class, 'update']);
        Route::delete('/payments/{payment}', [PaymentController::class, 'destroy']);
    });

    Route::middleware([PreventOtherUserAccess::class])->group(function (){
        Route::get('/users/{user}', [ UserController::class, 'show' ]);
        Route::put('/users/{user}', [ UserController::class, 'update' ]);
        Route::post('/users/change/password/{user}', [ UserController::class, 'changePassword' ]);

        Route::get('/sales/{user}/user', [SaleController::class, 'userSale']);
        Route::get('/payments/{user}/user', [PaymentController::class, 'userPayment']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
