<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

// Hanya satu route untuk '/'
Route::get('/', function () {
    return view('landing'); // ganti sesuai kebutuhan
});

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

