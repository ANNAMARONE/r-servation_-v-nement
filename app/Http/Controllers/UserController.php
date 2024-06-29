<?php

namespace App\Http\Controllers;

use App\Models\User; // Importe le modèle User depuis le namespace App\Models
use Illuminate\Http\Request; // Importe la classe Request depuis le namespace Illuminate\Http

class UserController extends Controller // Définit la classe UserController qui étend Controller
{
    public function index() // Définit la méthode index pour afficher tous les utilisateurs
    {
        $users = User::all(); // Récupère tous les utilisateurs depuis la base de données
        return view('users.index', compact('users')); // Retourne la vue 'users.index' avec les utilisateurs
    }

    public function store(Request $request) // Définit la méthode store pour créer un nouvel utilisateur
    {
        $request->validate([ // Valide les données du formulaire avec les règles spécifiées
            'name' => 'required', // Le champ 'name' est requis
            'email' => 'required|email|unique:users,email', // Le champ 'email' est requis, doit être une adresse email valide et unique dans la table 'users'
            'address' => 'nullable|string', // Le champ 'address' peut être nullable (optionnel), mais s'il est rempli, il doit être de type string
        ]);

        User::create([ // Crée un nouvel utilisateur dans la base de données avec les données validées
            'name' => $request->name, // Assignation du champ 'name' depuis la requête
            'email' => $request->email, // Assignation du champ 'email' depuis la requête
            'address' => $request->address, // Assignation du champ 'address' depuis la requête
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.'); // Redirige vers la route 'users.index' avec un message de succès en session
    }

    public function destroy(User $user) // Définit la méthode destroy pour supprimer un utilisateur spécifique
    {
        $user->delete(); // Supprime l'utilisateur spécifié depuis la base de données

        return redirect()->route('users.index')->with('success', 'User deleted successfully.'); // Redirige vers la route 'users.index' avec un message de succès en session
    }

    public function create() // Définit la méthode create pour afficher le formulaire de création d'utilisateur
    {
        return view('users.create'); // Retourne la vue 'users.create' pour afficher le formulaire de création d'utilisateur
    }

    public function show(User $user) // Définit la méthode show pour afficher les détails d'un utilisateur spécifique
    {
        return view('users.show', compact('user')); // Retourne la vue 'users.show' avec l'utilisateur spécifique
    }
}
