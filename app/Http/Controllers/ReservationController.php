<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\RejectionReservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationReservation;
use Illuminate\Pagination\Paginator;

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
        return view('evenements.liste_evenements', compact('evenement'));
    }

    public function store(Request $request, $evenement_id)
    {
        $evenement = Evenement::findOrFail($evenement_id);
    
        // Logique de création de réservation
        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->evenement_id = $evenement_id;
        $reservation->save();
        // Envoyez l'email de confirmation
        Mail::to(Auth::user()->email)->send(new ConfirmationReservation($reservation));
    
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
        Mail::to(Auth::user()->email)->send(new RejectionReservation($reservation));
        
        // Mettre à jour le statut de la réservation à 'rejeter'
        $reservation->update(['statut' => 'rejeter']);

        // Redirection vers la page précédente avec un message de succès
        return back()->with('success', 'Réservation rejetée avec succès.');
    }

}
