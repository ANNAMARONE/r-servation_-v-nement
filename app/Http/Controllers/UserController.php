<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;


use App\Models\User; // Importe le modèle User depuis le namespace App\Models
use Illuminate\Http\Request; // Importe la classe Request depuis le namespace Illuminate\Http

class UserController extends Controller // Définit la classe UserController qui étend Controller
{
    // public function index() // Définit la méthode index pour afficher tous les utilisateurs
    // {
    //     $users = User::all(); // Récupère tous les utilisateurs depuis la base de données
    //     return view('users.index', compact('users')); // Retourne la vue 'users.index' avec les utilisateurs
    // }

    public function index()
{
    // Récupère les utilisateurs qui n'ont pas les rôles 'admin' ou 'organisme'
    $users = User::whereDoesntHave('roles', function($query) {
        $query->whereIn('name', ['admin', 'organisme']);
    })->get();

    return view('users.index', compact('users')); // Retourne la vue 'users.index' avec les utilisateurs
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'address' => 'nullable|string',
    ]);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
    ]);

    // Assign the role 'utilisateur' to the user
    $user->assignRole('utilisateur');

    return redirect('/')->with('success', 'User created successfully.');
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
