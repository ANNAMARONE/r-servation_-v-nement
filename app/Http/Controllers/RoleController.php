<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $roles = Role::all();
        return view('gestion_roles.index', compact('roles'));
    }

    public function create()
    {
        return view('gestion_roles.création');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')->with('success', 'Rôle créer avec success.');
    }

    public function show(string $id)
    {

        
    }
    public function edit($id)
    {
        $role = Role::find($id);
        return view('gestion_roles.modifier', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')->with('success', 'modification du rôle avec success.');
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        }

        $protectedRoles = ['Administrateur','Utilisateur', 'Organismes'];

        if (in_array($role->name, $protectedRoles)) {
            return redirect()->route('roles.index')->with('error', 'Ce rôle ne peut pas être supprimé.');
        }

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rôle supprimé avec succès.');
    } 
        public function editPermissions($id)
        {
            $role = Role::find($id);
            $permissions = Permission::all();
            $rolePermissions = $role->permissions->pluck('name')->toArray();
    
            return view('gestion_roles.modifier_permission', compact('role', 'permissions', 'rolePermissions'));
        }
    
        public function updatePermissions(Request $request, $id)
        {
            $role = Role::find($id);
            $role->syncPermissions($request->permissions);
    
            return redirect()->route('roles.index', $role->id)->with('success', 'Autorisations mises à jour avec succès.');
        }
    }
    

