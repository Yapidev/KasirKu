<?php

use Illuminate\Support\Facades\Route;

// Public Route
Route::get('/', function () {
    return to_route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', App\Livewire\Auth\Login::class)->name('login');
});
