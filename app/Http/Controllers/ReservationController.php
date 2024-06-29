<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function listeReservation(){
       // Récupérer toutes les réservations avec les relations utilisateurs et événements
       $reservations = Reservation::with('user', 'evenement')->paginate(9);

        // Retourner la vue avec les données des réservations
        return view('reservations.listeReservation', compact('reservations'));

    }
    public function create($evenement_id)
    {
        $evenement = Evenement::findOrFail($evenement_id);
        $evenement->nbr_place_restante = $evenement->nbr_place - $evenement->reservations()->count();
        return view('reservations.create', compact('evenement'));
    }

    public function store(Request $request, $evenement_id)
    {
        $evenement = Evenement::findOrFail($evenement_id);

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->evenement_id = $evenement_id;
        $reservation->statut = 'accepter'; // Par défaut
        $reservation->save();

        return redirect()->route('evenements.liste')->with('success', 'Réservation effectuée avec succès');
    }
}
