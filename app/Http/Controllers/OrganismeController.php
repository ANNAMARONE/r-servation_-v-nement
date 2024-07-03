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
    $organismes = Organisme::with('user')->get();
    $users = User::role('Organismes')->get();
    return view('admins.ListeOrganisme',compact('organismes','users'));
}
public function SuprimerOrganisme($organisme){
    $users=User::find($organisme);
    $users->delete();
    return redirect()->back();
}
public function detailOrganisme($organisme){
    $organisme=Organisme::find($organisme);
    return view('admins.detailOrganisme',compact('organisme'));
}
public function accepter($id)
    {
        $candidature = Organisme::findOrFail($id);
        $candidature->statut = 'valider';
        $candidature->save();
        return redirect('/listeorganismes')->with('message', 'Candidature acceptée et email envoyé.');
    }

    public function rejeter($id)
    {
        $candidature = Organisme::findOrFail($id);
        $candidature->statut = 'bloquer';
        $candidature->save();
        return redirect('/listeorganismes')->with('message', 'Candidature rejetée et email envoyé.');
    }

}
