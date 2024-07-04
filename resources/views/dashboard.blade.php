
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
                        <p class="card-text d-flex align-items-center justify-content-center" >
                            <i class="material-icons">event</i> 
                            <span>{{ $totalEvenements }}</span>
                        </p>
                        
                    </div>
                </div>
            </div>
        
            <!-- Widget 2 - Nombre de participants -->
            <div class="col-md-4 ">
                <div class="card widget2">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de participants</h5>
                        <p class="card-text d-flex align-items-center justify-content-center" >
                            <i class="fas fa-users "></i>
                            <span>{{ $totalParticipants }}</span>
                        </p>
                    </div>
                </div>
            </div>
        
            <!-- Widget 3 - Nombre de réservations -->
            <div class="col-md-4">
                <div class="card widget1">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de réservations</h5>
                        <p class="card-text d-flex align-items-center justify-content-center" >
                            <i class="material-icons">event_seat</i>
                            <span>{{ $totalReservations }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="contenu">
        <div class="tables">
            <h3 class="mt-2">Listes Événements récents</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Nombre de Places</th>
                            <th>Date</th>
                            <th>Lieu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evenements as $evenement)
                            <tr>
                                <td><img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" ></td>
                                <td>{{ $evenement->nom_evenement }}</td>
                                <td>{{ $evenement->nbr_place }}</td>
                                <td>{{ $evenement->date }}</td>
                                <td>{{ $evenement->lieu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $evenements->links() }} 

        </div>
    </div>
    @endsection
    
    @section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endsection
    
    @section('scripts')
        <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
    @endsection

