
@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
<div class="container mt-4">
    
    <div class="row">
        <!-- Widget 1 - Nombre d'événements -->
        <div class="col-md-4">
            <div class="card widget1">
                <div class="card-body">
                    <h5 class="card-title">Nombre d'événements</h5>
                    <p class="card-text">{{ $totalEvenements }}</p>
                </div>
            </div>
        </div>
    
        <!-- Widget 2 - Nombre de participants -->
        <div class="col-md-4 ">
            <div class="card widget2">
                <div class="card-body">
                    <h5 class="card-title">Nombre de participants</h5>
                    <p class="card-text">{{ $totalParticipants }}</p>
                </div>
            </div>
        </div>
    
        <!-- Widget 3 - Nombre de réservations -->
        <div class="col-md-4">
            <div class="card widget1">
                <div class="card-body">
                    <h5 class="card-title">Nombre de réservations</h5>
                    <p class="card-text">{{ $totalReservations }}</p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="contenu">
    <div class="tables">
        <h3 class="mt-2">Événements les plus populaires.</h3>
        <h5 class="mt-3">Événements les plus populaires.</h5>
        
        
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection

