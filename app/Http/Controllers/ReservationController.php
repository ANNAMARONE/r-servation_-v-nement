<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function listeReservation(){
       // Récupérer toutes les réservations avec les relations utilisateurs et événements
       $reservations = Reservation::with('user', 'evenement')->paginate(9);

        // Retourner la vue avec les données des réservations
        return view('reservations.listeReservation', compact('reservations'));

    }

    
    public function statistiquesOrganismes($organismeId)
    {
        // Calculer le nombre total d'événements pour l'organisme spécifié
        $totalEvenements = Evenement::where('organisme_id', $organismeId)->count();

        // Calculer le nombre total de participants pour l'organisme spécifié
        $totalParticipants = User::whereHas('reservations', function ($query) use ($organismeId) {
            $query->whereHas('evenement', function ($query) use ($organismeId) {
                $query->where('organisme_id', $organismeId);
            });
        })->count();

        // Calculer le nombre total de réservations pour l'organisme spécifié
        $totalReservations = Reservation::whereHas('evenement', function ($query) use ($organismeId) {
            $query->where('organisme_id', $organismeId);
        })->count();

        // Retourner les statistiques à la vue
        return view('dashboard', compact('totalEvenements', 'totalParticipants', 'totalReservations'));
    }
}
