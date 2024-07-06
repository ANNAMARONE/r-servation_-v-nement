<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('login') }}" class="custom-form">
                    @csrf
                    <h1 class="titre1">Bienvenue sur <span class="my">My</span><span class="event">Event</span></h1>

                    <!-- Email Address -->
                    <div class="mb-3 custom-form-group">
                        <x-input-label for="email" :value="__('Email')" class="custom-label"/>
                        <x-text-input id="email" class="block mt-1 w-full custom-input" type="email" name="email"  placeholder="Entrez votre adresse email"  :value="old('email')"  autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3 custom-form-group">
                        <x-input-label for="password" :value="__('Mot de passe')" class="custom-label"/>
                        <x-text-input id="password" class="block mt-1 w-full custom-input" type="password" name="password"   placeholder="Entrez votre mot de passe"  autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __(' Souvenir de moi') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center">
                        <x-primary-button class="ms-3 custom-button">
                            {{ __('Connexion') }}
                        </x-primary-button>
                    </div>
                    
                    <div class="my-4 d-flex justify-content-between align-items-center">
                        <p class="text-lg font-semibold">Vous êtes nouveau?</p>
                        <p><a href="{{ route('register') }}" class="text-blue-500 hover:underline">S'inscrire</a></p>
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="{{ asset('images/formimage.png') }}" alt="Form Image" class="img-fluid">
            </div>
        </div>
    </div>
</x-guest-layout>
