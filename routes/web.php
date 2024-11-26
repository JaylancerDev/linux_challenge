<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\Customers;

Route::get('/', function () {
    return view('welcome');
});

// Protect routes with the auth middleware
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
//     Route::get('/customers', [CustomerController::class, 'index']);
// });

Route::get('/customers', Customers::class);

Route::get('/phpmyadmin', function () {
    abort(404);
});
