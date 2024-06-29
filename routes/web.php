<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('evenements', EvenementController::class);
Route::get('liste/evenements', [EvenementController::class, 'listeEvenements']);

Route::get('/sidebar', function () {
    return view('layouts/app');
});
Route::get('/header', function () {
    return view('layouts/header');
});
Route::get('/sidebar_admin', function () {
    return view('layouts/sidebar_admin');
});
//route pour la liste des evenements
Route::get('/reservations/liste', [ReservationController::class, 'listeReservation']);
Route::view('/', 'welcome');

Route::get('dashboard',[EvenementController::class, 'listeEvenementDashboard'] )
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';