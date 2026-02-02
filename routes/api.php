<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\adminController;
//use App\Http\Controllers\orderController;
use App\Http\Controllers\customerController;

//-------API Routes----------

// ------------------- Admin Routes -------------------
Route::prefix('admins')->group(function () {
    Route::get('/', [adminController::class, 'index']);       // GET /api/admins
    Route::post('/', [adminController::class, 'store']);      // POST /api/admins
    Route::get('{id}', [adminController::class, 'show']);     // GET /api/admins/{id}
    Route::put('{id}', [adminController::class, 'update']);   // PUT /api/admins/{id}
    Route::delete('{id}', [adminController::class, 'destroy']);// DELETE /api/admins/{id}
});

// ------------------- Category Routes -------------------
Route::prefix('categories')->group(function () {
    Route::get('/', [categoryController::class, 'index']);
    Route::post('/', [categoryController::class, 'store']);
    Route::get('{id}', [categoryController::class, 'show']);
    Route::put('{id}', [categoryController::class, 'update']);
    Route::delete('{id}', [categoryController::class, 'destroy']);
});

// ------------------- Item Routes -------------------
Route::prefix('items')->group(function () {
    Route::get('/', [itemController::class, 'index']);
    Route::post('/', [itemController::class, 'store']);
    Route::get('{id}', [itemController::class, 'show']);
    Route::put('{id}', [itemController::class, 'update']);
    Route::delete('{id}', [itemController::class, 'destroy']);
});

// ------------------- Customer Routes -------------------
Route::prefix('customers')->group(function () {
    Route::get('/', [customerController::class, 'index']);
    Route::post('/', [customerController::class, 'store']);
    Route::get('{id}', [customerController::class, 'show']);
    Route::put('{id}', [customerController::class, 'update']);
    Route::delete('{id}', [customerController::class, 'destroy']);
});
/*
// ------------------- Order Routes -------------------
Route::prefix('orders')->group(function () {
    Route::get('/', [orderController::class, 'index']);
    Route::post('/', [orderController::class, 'store']);
    Route::get('{id}', [orderController::class, 'show']);
    Route::put('{id}', [orderController::class, 'update']);
    Route::delete('{id}', [orderController::class, 'destroy']);

    // Attach items to an order with quantity
    Route::post('{id}/items', [orderController::class, 'addItems']);
});
*/

// ------------------- Test Route -------------------
// This ensures Laravel can see at least one route.
Route::get('test', function() {
    return ['message' => 'API is working!'];
});
