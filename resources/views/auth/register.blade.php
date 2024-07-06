<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}" class="custom-form">
                    @csrf
                    <h1 class="titre1">Inscription sur <span class="my">My</span><span class="event">Event</span></h1>

                    <!-- Name -->
                    <div class="mb-3 custom-form-group">
                        <x-input-label for="name" :value="__('Nom')" class="custom-label"/>
                        <x-text-input id="name" class="block mt-1 w-full custom-input" type="text" name="name" :value="old('name')" placeholder="Entrez votre nom"  autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3 custom-form-group">
                        <x-input-label for="email" :value="__('Email')" class="custom-label"/>
                        <x-text-input id="email" class="block mt-1 w-full custom-input" type="email" name="email" :value="old('email')" placeholder="Entrez votre adresse email"  autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3 custom-form-group">
                        <x-input-label for="password" :value="__('Mot de passe')" class="custom-label"/>
                        <x-text-input id="password" class="block mt-1 w-full custom-input" type="password" name="password" placeholder="Entrez votre mot de passe"  autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3 custom-form-group">
                        <x-input-label for="password_confirmation" :value="__('Confirmer Mot de passe')" class="custom-label"/>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full custom-input" type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe"  autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-center">
                        <x-primary-button class="ms-3 custom-button">
                            {{ __('S\'inscrire') }}
                        </x-primary-button>
                    </div>

                    <div class="my-4 d-flex justify-content-between">
                        <p class="text-lg font-semibold">Déjà inscrit?</p>
                        <p><a href="{{ route('login') }}" class="text-blue-500 hover:underline">Connexion</a></p>
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="{{ asset('images/formimage.png') }}" alt="Form Image" class="img-fluid">
            </div>
        </div>
    </div>
</x-guest-layout>
