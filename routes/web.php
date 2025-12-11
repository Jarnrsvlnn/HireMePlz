<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function() {
    // NAV ROUTES
    Route::view('/', 'home.index')->name('home.index');
    Route::resource('jobs', JobController::class);
    Route::view('/almanac', 'almanac.index');

    // PROFILE ROUTES
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
}); 

Route::middleware(['guest'])->group(function() {
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.showRegister');
    Route::post('/register', [RegisterController::class, 'registerUser'])->name('register.registerUser');
    
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'loginUser'])->name('login.loginUser');
});






