<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function (Request $request) {
    return inertia('Home', 
        ['users' => User::when($request->search, function($query) use ($request) {
            $query
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ;
        })->paginate(8)->withQueryString(),

        'searchTerm' => $request->search,

        'can' => [
            'delete_user' => 
                Auth::user() ? 
                Auth::user()->can('delete', User::class) : 
                null
        ]
    ]);
})->name('home');

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
