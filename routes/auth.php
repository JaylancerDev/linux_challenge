<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'livewire.pages.auth.register')
        ->name('register');

    Volt::route('login', 'livewire.pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'livewire.pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'livewire.pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'livewire.pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'livewire.pages.auth.confirm-password')
        ->name('password.confirm');
});
