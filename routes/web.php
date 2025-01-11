<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;



Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Menampilkan form
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Menyimpan data
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Menampilkan form edit
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // Memproses update data
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
});


require __DIR__.'/auth.php';
