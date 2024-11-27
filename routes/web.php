<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Employee;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\Route;

// Public Route
Route::middleware(Guest::class)->group(function () {
    Route::get('login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/', function () {
        return to_route('login');
    });
});

// Route Admin
Route::middleware(Admin::class)->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        return 'berhasil login admin';
    })->name('admin.dashboard');
});

// Route Employee
Route::middleware(Employee::class)->prefix('employee')->group(function () {
    Route::get('dashboard', function () {
        return 'berhasil login employee';
    })->name('employee.dashboard');
});
