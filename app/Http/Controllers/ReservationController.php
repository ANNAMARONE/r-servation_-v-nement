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
    
        // Logique de création de réservation
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->evenement_id = $evenement_id;
        $reservation->save();
    
        return redirect()->route('evenements.liste')->with('reservation_success', true);
    }
    public function index()
    {
        // Récupère les réservations de l'utilisateur connecté
        $reservations = Reservation::where('user_id', Auth::id())->get();

        return view('reservations.mes_reservations', ['reservations' => $reservations]);
    }
    public function rejectReservation(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        
        // Mettre à jour le statut de la réservation à 'rejeter'
        $reservation->update(['statut' => 'rejeter']);

        // Redirection vers la page précédente avec un message de succès
        return back()->with('success', 'Réservation rejetée avec succès.');
    }

}
