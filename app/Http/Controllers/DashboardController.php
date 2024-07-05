<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin')->orWhere('name', 'organisme');
        })->count();
    
        $totalOrganismes = User::role('organisme')->count();
    
        $totalEvenements = Evenement::count();
    
      
        $evenements = Evenement::paginate(10);
    
        return view('admins.dashboardEv', compact('evenements', 'totalEvenements', 'totalUsers', 'totalOrganismes'));
    }
    
// public function show($id)
//     {
//         $evenement = Evenement::findOrFail($id);
//         return view('evenements.detailsEvenement', compact('evenement'));
//     }
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
public function show($id)
{
    // Trouver l'événement spécifique par son identifiant ($id)
    $evenement = Evenement::findOrFail($id);
    $user = User::find($evenement->user_id);
    $evenementsListe = Evenement::take(3)->get();
    $organisme = $evenement->organisme->user->name;
    // Retourner la vue 'evenements.show' avec les détails de l'événement trouvé
    return response()->view('evenements.detailsEvenement', compact('evenement','user','evenementsListe','organisme'));
}

}

