<?php
use Illuminate\Support\Facades\Route;

use App\Livewire\Customers;

Route::get('/', function () {
    if (Auth::check()) {
        // Redirect authenticated users to the dashboard
        $this->customers = Customers::all();
        return redirect()->route('dashboard');
    } else {
        // Redirect non-authenticated users to the login page
        return redirect()->route('login');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $this->customers = Customers::all();
        return view('dashboard'); // Ensure a 'dashboard.blade.php' exists in your views folder
    })->name('dashboard');
    Route::get('/profile', function () {
        return view('profile'); // Ensure there is a 'profile.blade.php' in your views folder
    })->name('profile');
});

// Route::get('/', function () {
//     return view('auth.login'); // Redirects to login
// })->middleware('guest');


// Protect routes with the auth middleware
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
//     Route::get('/customers', [CustomerController::class, 'index']);
// });

Route::get('/customers', Customers::class);

Route::get('/phpmyadmin', function () {
    abort(404);
});

require __DIR__.'/auth.php';