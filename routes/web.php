<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index');
Route::view('/almanac', 'almanac.index');

Route::resource('jobs', JobController::class);

