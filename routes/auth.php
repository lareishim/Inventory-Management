<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\LogController;


// Google OAuth (make sure user gets logged in after callback)
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.submit');

    Route::get('/register', fn() => view('auth.register'))->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

    Route::get('/forgot-password', fn() => view('auth.forgot-password'))->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', fn($token) => view('auth.reset-password', ['token' => $token]))->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Authenticated user routes
Route::middleware('auth')->group(function () {
    // Email verification
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');

    // Confirm password
    Route::get('/confirm-password', fn() => view('auth.confirm-password'))->name('password.confirm');
    Route::post('/confirm-password', [ConfirmPasswordController::class, 'store']);

    // Logout
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});

// Admin routes (only for users with role:admin)
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    // Admin features
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');

    Route::get('/logs', [LogController::class, 'index'])->name('admin.logs');
    Route::delete('/logs/clear', [LogController::class, 'clear'])->name('admin.logs.clear');
});

Route::get('/test-google-env', function () {
    dd([
        'env_raw' => env('GOOGLE_CLIENT_ID'),
        'config_read' => config('services.google.client_id'),
    ]);
});

Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
