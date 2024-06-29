<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganismeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'description' => 'required|string|max:1000',
            'adresse' => 'required|string|max:255',
           'logo' => 'required|image|mimes:png,jpg|max:20480', // max is in kilobytes
            'secteur_activité' => 'required|string|max:255',
            'nina' => 'required|string|max:20',
            'roles' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.required' => 'L\'email est obligatoire.',
            'email.string' => 'L\'email doit être une chaîne de caractères.',
            'email.email' => 'L\'email doit être une adresse email valide.',
            'email.max' => 'L\'email ne peut pas dépasser 255 caractères.',
            'email.unique' => 'L\'email a déjà été pris.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',

            'description.required' => 'La description est obligatoire.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne peut pas dépasser 255 caractères.',
            'logo.image' => 'Le logo doit être une image.',
            'logo.mimes' => 'Le logo doit être un fichier de type: jpeg, png, jpg, gif.',
            'logo.max' => 'Le logo ne peut pas dépasser 2 Mo.',
            'adresse.required' => 'L\'adresse est obligatoire.',
            'adresse.string' => 'L\'adresse doit être une chaîne de caractères.',
            'adresse.max' => 'L\'adresse ne peut pas dépasser 255 caractères.',
            'secteur_activité.required' => 'Le secteur d\'activité est obligatoire.',
            'secteur_activité.string' => 'Le secteur d\'activité doit être une chaîne de caractères.',
            'secteur_activité.max' => 'Le secteur d\'activité ne peut pas dépasser 255 caractères.',
            'nina.required' => 'Le NINA est obligatoire.',
            'nina.string' => 'Le NINA doit être une chaîne de caractères.',
            'nina.max' => 'Le NINA ne peut pas dépasser 20 caractères.',
            'user_id.required' => 'L\'ID utilisateur est obligatoire.',
            'user_id.exists' => 'L\'ID utilisateur doit exister dans la table des utilisateurs.',
        ];
    }
}
