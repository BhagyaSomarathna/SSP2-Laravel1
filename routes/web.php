<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/



Route::get('/', function () {
    return view('index'); // loads resources/views/index.blade.php
});

Route::get('/login', function () {
    return view('login'); // create login.blade.php
});

Route::get('/register', function () {
    return view('registration'); // create registration.blade.php
});

Route::get('/category', function () {
    return view('category'); // create category.blade.php
});

Route::get('/about', function () {
    return view('about'); // create category.blade.php
});

Route::get('/category', function () {
    return view('category'); // create category.blade.php
});

Route::get('/products', function () {
    return view('products'); // create category.blade.php
});



Route::get('/products/{category}', [ProductController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
});

// GET login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');   // 👈 must be "login"

// POST login action
Route::post('/login', [authController::class, 'login'])->name('login.post');

// Cart Page
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');

// Add product to cart
Route::post('/cart/add', [cartController::class, 'add'])->name('cart.add');

// Remove product from cart
Route::get('/cart/remove/{id}', [cartController::class, 'remove'])->name('cart.remove');

// Clear cart
Route::get('/cart/clear', [cartController::class, 'clear'])->name('cart.clear');

