<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EvenementRequest;

class EvenementController extends Controller
{
 // Affiche une liste de tous les événements
 public function index()
 {
    $evenements = Evenement::paginate(9);
    return view('evenements.index', compact('evenements'));
 }
 public function  listeEvenements()
 {
    $evenements = Evenement::paginate(8);
    return view('evenements.liste_evenements', compact('evenements'));
 }

public function show($id){
    $evenement =Evenement::find($id);
    return view('evenements.show', compact('evenement'));
}
 // Affiche le formulaire pour créer un nouvel événement
 public function create()
 {
    $user = Auth::user();
     $organismeId = $user->organisme_id;
   
     return view('evenements.create',compact('user','organismeId')); // Retourne la vue de création d'un événement
 }

public function store(EvenementRequest $request)
{
    // Récupère l'utilisateur connecté
    $user = Auth::user();

    // Récupère l'organisme associé à l'utilisateur connecté
    $organisme = $user->organisme;

    if (!$organisme) {
        return redirect()->back()->with('error', 'L\'utilisateur connecté n\'est pas associé à un organisme.');
    }

    // Crée un nouvel événement avec les données validées et l'ID de l'organisme
    Evenement::create(array_merge(
        $request->validated(),
        ['organisme_id' => $organisme->id]
    ));

    // Redirige vers la liste des événements avec un message de succès
    return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès.');
}




   // Affiche le formulaire d'édition pour un événement existant
   public function edit($id)
   {
       $evenement = Evenement::findOrFail($id); // Récupère l'événement par son ID ou retourne une erreur 404 si non trouvé
       return view('evenements.edit', compact('evenement')); // Retourne la vue d'édition avec les données de l'événement
   }

   // Met à jour un événement existant dans la base de données
   public function update(EvenementRequest $request, $id) // Utilise la Form Request pour valider les données
   {
       $evenement = Evenement::findOrFail($id); // Récupère l'événement par son ID ou retourne une erreur 404 si non trouvé
       $evenement->update($request->validated()); // Met à jour l'événement avec les données validées

       // Redirige vers la liste des événements avec un message de succès
       return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès.');
   }

 // Supprime un événement existant de la base de données
 public function destroy($id)
 {
     $evenement = Evenement::findOrFail($id); // Récupère l'événement par son ID ou retourne une erreur 404 si non trouvé
     $evenement->delete(); // Supprime l'événement

     // Redirige vers la liste des événements avec un message de succès
     return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès.');
 }

public function listeEvenementDashboard(Request $request)
{
// Vérifier s'il y a un organisme spécifié dans la requête
$organismeId = $request->input('user_id');

// Définir les variables pour les statistiques
$totalEvenements = null;
$totalParticipants = null;
$totalReservations = null;

// Si un organisme est spécifié, calculer les statistiques pour cet organisme
if ($organismeId) {
$totalEvenements = Evenement::where('user_id', $organismeId)->count();

$totalParticipants = User::whereHas('reservations', function ($query) use ($organismeId) {
$query->whereHas('evenement', function ($query) use ($organismeId) {
$query->where('user_id', $organismeId);
});
})->count();

$totalReservations = Reservation::whereHas('evenement', function ($query) use ($organismeId) {
$query->where('user_id', $organismeId);
})->count();
}

// Récupérer la liste des événements paginés
$evenements = Evenement::paginate(9);

// Retourner la vue avec toutes les données nécessaires
return view('dashboard', compact('totalEvenements', 'totalParticipants', 'totalReservations', 'evenements'));
}
public function evenementVenire(){

    $evenements = Evenement::take(4)->get();

    $evenements = Evenement::paginate(4);

    return view('welcome', compact('evenements'));

}

}













    




