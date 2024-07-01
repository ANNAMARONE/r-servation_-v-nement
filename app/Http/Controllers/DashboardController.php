<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;

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

    public function create()
    {
        return view('evenements.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom_evenement' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string',
            'nbr_place' => 'required|integer',
            'date_limite' => 'required|date',
            'image' => 'required|image|max:2048',
        ]);

        // Enregistrer l'image
        $imagePath = $request->file('image')->store('images', 'public');

        // Créer un nouvel événement
        Evenement::create(array_merge(
            $request->all(),
            ['image' => $imagePath]
        ));

        return redirect()->route('dashboardevenements.index')->with('success', 'Événement créé avec succès.');
    }

    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.show', compact('evenement'));
    }

    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom_evenement' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string',
            'nbr_place' => 'required|integer',
            'date_limite' => 'required|date',
            'image' => 'image|max:2048',
        ]);

        $evenement = Evenement::findOrFail($id);

        // Enregistrer la nouvelle image si elle est fournie
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $evenement->update(array_merge(
                $request->all(),
                ['image' => $imagePath]
            ));
        } else {
            $evenement->update($request->all());
        }

        return redirect()->route('dashboardevenements.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Supprimer l'événement
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();

        return redirect()->route('dashboardevenements.index')->with('success', 'Événement supprimé avec succès.');
    }
}
