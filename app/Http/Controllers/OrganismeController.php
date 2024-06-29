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
    try {
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);     
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

     
        Organisme::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'secteur_activité' => $request->secteur_activité,
            'logo' => $logoPath,
            'nina' => $request->nina,
            
        ]);

        $user->assignRole($request->role);
        event(new Registered($user));

        return redirect('/')->with('success', 'Compte créé avec succès');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
    }
}
public function listeorganisme(){
    return view('admins.ListeOrganisme');
}
}
