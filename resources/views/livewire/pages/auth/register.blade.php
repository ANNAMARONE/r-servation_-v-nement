
<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);
    event(new Registered($user = User::create($validated)));
    $user->assignRole('utilisateur');

    Auth::login($user);

    $this->redirect(route('home', absolute: false), navigate: true);
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Document</title>
</head>
<body>
<div class="compte">

    <form wire:submit="register">
        <!-- Name -->
        <h1 class="titre1">Bienvenue sur <span class="my">My</span><span class="event">Event</span></h1> 
        <div>
            <x-input-label class="registelabel" for="name" :value="__('Nom')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" id="registeinput"  type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="registelabel" for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" id="registeinput" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="registelabel" for="password" :value="__('Mot de passe')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password" id="registeinput"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="registelabel" for="password_confirmation" :value="__('Confirmer le mot de passe')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" id="registeinput"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <input type="hidden" id="role" name="role" value="utilisateur">

        <div class="mt-4">

            <button class="button">
                {{ __('Inscription') }}
            </button>
        </div>
        
            <div class="my-4" style="display: flex; align-items:center; justify-content:space-between;">
                <p class="text-lg font-semibold">Vous avez un compte?</p>
                <p><a href="{{ route('login') }}" class="text-blue-500 hover:underline">Connexion</a></p>
            </div>
    </form>
    <div>
            <img src="{{asset('images/formimage.png')}}" alt="">
        </div>
</div> 
 
</body>
</html>