<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;
use App\Livewire\SalesReport;







Route::get('/', function () {
    return view('index');
});

// loads index.blade.php
Route::get('/', function () {
    return view('index'); 
});

// create category.blade.php
Route::get('/category', function () {
    return view('category'); 
});
// create about.blade.php
Route::get('/about', function () {
    return view('about');
});
// create category.blade.php
Route::get('/category', function () {
    return view('category'); 
});
// create products.blade.php
Route::get('/products', function () {
    return view('products'); 
});
//Product Controller
Route::get('/products/{category}', [ProductController::class, 'index']);
//Load Contact page 
Route::get('/contact', function () {
    return view('contact');
});
//Login 
Route::get('/login', function () {
    return view('auth.login');
})->name('login'); 

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');


    // Admin Product Upload Page
// Product upload form
Route::get('/admin/product/upload', [ProductController::class, 'uploadForm'])
    ->name('admin.product.upload');

// Handle upload POST
Route::post('/admin/product/upload', [ProductController::class, 'upload'])
    ->name('admin.product.upload.post');

    
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

//checkout
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

// Product list
Route::get('/admin/products', [ProductController::class, 'manage'])->name('admin.products');

// Edit form
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

// Update product
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');

// Delete product
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');


// Show registration form
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request, CreateNewUser $creator) {
    $creator->create($request->all());

    return redirect()->route('login')->with('success', 'Registration successful! Please login.');
})->name('register.post');

// Sales report page
Route::get('/admin/sales-report', SalesReport::class)->name('admin.sales-report');
Route::get('/admin/sales-report', SalesReport::class)
     ->name('admin.sales-report');

     Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');





