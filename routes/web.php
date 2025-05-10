<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Session;

// Rute home dengan logic untuk menampilkan modal login
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Redirect /login ke / dengan flash session untuk menampilkan modal login
Route::get('/login', function () {
    return redirect()->route('home')->with('show_login_modal', true);
})->name('login.redirect');

// Route post untuk login tetap ada
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Rute admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');
    Route::post('/change-password', [DashboardController::class, 'changePassword'])->middleware('auth')->name('admin.change-password');
});

// Rute user
Route::prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware('auth')->name('user.dashboard');
    // Tambahkan rute lain untuk user di sini
});

// Rute dashboard umum untuk redirect
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->hasRole('user')) {
            return redirect()->route('user.dashboard'); // Perbaikan di sini
        }
    }
    
    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/team', function () {
    return view('team');
})->name('team');
