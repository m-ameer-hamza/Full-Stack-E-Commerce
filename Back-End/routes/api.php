<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Auth routes
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});
//Routes for Admin User
Route::middleware('auth:sanctum')->controller(ProductController::class)->group(function () {
    Route::post('products', 'create');
    Route::put('products/{id}', 'update');
    Route::delete('products/{id}', 'destroy');
});
//Routes for Public User
Route::controller(ProductController::class)->group(function(){
    Route::get('products', 'index');
    Route::get('products/{id}', 'show');
});
