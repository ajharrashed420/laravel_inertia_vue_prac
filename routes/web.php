<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;

Route::inertia('/', 'Home', ['users' => User::paginate(10)])->name('home');

Route::middleware('guest')->group(function() {
    //Registration Routes
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    //User Login Routes
    Route::inertia('/login', 'Auth/Login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    //Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Dashboard
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
});
