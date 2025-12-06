<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::view('/', 'home.index')->name('home.index');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.showRegister');

// the register controller seems to be the problem
Route::post('/register', [RegisterController::class, 'registerUser'])->name('register.registerUser');

// Route::post('/register', function() {
//     return redirect()->route('home.index');
// })->name('register.registerUser');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login.showLogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::view('/almanac', 'almanac.index');

Route::resource('jobs', JobController::class);

