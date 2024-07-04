<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Vérifie si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect('/login'); // Rediriger vers la page de connexion si non connecté
        }

        $user = Auth::user(); // Définir la variable $user

        // Vérifie si l'utilisateur a le rôle spécifié
        if (! $user->hasRole($role)) {
            // Gérer la redirection en fonction du rôle manquant
            if ($user->hasRole('admin')) {
                return redirect()->route('dashboardevenements.index');
            } elseif ($user->hasRole('organisme')) {
                return redirect()->route('dashboard');
            } elseif ($user->hasRole('utilisateur')) {
                return redirect('/');
            } else {
                abort(403, 'Unauthorized action.'); // Redirection par défaut pour les autres cas non gérés
            }
        }

        return $next($request);
    }
}
