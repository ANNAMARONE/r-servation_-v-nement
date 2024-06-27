<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('evenements', EvenementController::class);


// Route pour afficher la liste de tous les événements
// Route::get('/evenements', [EvenementController::class, 'index'])->name('evenements.index');

// // Route pour afficher le formulaire de création d'un nouvel événement
// Route::get('/evenements/create', [EvenementController::class, 'create'])->name('evenements.create');

// // Route pour enregistrer un nouvel événement dans la base de données
// Route::post('/evenements', [EvenementController::class, 'store'])->name('evenements.store');

// // Route pour afficher les détails d'un événement spécifique
// Route::get('/evenements/{evenement}', [EvenementController::class, 'show'])->name('evenements.show');

// // Route pour afficher le formulaire d'édition d'un événement existant
// Route::get('/evenements/{evenement}/edit', [EvenementController::class, 'edit'])->name('evenements.edit');

// // Route pour mettre à jour un événement existant dans la base de données
// Route::put('/evenements/{evenement}', [EvenementController::class, 'update'])->name('evenements.update');

// // Route pour supprimer un événement existant de la base de données
// Route::delete('/evenements/{evenement}', [EvenementController::class, 'destroy'])->name('evenements.destroy');







