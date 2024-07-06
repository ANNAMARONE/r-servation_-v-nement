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
            'nom_evenement' => 'required|string|max:255',
            'description' => 'required|string|max:1000', // Limite la description à 1000 caractères maximum
            'date' => 'required|date|after_or_equal:today',
            'date_limite' => 'required|date|after_or_equal:date',
            'lieu' => 'required|string|max:255',
            'nbr_place' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'nom_evenement.required' => 'Le nom de l\'événement est obligatoire.',
            'nom_evenement.max' => 'Le nom de l\'événement ne peut pas dépasser 255 caractères.',
            'description.required' => 'La description de l\'événement est obligatoire.',
            'description.max' => 'La description de l\'événement ne peut pas dépasser 1000 caractères.',
            'date.required' => 'La date de l\'événement est obligatoire.',
            'date_limite.required' => 'La date limite d\'inscription est obligatoire.',
            'date.after_or_equal' => 'La date de l\'événement doit être égale ou après aujourd\'hui.',
        'date_limite.after_or_equal' => 'La date limite d\'inscription doit être égale ou après aujourd\'hui.',
            'lieu.required' => 'Le lieu de l\'événement est obligatoire.',
            'nbr_place.required' => 'Le nombre de places est obligatoire.',
            'nbr_place.integer' => 'Le nombre de places doit être un nombre entier.',
            'nbr_place.min' => 'Le nombre de places doit être d\'au moins :min.',
            'image.max' => 'Le fichier image ne peut pas dépasser 2048 Ko.',
            'image.mimes' => 'Le fichier image doit être de type :values.',
        ];
    }
}
