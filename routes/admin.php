<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Admin Routes
*/

// Auth
Route::middleware('guest')->prefix('admin/')->name('admin.')->group(function (){
    // Login
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login/auth', [LoginController::class, 'authCheck'])->name('auth.check');
});

// Auth Routes
Route::middleware('admin')->prefix('admin/')->name('admin.')->group(function (){
    // Logout
    Route::post('logout', LogoutController::class)->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});



