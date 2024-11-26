<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Customers;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers', Customers::class);

Route::get('/phpmyadmin', function () {
    abort(404);
});
