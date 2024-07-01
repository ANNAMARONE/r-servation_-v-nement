@extends('layouts.app')

@section('title', 'Tableau de bord')



<div class="container">
    <h1>Liste des événements</h1>
    <!-- Lien pour créer un nouvel événement -->
    <a href="{{ route('evenements.create') }}" class="btn btn-primary mb-3">Créer un nouvel événement</a>

    <div class="row">
        @foreach ($evenements as $evenement)
            <div class="col-md-6 mb-4">
                <div class="card">
                    
                    <img src="{{ $evenement->image }}" class="card-img-top" alt="{{ $evenement->nom_evenement }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $evenement->nom_evenement }}</h5>
                        <p class="card-text">{{ $evenement->description }}</p>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Date:</strong> {{ $evenement->date }}</li>
                        <li class="list-group-item"><strong>Lieu:</strong> {{ $evenement->lieu }}</li>
                        <li class="list-group-item"><strong>Date limite:</strong> {{ $evenement->date_limite }}</li>
                    </ul>
                    <div class="card-body">
                        <!-- Formulaire pour supprimer l'événement -->
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

 {{-- @section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection --}}



























