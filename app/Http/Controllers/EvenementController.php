<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function listeEvenement(){
        $evenements = Evenement::paginate(9);
        return view('evenements.listeEvenements', compact('evenements'));
    }
    // public function listeEvenementDashboard(){
    //     $evenements = Evenement::paginate(9);
    //     return view('dashboard', compact('evenements'));
    // }
    public function listeEvenementDashboard(Request $request)
    {
        // Vérifier s'il y a un organisme spécifié dans la requête
        $organismeId = $request->input('organisme_id');

        // Définir les variables pour les statistiques
        $totalEvenements = null;
        $totalParticipants = null;
        $totalReservations = null;

        // Si un organisme est spécifié, calculer les statistiques pour cet organisme
        if ($organismeId) {
            $totalEvenements = Evenement::where('organisme_id', $organismeId)->count();

            $totalParticipants = User::whereHas('reservations', function ($query) use ($organismeId) {
                $query->whereHas('evenement', function ($query) use ($organismeId) {
                    $query->where('organisme_id', $organismeId);
                });
            })->count();

            $totalReservations = Reservation::whereHas('evenement', function ($query) use ($organismeId) {
                $query->where('organisme_id', $organismeId);
            })->count();
        }

        // Récupérer la liste des événements paginés
        $evenements = Evenement::paginate(9);

        // Retourner la vue avec toutes les données nécessaires
        return view('dashboard', compact('totalEvenements', 'totalParticipants', 'totalReservations', 'evenements'));
    }
}

