<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisme;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\OrganismeRequest;
use App\Http\Requests\StoreOrganismeRequest;

class OrganismeController extends Controller
{
    public function create_organisme()
    {
        return view('organismes.register_organisme');
    }

    public function storeOrganisme(OrganismeRequest $request)
    {
        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Gérer le téléchargement du logo
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
        }

        // Créer l'organisme
        $organisme=Organisme::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'secteur_activité' => $request->secteur_activité,
            'logo' => $logoPath,
            'nina' => $request->nina,
        ]);
        dump($organisme);

        // Assigner le rôle à l'utilisateur
        $user->assignRole($request->roles);

        // Déclencher l'événement Registered
        event(new Registered($user));
return redirect('/','compt créer avec succé');
        // Rediriger avec un message de succès
    }
}
