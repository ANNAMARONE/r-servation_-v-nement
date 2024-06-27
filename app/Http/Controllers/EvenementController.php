<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function listeevement(){
        $evenements = Evenement::paginate(9);
        return view('evenements.listeEvenements', compact('evenements'));
    }
}
