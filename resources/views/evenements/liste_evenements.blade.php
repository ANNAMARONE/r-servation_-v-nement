@extends('layouts.header')

@section('title', 'Liste des événements')

@section('content')
    <div class="banner">
        <img src="{{ asset('images/evenement.png') }}" alt="banner">
    </div>
    <div class="container">
        <h1>Listes des événements</h1>
        <!-- boucle sur tous les événements -->
        @foreach ($evenements as $evenement)
            <div class="card">
                <img src="{{ asset('images/star.jpg') }}" alt="" class="star">
                <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" class="image">
                <h2>{{ $evenement->nom_evenement }}</h2>
                <div class="row">
                    <p> <i class="fas fa-calendar-alt "></i> {{ $evenement->date }}</p>
                    <p> <i class="fas fa-map "></i> {{ $evenement->lieu }}</p>

                </div>
                <div class="icons">
                    <a href="#">
                        <i class="fas fa-info-circle"></i> 
                    </a>
                    <a href="#">
                        <i class="fas fa-calendar-check"></i> 
                    </a>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/listeEvenementsUser.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection
