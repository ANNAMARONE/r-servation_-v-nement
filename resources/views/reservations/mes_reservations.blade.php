@extends('layouts.header')

@section('title', 'Mes reservations')

@section('content')
<h1>Mes Réservations</h1>
<div class="row">
    @foreach($reservations as $reservation)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $reservation->evenement->image }}" class="card-img-top" alt="{{ $reservation->evenement->nom_evenement }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $reservation->evenement->nom_evenement }}</h5>
                    <p class="card-text">{{ $reservation->evenement->description }}</p>
                    <p class="card-text"><strong>Date :</strong> {{ $reservation->evenement->date }}</p>
                    <p class="card-text"><strong>Lieu :</strong> {{ $reservation->evenement->lieu }}</p>
                    <p class="card-text"><strong>Nombre de places :</strong> {{ $reservation->evenement->nbr_place }}</p>
                    <p class="card-text"><strong>Date limite :</strong> {{ $reservation->evenement->date_limite }}</p>
                    <p class="card-text"><strong>Statut :</strong>
                        @if($reservation->statut == 'accepter')
                            <span class="badge badge-success">{{ ucfirst($reservation->statut) }}</span>
                        @elseif($reservation->statut == 'rejeter')
                            <span class="badge badge-danger">{{ ucfirst($reservation->statut) }}</span>
                        @endif
                    </p>
                    <!-- Ajoutez d'autres détails de réservation si nécessaire -->
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

@section('styles')
    <!-- Vous pouvez ajouter des styles supplémentaires ici -->
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection