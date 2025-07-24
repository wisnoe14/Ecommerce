<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

// Halaman utama untuk user
Route::get('/', [HomeController::class, 'index'])->name('home');


// Halaman detail produk untuk user
Route::get('/produk/{id}', [HomeController::class, 'show'])->name('produk.detail');


// Login Routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register Routes
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/produk/{slug}', function ($slug) {
    return view('product-detail', ['slug' => $slug]);
})->name('produk.detail');


    
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
});

use App\Http\Controllers\AccountController;

Route::get('/account', [AccountController::class, 'edit'])->name('account.edit')->middleware('auth');
Route::put('/account', [AccountController::class, 'update'])->name('account.update')->middleware('auth');

