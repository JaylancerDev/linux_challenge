<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\Customers;


Route::get('/', function () {
    if (Auth::check()) {
        // Redirect authenticated users to the dashboard
        return redirect()->route('customers');
    } else {
        // Redirect non-authenticated users to the login page
        return redirect()->route('login');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('/customers', Customers::class)->name('customers');
    Route::get('/profile', function () {
        return view('profile'); // Ensure there is a 'profile.blade.php' in your views folder
    })->name('profile');
});


Route::get('/dashboard', function () {
    return redirect()->route('customers');
});


Route::get('/phpmyadmin', function () {
    abort(404);
});

require __DIR__.'/auth.php';