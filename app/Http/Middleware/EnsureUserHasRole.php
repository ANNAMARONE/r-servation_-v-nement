<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    public function handle($request, Closure $next, $role)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            // Stocker l'URL de retour dans la session
            session(['redirectUrl' => $request->fullUrl()]);
            // Redirection vers la page de connexion
            return redirect()->guest('/login');
        }

        $user = Auth::user();

        // Vérifier si l'utilisateur a le rôle spécifié
        if (!$user->hasRole($role)) {
            // Gérer la redirection en fonction du rôle manquant
            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard_admin');
            } elseif ($user->hasRole('organisme')) {
                return redirect()->route('dashboard');
            } elseif ($user->hasRole('utilisateur')) {
                // Vérifier s'il y a une URL de redirection enregistrée
                $redirectUrl = session('redirectUrl');
                if ($redirectUrl) {
                    return redirect()->intended($redirectUrl); // Rediriger vers l'URL d'origine
                }
                return redirect()->route('home'); // Rediriger vers la page d'accueil par défaut
            } else {
                abort(403, 'Unauthorized action.');
            }
        }

        return $next($request);
    }
}