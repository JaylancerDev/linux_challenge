<?php

use App\Livewire\Customers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Home Route
Route::get('/', function () {
    if (Auth::check()) {
        // Redirect authenticated users to the dashboard
        return redirect()->route('dashboard');
    } else {
        // Redirect non-authenticated users to the login page
        return redirect()->route('login');
    }
});

// Protected Routes (only accessible for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        // Get all customers data and pass to the dashboard view
        $customers = \App\Models\Customer::all();  // Get all customers
        return view('dashboard', compact('customers')); // Pass data to dashboard view
    })->name('dashboard');
    
    Route::get('/profile', function () {
        return view('profile'); // Ensure you have a 'profile.blade.php' file
    })->name('profile');
});

// Livewire Component for Customers
Route::get('/customers', Customers::class)->name('customers');

// Disable access to PHPMyAdmin
Route::get('/phpmyadmin', function () {
    abort(404);
});

// Include the auth routes
require __DIR__.'/auth.php';
