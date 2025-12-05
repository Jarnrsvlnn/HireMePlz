<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/', 'home.index')->name('home.index');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.showRegister');
Route::view('/almanac', 'almanac.index');

Route::resource('jobs', JobController::class);

