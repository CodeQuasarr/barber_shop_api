<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HairCuts\HaircutController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::apiResource('haircuts', HaircutController::class);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('payment', [PaymentController::class, 'index']);
    Route::apiResource('orders', OrderController::class);
    Route::get('orders/{orderId}/invoice', [OrderController::class, 'download']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'me']);
});
