<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobMenu', function () {
    return view('jobs.menu');
});

Route::resource('jobs', JobController::class);

Route::get('/almanac', function () {
    return view('almanac');
});

