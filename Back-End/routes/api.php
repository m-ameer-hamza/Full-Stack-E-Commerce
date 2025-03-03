<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});
Route::controller(ProductController::class)->group(function () {
    Route::get('products/featured', 'getFeatured');
    Route::get('products/category/{category}', 'getByCategory');
    Route::resource('products', ProductController::class)->except(['create', 'edit']);

});

Route::resource('orders', OrderController::class)->middleware('auth:sanctum')->except(['create', 'edit']);

// Payment routes
Route::controller(PaymentController::class)->group(function () {
    Route::post('/paymentIntent', 'createCheckoutSession')->middleware('auth:sanctum');
    Route::post('/storeCheckout', 'completeOrder')->middleware('auth:sanctum');
});
