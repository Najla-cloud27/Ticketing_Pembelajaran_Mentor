<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/products', [ProductsController::class, 'index'])->middleware('auth:sanctum');

// ROUTE UNTUK PRODUCT
Route::apiResource('/api-product', ProductsController::class)->middleware('auth:sanctum');

// Route untuk --api/ atau route list, api kategori
Route::apiResource('/api-categories', CategoryController::class)->middleware('auth:sanctum');

// Route untuk order
Route::apiResource('/api-orders', OrderController::class)->middleware('auth:sanctum');
// Route untuk orderItems
Route::apiResource('/api-orders-items', OrderItemController::class)->middleware('auth:sanctum');