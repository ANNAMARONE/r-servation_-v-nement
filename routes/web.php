<?php

use App\Http\Controllers\EvenementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sidebar', function () {
    return view('layouts/app');
});
//route pour la liste des evenements
Route::get('/evenements/liste', [EvenementController::class, 'listeevement']);
