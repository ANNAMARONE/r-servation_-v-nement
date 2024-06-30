<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class DetailsevenementController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function detailsEvenement()
    {
        // Récupère tous les événements de la base de données avec pagination
        $evenements = Evenement::paginate(10); // Paginer les résultats par 10 éléments par page
        
        // Retourne la vue 'evenements.detailsEvenement' avec les données des événements
        return view('evenements.detailsEvenement', compact('evenements'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        // Retourne la vue 'evenements.create' pour afficher le formulaire de création
        return view('evenements.create');
    }

    /**
     * Enregistre une nouvelle ressource dans la base de données.
     */
    public function store(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'nom_evenement' => 'required', // Le nom de l'événement est requis
            'image' => 'required', // L'image est requise
            'date' => 'required', // La date est requise
            'lieu' => 'required', // Le lieu est requis
            'description' => 'required', // La description est requise
            'nbr_place' => 'required', // Le nombre de places est requis
            'date_limite' => 'required', // La date limite est requise
        ]);

        // Crée un nouvel événement avec les données validées
        Evenement::create($request->all());

        // Redirige vers la liste des événements avec un message de succès
        return redirect()->route('evenements.detailsEvenement')->with('success', 'Événement créé avec succès.');
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Evenement $evenement)
    {
        // Retourne la vue 'evenements.show' avec les données de l'événement spécifié
        return view('evenements.show', compact('evenement'));
    }

/**
     * Supprime la ressource spécifiée de la base de données.
     */
    public function destroy(Evenement $evenement)
    {
        // Supprime l'événement spécifié de la base de données
        $evenement->delete();

        // Redirige vers la liste des événements avec un message de succès
        return redirect()->route('evenements.detailsEvenement')->with('success', 'Événement supprimé avec succès.');
    }
}
