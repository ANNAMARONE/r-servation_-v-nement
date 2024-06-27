<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sidebar', function () {
    return view('layouts/app');
});
//route pour la liste des evenements
Route::get('/evenements/liste', [EvenementController::class, 'listeEvenement']);
Route::get('/reservations/liste', [ReservationController::class, 'listeReservation']);