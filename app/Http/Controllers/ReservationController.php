<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function listeReservation(){
        // Récupérer toutes les réservations avec les relations utilisateurs
        $reservations = Reservation::with('user')->paginate(9);

        // Retourner la vue avec les données des réservations
        return view('reservations.listeReservation', compact('reservations'));

    }
}
