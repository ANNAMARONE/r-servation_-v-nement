<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrganismeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et a le rôle d'administrateur
        if (Auth::check() && Auth::user()->hasRole('organisme')) {
            return $next($request);
        }

        // Redirection ou réponse en cas de non autorisation
        return back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
}
