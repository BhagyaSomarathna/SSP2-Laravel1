<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;


Route::get('/', function () {
    return view('index');
});




Route::get('/', function () {
    return view('index'); // loads resources/views/index.blade.php
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login'); 

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');





    // Admin Product Upload Page
// Product upload form
Route::get('/admin/product/upload', [ProductController::class, 'uploadForm'])
    ->name('admin.product.upload');

// Handle upload POST
Route::post('/admin/product/upload', [ProductController::class, 'upload'])
    ->name('admin.product.upload.post');



    /// Admin Product Upload Page
Route::get('/admin/product/update', [ProductController::class, 'updateForm'])
    ->name('admin.product.update'); // <- THIS NAME MUST MATCH your Blade


    // Reports
Route::get('/admin/report', [DashboardController::class, 'report'])
    ->name('admin.report');

   // Orders
Route::get('/admin/orders', [DashboardController::class, 'orders'])
    ->name('admin.orders');

// Customers
Route::get('/admin/customers', [DashboardController::class, 'customers'])
    ->name('admin.customers');


// Cart Page
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');

// Add product to cart
Route::post('/cart/add', [cartController::class, 'add'])->name('cart.add');

// Remove product from cart
Route::get('/cart/remove/{id}', [cartController::class, 'remove'])->name('cart.remove');

// Clear cart
Route::get('/cart/clear', [cartController::class, 'clear'])->name('cart.clear');


Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout')
    ->middleware('auth');

    

Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.placeOrder')
    ->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});





Route::get('/profile', [ProfileController::class, 'index'])->name('profile');



// Place order
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('checkout.placeOrder');


// Checkout page
Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');

    // Order confirmation page
Route::get('/order/confirmation/{id}', [CheckoutController::class, 'orderConfirmation'])
    ->name('order.confirmation');

    Route::get('/category', function () {
    return view('category');
})->name('category');  
