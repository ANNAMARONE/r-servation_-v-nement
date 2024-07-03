@extends('layouts.header')

@section('title', 'Mes reservations')

@section('content')
    <div class="container">
        <h1>Mes Réservations</h1>
    <div class="row">
        @foreach ($reservations as $reservation)
            <div class="col-md-12 mb-4" style=" margin: auto;">
                <div class="row card">
                    <div class="col-md-6 card-image">
                        <img src="{{ asset('images/star.jpg') }}" alt="" class="star">
                        <img src="{{ $reservation->evenement->image }}" 
                            alt="{{ $reservation->evenement->nom_evenement }}" class="image">
                    </div>
                    <div class="col-md-6 card-body">
                        <h3 class="card-title">{{ $reservation->evenement->nom_evenement }}</h3>
                        <p class="card-text">{{ $reservation->evenement->description }}</p>
                        
                        <div class="date_lieu">
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-calendar-alt"></i></span>
                                <strong>Date : </strong>
                                {{ \Carbon\Carbon::parse($reservation->evenement->date)->format('d-m-Y') }}
                            </p>
                            <p class="info-item lieu">
                                <span class="icon-circle"><i class="fas fa-map-marker-alt"></i></span>
                                <strong>Lieu : </strong> {{ $reservation->evenement->lieu }}
                            </p>
                        </div>

                        <div class="date_lieu">
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-users"></i></span>
                                <strong>Places :</strong>{{ $reservation->evenement->nbr_place }}
                            </p>
                            <p class="info-item">
                                <span class="icon-circle"><i class="fas fa-calendar-times"></i></span>
                                <strong>Date limite :</strong>
                                {{ \Carbon\Carbon::parse($reservation->evenement->date_limite)->format('d-m-Y') }}
                            </p>
                        </div>

                        <p class="card-text"><strong>Statut :</strong>
                            @if ($reservation->statut == 'accepter')
                                <span class="badge badge-success">{{ ucfirst($reservation->statut) }}</span>
                            @elseif($reservation->statut == 'rejeter')
                                <span class="badge badge-danger">{{ ucfirst($reservation->statut) }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $reservations->links() }}
    </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/mes_reservations.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection
