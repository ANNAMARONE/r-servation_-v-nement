<?php

use App\Http\Controllers\OrganismeController;

use App\Http\Controllers\PortailController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;



Route::get('/',[EvenementController::class,'evenementVenire']); 
    // $createAmin= Role ::create(['name'=>'Administrateur']);
    // $createUtlisateur= Role ::create(['name'=>'Utilisateur']);
    // $createOrganismes= Role ::create(['name'=>'Organismes']);


    
    // $permission_gestionUtili= Permission::create(['name'=>'GestionUtilisateurs']);
    // $permission_gestionRols= Permission::create(['name'=>'GestionRoles']);
    // $permission_gestionEvenement= Permission::create(['name'=>'GestionEvenements']);
    // $permission_suprimerEvenement= Permission::create(['name'=>'SuprimerEvenements']);
    // $permission_voireProfil= Permission::create(['name'=>'VoireProfil']);
    // $permission_modifierProfil= Permission::create(['name'=>'ModifierProfil']);
    // $permission_resvation= Permission::create(['name'=>'FaireReservation']);
    // $permission_gestionReservation= Permission::create(['name'=>'GestionReservation']);
    // $permission_voireTableauboard= Permission::create(['name'=>'VoireTableauBoard']);
    // $permission_CréerEvenement=Permission::create(['name'=>'CréerEvenement']);

    // $rolesAdmin=Role::find(1);
    // $rolesAdmin->givePermissionTo('GestionUtilisateurs');
    // $rolesAdmin->givePermissionTo('GestionRoles');
    // $rolesAdmin->givePermissionTo('SuprimerEvenements');
    // $rolesAdmin->givePermissionTo('VoireTableauBoard');

    // $rolesUtilisateur=Role::find(2);
    // $rolesUtilisateur->givePermissionTo('FaireReservation');
    // $rolesUtilisateur->givePermissionTo('VoireProfil');

    // $rolesOrganismes=Role::find(3);
    // $rolesOrganismes->givePermissionTo('GestionReservation');
    // $rolesOrganismes->givePermissionTo('CréerEvenement');
    // $rolesOrganismes->givePermissionTo('VoireProfil');
    // $rolesOrganismes->givePermissionTo('ModifierProfil');
    // $rolesOrganismes->givePermissionTo('GestionEvenements');
    // $rolesOrganismes->givePermissionTo('VoireTableauBoard');
    // dump($rolesAdmin);
    // dump($rolesUtilisateur);
    // dump($rolesOrganismes);
    

Route::get('organisme',[OrganismeController::class,'create_organisme']);
Route::post('/envoie',[OrganismeController::class,'storeOrganisme'])->name('organisme');
Route::get('/listeorganismes',[OrganismeController::class,'listeorganisme']);
Route::delete('/suprimerOrganisme/{id}',[OrganismeController::class,'SuprimerOrganisme'])->name('SuprimerOrganisme');
Route::get('/detailOrgenisme/{id}',[OrganismeController::class,'detailOrganisme'])->name('DetailOrganisme');
Route::get('compte/rejeter/{id}', [OrganismeController::class, 'rejeter'])->name('compte.rejeter'); // Rejeter une candidature
Route::get('compte/accepter/{id}', [OrganismeController::class, 'accepter'])->name('compte.accepter'); // Accepter une candidature



Route::resource('evenements', EvenementController::class);
Route::get('liste/evenements', [EvenementController::class, 'listeEvenements'])->name('evenements.liste');
Route::get('/reservation/create/{evenement}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/store/{evenement}', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::put('/reservations/reject/{id}', [ReservationController::class, 'rejectReservation'])->name('reservations.reject');




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

Route::get('dashboard',[EvenementController::class, 'listeEvenementDashboard'] )
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';







// users
Route::resource('users', UserController::class);

// Dashboard evemetement
Route::resource('dashboardevenements', DashboardController::class);
// footer
Route::get('/footer-example', function () {
    return view('layouts/footer');
});





