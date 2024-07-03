<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $evenements = Evenement::paginate(10); // Pagination
        $totalEvenements = Evenement::count();
        $totalParticipants = 0; // Remplacez par le calcul réel des participants
        $totalReservations = 0; // Remplacez par le calcul réel des réservations

        return view('evenements.dashoardEv', compact('evenements', 'totalEvenements', 'totalParticipants', 'totalReservations'));
    }
// public function show($id)
    // {
    //     $evenement = Evenement::findOrFail($id);
    //     return view('evenements.show', compact('evenement'));
    // }
public function destroy($id)
    {
        // Supprimer l'événement
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();

        return redirect()->route('dashboardevenements.index')->with('success', 'Événement supprimé avec succès.');
    }

    
/**
 * Affiche les détails d'un événement spécifique.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function detailsEvenement($id)
{
    // Trouver l'événement spécifique par son identifiant ($id)
    $evenement = Evenement::findOrFail($id);
    $user = User::find($evenement->user_id);
    $evenementsListe = Evenement::take(3)->get();
    // Retourner la vue 'evenements.show' avec les détails de l'événement trouvé
    return response()->view('evenements.detailsEvenement', compact('evenement','user','evenementsListe'));
}

}

