<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
Route::get('/sidebar', function () {
    return view('layouts/app');
});
