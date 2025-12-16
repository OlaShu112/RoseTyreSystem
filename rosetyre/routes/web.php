<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TyreController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tyres Page
Route::get('/tyres', [TyreController::class, 'index'])->name('tyres');

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

// Special Offers
Route::get('/offers', [OfferController::class, 'index'])->name('offers');

// Find a Branch
Route::get('/branches', [BranchController::class, 'index'])->name('branches');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards
Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
Route::get('/dashboard/customer', [DashboardController::class, 'customer'])->name('dashboard.customer');

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('users/store', [UserController::class, 'store'])->name('admin.users.store');
});
