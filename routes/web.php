<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('job');
});

Route::get('/jobs/create', function () {
    return view('createJob');
});

Route::get('/almanac', function () {
    return view('almanac');
});

Route::post('/jobs/create', [JobController::class, 'create']);  