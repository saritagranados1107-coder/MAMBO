<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('orders', OrderController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

//Route::get('/orders', [OrderController::class, 'index']);

//Route::get('/orders/{order}', [OrderController::class, 'show']);

//Route::post('/orders', [OrderController::class, 'store']);

//Route::put('/orders/{order}', [OrderController::class, 'update']);

//Route::delete('/orders/{order}', [OrderController::class, 'destroy']);


Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/customers/{customer}', [CustomerController::class, 'show']);