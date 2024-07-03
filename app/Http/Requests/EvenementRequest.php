<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvenementRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Autorise toutes les requêtes
    }

    /**
     * Obtient les règles de validation qui s'appliquent à la requête.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom_evenement' => 'required|string|max:255', // Le nom de l'événement est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'image' => 'nullable|string|max:255', // Le lien de l'image est optionnel, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'date' => 'required|date', // La date de l'événement est requise et doit être une date valide
            'lieu' => 'required|string|max:255', // Le lieu de l'événement est requis, doit être une chaîne de caractères et ne doit pas dépasser 255 caractères
            'description' => 'required', // La description de l'événement est requise
            'nbr_place' => 'required|integer', // Le nombre de places est requis et doit être un entier
            'date_limite' => 'required|date', // La date limite d'inscription est requise et doit être une date valide
        ];
    }

    /**
     * Obtient les messages d'erreur personnalisés pour les erreurs de validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom_evenement.required' => 'Le nom de l\'événement est obligatoire.', // Message d'erreur pour le champ nom_evenement requis
            'image.max' => 'Le lien de l\'image ne peut pas dépasser 255 caractères.', // Message d'erreur pour la longueur maximale de l'image
            'date.required' => 'La date de l\'événement est obligatoire.', // Message d'erreur pour le champ date requis
            'lieu.required' => 'Le lieu de l\'événement est obligatoire.', // Message d'erreur pour le champ lieu requis
            'description.required' => 'La description de l\'événement est obligatoire.', // Message d'erreur pour le champ description requis
            'nbr_place.required' => 'Le nombre de places est obligatoire.', // Message d'erreur pour le champ nbr_place requis
            'nbr_place.integer' => 'Le nombre de places doit être un nombre entier.', // Message d'erreur pour le champ nbr_place qui doit être un entier
            'date_limite.required' => 'La date limite d\'inscription est obligatoire.', // Message d'erreur pour le champ date_limite requis
        ];
    }
}

