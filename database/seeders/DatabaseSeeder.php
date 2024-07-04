<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Créer les rôles s'ils n'existent pas déjà
        if (!Role::where('name', 'admin')->exists()) {
            Role::create(['name' => 'admin']);
        }

        if (!Role::where('name', 'utilisateur')->exists()) {
            Role::create(['name' => 'utilisateur']);
        }
        
        if (!Role::where('name', 'organisme')->exists()) {
            Role::create(['name' => 'organisme']);
        }

        // Créer les permissions s'ils n'existent pas déjà
        if (!Permission::where('name', 'explorer les événements')->exists()) {
            Permission::create(['name' => 'explorer les événements']);
        }

        if (!Permission::where('name', 'réserver des événements')->exists()) {
            Permission::create(['name' => 'réserver des événements']);
        }

        if (!Permission::where('name', 'publier des événements')->exists()) {
            Permission::create(['name' => 'publier des événements']);
        }

        if (!Permission::where('name', 'modifier des événements')->exists()) {
            Permission::create(['name' => 'modifier des événements']);
        }

        if (!Permission::where('name', 'supprimer des événements')->exists()) {
            Permission::create(['name' => 'supprimer des événements']);
        }
        
        if (!Permission::where('name', 'annuler des réservations')->exists()) {
            Permission::create(['name' => 'annuler des réservations']);
        }

        if (!Permission::where('name', 'gérer les comptes')->exists()) {
            Permission::create(['name' => 'gérer les comptes']);
        }

        if (!Permission::where('name', 'gérer les roles')->exists()) {
            Permission::create(['name' => 'gérer les roles']);
        }

        if (!Permission::where('name', 'supprimer des utilisateurs')->exists()) {
            Permission::create(['name' => 'supprimer des utilisateurs']);
        }

        // Assigner les permissions aux rôles
        $utilisateurRole = Role::where('name', 'utilisateur')->first();
        $utilisateurRole->givePermissionTo(['explorer les événements', 'réserver des événements']);

        $organismeRole = Role::where('name', 'organisme')->first();
        $organismeRole->givePermissionTo(['publier des événements', 'modifier des événements', 'annuler des réservations', 'supprimer des événements']);

        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->givePermissionTo(['gérer les comptes', 'supprimer des utilisateurs', 'gérer les roles', 'supprimer des événements']);

       // Assigner le rôle par défaut aux nouveaux utilisateurs
       User::creating(function ($user) use ($utilisateurRole) {
        $user->assignRole($utilisateurRole);
    });
    }
}
