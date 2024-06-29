{{-- @extends('layouts.header')

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
@endsection --}}
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
                    <p> <i class="fas fa-map-marker-alt"></i> {{ $evenement->lieu }}</p>
                </div>
                <div class="icons">
                    <a href="#" data-toggle="modal" data-target="#eventModal-{{ $evenement->id }}">
                        <i class="fas fa-info-circle"></i> 
                    </a>
                    <a href="{{ route('reservation.create', $evenement->id) }}">
                        <i class="fas fa-calendar-check"></i> 
                    </a>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="eventModal-{{ $evenement->id }}" tabindex="-1" aria-labelledby="eventModalLabel-{{ $evenement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel-{{ $evenement->id }}">{{ $evenement->nom_evenement }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <!-- Colonne gauche : Image -->
                                <div class="col-md-6">
                                    <img src="{{ $evenement->image }}" class="img-fluid" alt="{{ $evenement->nom_evenement }}">
                                </div>
                                <!-- Colonne droite : Détails -->
                                <div class="col-md-6">
                                    <p><strong>Titre</strong> {{ $evenement->nom_evenement }}</p>
                                    <p><strong>Description :</strong> {{ $evenement->description}}</p>
                                    <p><strong>Date :</strong> <i class="fas fa-calendar-alt"></i> {{ $evenement->date }}</p>
                                    <p><strong>Lieu :</strong> <i class="fas fa-map-marker-alt"></i> {{ $evenement->lieu }}</p>
                                    <p><strong>Nombre de places :</strong> {{ $evenement->nbr_place }}</p>
                                    <p><strong>Date limite :</strong> {{ $evenement->date_limite }}</p>
                                    <a href="{{ route('reservation.create', $evenement->id) }}" class="btn btn-primary">Réserver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/listeEvenementsUser.css') }}">
@endsection

@section('scripts')
    <!-- Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
