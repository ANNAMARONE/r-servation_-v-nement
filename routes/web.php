<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ReservationController;



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Routes publiques accessibles à tous
Route::get('/', [EvenementController::class, 'evenementVenire'])->name('home'); 
Route::get('liste/evenements', [EvenementController::class, 'listeEvenements'])->name('evenements.liste'); 
Route::get('organisme', [OrganismeController::class, 'create_organisme'])->name('register_organisme');
Route::post('/envoie', [OrganismeController::class, 'storeOrganisme'])->name('organisme');


// Routes pour les utilisateurs simples après authentification
Route::middleware(['auth', 'role:utilisateur'])->group(function () {
    Route::get('/reservation/create/{evenement}', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store/{evenement}', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

});


// Routes pour les organismes
Route::middleware(['auth', 'role:organisme'])->group(function () {
    Route::resource('evenements', EvenementController::class);
    Route::get('/reservations/liste/{evenement_id}', [ReservationController::class, 'listeReservation']);
    Route::put('/reservations/reject/{id}', [ReservationController::class, 'rejectReservation'])->name('reservations.reject');
    Route::get('dashboard_organisme', [EvenementController::class, 'listeEvenementDashboard'])->name('dashboard_organisme');
});



// Routes pour l'admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/listeorganismes', [OrganismeController::class, 'listeorganisme'])->name('liste_organismes');
    Route::delete('/suprimerOrganisme/{id}', [OrganismeController::class, 'SuprimerOrganisme'])->name('SuprimerOrganisme');
    Route::get('/detailOrgenisme/{id}', [OrganismeController::class, 'detailOrganisme'])->name('DetailOrganisme');
    Route::get('compte/rejeter/{id}', [OrganismeController::class, 'rejeter'])->name('compte.rejeter'); // Rejeter une candidature
    Route::get('compte/accepter/{id}', [OrganismeController::class, 'accepter'])->name('compte.accepter'); // Accepter une candidature
    Route::resource('dashboardevenements', DashboardController::class);
    Route::get('dashboard_admin',[DashboardController::class,'dashboard_admin'])->name('dashboard_admin');
    Route::resource('permissions', PermissionsController::class);
    Route::resource('roles',RoleController::class);
    Route::get('roles/{id}/permissions', [RoleController::class, 'editPermissions'])->name('roles.editPermissions');
    Route::post('roles/{id}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');
    Route::put('bloquer/{id}',[OrganismeController::class,'bloquer'])->name('organismes.bloquer');
    Route::put('activer/{id}',[OrganismeController::class,'activer'])->name('organismes.activer');

});
require __DIR__.'/auth.php';
