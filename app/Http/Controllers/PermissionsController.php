<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions=Permission::all();
        return view('gestion_utilisateurs.index',compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('gestion_utilisateurs.ajouter_permission');
    }

    /**
     * Store a newly created resource in storage.
     */
 
        public function store(Request $request)
        {
            try{
                $validatedData = $request->validate([
                    'name' => ['required', 'string', 'unique:permissions,name']
                ], [
                    'name.unique' => 'Ce nom de permission est déjà utilisé.'
                ]);
            
                // Création d'une nouvelle permission avec les données validées
                Permission::create([
                    "name" => $validatedData['name']
                ]);
            
                // Redirection vers la vue index avec un message de succès
                return redirect()->route('permissions.index')
                                 ->with('success', 'Permission ajoutée avec succès');
            }
            catch (\Exception $e) {
                // Gestion des erreurs
                return redirect()->back()
                                 ->with('error', 'Une erreur est survenue lors de l\'ajout de la permission : ' . $e->getMessage());
            }
        }
           
           
        


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       $permission=Permission::find($id);
       return view('gestion_utilisateurs.modification',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }
        //
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission=Permission::find($id);
        $permission->delete();
        //
        return redirect()->back()
                                 ->with('success', 'suppression réussi avec succés :');
            
    }
}
