<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(route('home', absolute: false));
    // }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Récupérer l'utilisateur actuellement authentifié
        $user = auth()->user();

        // Vérifier si l'utilisateur a le rôle spécifié
        if ($user->hasRole('admin')) {
            return redirect()->route('dashboard_admin');
        } elseif ($user->hasRole('organisme')) {
            return redirect()->route('dashboard_organisme');
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

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
