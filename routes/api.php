<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Models\Category;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('/products', ProductController::class)->middleware('auth:sanctum');
Route::apiResource('/api-category', CategoryController::class)->middleware('auth:sanctum');
Route::apiResource('/order', OrderController::class)->middleware('auth:sanctum');
Route::apiResource('/discount', DiscountController::class)->middleware('auth:sanctum');
