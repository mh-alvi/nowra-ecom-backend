<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProductController,
    OrderController,
    PaymentController,
    WishlistController,
    BlogController,
    StockController
};

// Authentication Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/blogs', [BlogController::class, 'index']);

// User Routes
Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::get('/user/profile/{id}', [UserController::class, 'profile']);
    Route::put('/user/update/{id}', [UserController::class, 'updateProfile']);

    Route::post('/wishlist/add', [WishlistController::class, 'add']);
    Route::delete('/wishlist/{id}/delete', [WishlistController::class, 'delete']);
    Route::get('/wishlist', [WishlistController::class, 'index']);

    Route::post('/order/create', [OrderController::class, 'create']);
    Route::get('/order', [OrderController::class, 'index']);

    Route::post('/payments/initiate', [PaymentController::class, 'initiate']);
});

// Admin Routes
Route::middleware(['auth:sanctum', 'role:admin,super-admin'])->prefix('admin')->group(function () {
    //products
    Route::post('/products/create', [ProductController::class, 'store']);
    Route::put('/products/{id}/edit', [ProductController::class, 'update']);
    Route::delete('/products/{id}/delete', [ProductController::class, 'destroy']);
    //stocks
    Route::post('/stocks/create', [StockController::class, 'store']);
    Route::put('/stocks/{id}/edit', [StockController::class, 'update']);
    Route::delete('/stocks/{id}/delete', [StockController::class, 'destroy']);
    //blogs
    Route::post('/blogs/create', [BlogController::class, 'store']);
    Route::put('/blogs/{id}/edit', [BlogController::class, 'update']);
    Route::delete('/blogs/{id}/delete', [BlogController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'adminIndex']);
});