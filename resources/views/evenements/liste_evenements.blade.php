@extends('layouts.header')

@section('title', 'Liste des événements')

@section('content')
    <div class="banner">
        <img src="{{ asset('images/evenement.png') }}" alt="banner">
    </div>
    <div class="container">
        <h1>Listes des événements</h1>
        <!-- boucle sur tous les événements -->
        <div class="row">
            @foreach ($evenements as $evenement)
            <div class="col-md-6 mb-4"> 
                <div class="card">
                    <img src="{{ asset('images/star.jpg') }}" alt="" class="star">
                    <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" class="image">
                    <h2>{{ $evenement->nom_evenement }}</h2>
                    <div class="row">
                        <p>
                            <i class="fas fa-calendar-alt"></i> :
                            {{ \Carbon\Carbon::parse($evenement->date)->format('d-m-Y') }}
                        </p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i> :
                            {{ $evenement->lieu }}
                        </p>
                    </div>
                    <div class="icons">
                        <a href="#" data-toggle="modal" data-target="#eventModal-{{ $evenement->id }}">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#reservationModal-{{ $evenement->id }}">
                            <i class="fas fa-calendar-check"></i>
                        </a>
                    </div>
                </div>
            </div>
       
        

            <!-- Modal d'informations -->
            <div class="modal fade informations" id="eventModal-{{ $evenement->id }}" tabindex="-1"
                aria-labelledby="eventModalLabel-{{ $evenement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel-{{ $evenement->id }}">
                                {{ $evenement->nom_evenement }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/star.jpg') }}" alt="" class="star">
                                    <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}"
                                        class="image">
                                </div>
                                <div class="col-md-6">
                                    <h2>{{ $evenement->nom_evenement }}</h2>
                                    <p>{{ $evenement->description }}</p>
                                    <div class="date_lieu">
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-calendar-alt"></i></span>
                                            <strong>Date : </strong>
                                            {{ \Carbon\Carbon::parse($evenement->date)->format('d-m-Y') }}
                                        </p>
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-map-marker-alt"></i></span>
                                            <strong>Lieu : </strong> {{ $evenement->lieu }}
                                        </p>
                                    </div>
                                    <div class="date_lieu">
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-users"></i></span>
                                            <strong>Nombre de places :</strong> <br>{{ $evenement->nbr_place }}
                                        </p>
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-calendar-times"></i></span>
                                            <strong>Date limite :</strong>
                                            <br>{{ \Carbon\Carbon::parse($evenement->date_limite)->format('d-m-Y') }}
                                        </p>
                                    </div>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-reserver"
                                            data-evenement-id="{{ $evenement->id }}">Réserver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal de confirmation de réservation -->
            <div class="modal fade reservation" id="reservationModal-{{ $evenement->id }}" tabindex="-1"
                aria-labelledby="reservationModalLabel-{{ $evenement->id }}" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservationModalLabel-{{ $evenement->id }}">Confirmation de
                                réservation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="stars">
                                    <img src="{{ asset('images/star2.jpg') }}" alt="" class="star2">
                                    <img src="{{ asset('images/star1.jpg') }}" alt="" class="star1">
                                </div>
                                <div class="container">
                                    <h1>Valider votre Réservation</h1><br>
                                    <h3>{{ $evenement->nom_evenement }}</h3>
                                    <div class="date_lieu">
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-calendar-alt"></i></span>
                                            <strong>Date :</strong>
                                            {{ \Carbon\Carbon::parse($evenement->date)->format('d-m-Y') }}
                                        </p>
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-map-marker-alt"></i></span>
                                            <strong>Lieu :</strong> {{ $evenement->lieu }}
                                        </p>
                                    </div>
                                    <div class="date_lieu">
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-users"></i></span>
                                            <strong>Places restantes :</strong>
                                            {{ $evenement->nbr_place - $evenement->reservations()->count() }}
                                        </p>
                                        <p class="info-item">
                                            <span class="icon-circle"><i class="fas fa-calendar-times"></i></span>
                                            <strong>Date limite :</strong>
                                            {{ \Carbon\Carbon::parse($evenement->date_limite)->format('d-m-Y') }}
                                        </p>
                                    </div>
                                </div>
                                <form action="{{ route('reservation.store', $evenement->id) }}" method="POST">
                                    @csrf
                                    <div class="boutons">
                                        <button type="button" class="btn btn-annuler"
                                            data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-valider">Valider</button>
                                    </div>
                                </form>
                                <div class="stars_end">
                                    <img src="{{ asset('images/star2.jpg') }}" alt="" class="star1">
                                    <img src="{{ asset('images/star1.jpg') }}" alt="" class="star2">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <!-- Modal de félicitations -->
        <div class="modal fade" id="congratsModal" tabindex="-1" aria-labelledby="congratsModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="congratsModalLabel">Félicitations !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="row">

                            <div class="stars">
                                <img src="{{ asset('images/star2.jpg') }}" alt="" class="star2">
                                <img src="{{ asset('images/star1.jpg') }}" alt="" class="star1">
                            </div>

                            <div class="container">
                                <h1 class="text-center">Félicitations <i class="fas fa-party"></i> <i
                                        class="fas fa-glass-cheers"></i><i class="fas fa-glass-cheers"></i>
                                </h1><br>
                                <h3>Votre réservation a bien été prise en compte</h3>
                                <h3>Veuillez vérifier votre adresse email pour la confirmation de la réservation.</h3>
                            </div>
                            <div class="stars_end">
                                <img src="{{ asset('images/star2.jpg') }}" alt="" class="star1">
                                <img src="{{ asset('images/star1.jpg') }}" alt="" class="star2">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $evenements->links() }}
        </div>
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

    <script>
        $(document).ready(function() {
            $('.btn-reserver').click(function() {
                var evenementId = $(this).data('evenement-id');
                $('#eventModal-' + evenementId).modal('hide');
                setTimeout(function() {
                    $('#reservationModal-' + evenementId).modal('show');
                }, 500); // Attente pour que le premier modal se ferme
            });

            $('.btn-annuler').click(function() {
                window.location.href = '{{ url('liste/evenements') }}';
            });

            @if (session('reservation_success'))
                $('#congratsModal').modal('show');
            @endif
        });
    </script>
@endsection
