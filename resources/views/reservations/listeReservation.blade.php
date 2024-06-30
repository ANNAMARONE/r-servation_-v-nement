{{-- @extends('layouts.app')

@section('title', 'Liste des Evénements')

@section('content')
   
    @foreach($reservations->groupBy('evenement_id') as $evenement_id => $reservationsByEvenement)
    <h1 class="mt-4">La liste des Réservations pour {{ $reservationsByEvenement->first()->evenement->nom_evenement }}</h1>

    <div class="contenu">
        <div class="tables">
            <div class="table-responsive">
                
      
        <table class="table">
            <thead>
                <tr>
                    <th>Nom de l'Utilisateur</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date de Réservation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservationsByEvenement as $reservation)
                    <tr>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->user->email }}</td>
                        <td>{{ $reservation->user->telephone }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>
                            <!-- Actions d'acceptation et de rejet -->
                            
                            <a href="#" class="btn btn-sm btn-danger" title="Rejeter">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

            {{ $reservations->links() }} 

        </div>
    </div>
    
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/listeRervation.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection --}}@extends('layouts.app')

@section('title', 'Liste des Réservations')

@section('content')

@foreach($reservations->groupBy('evenement_id') as $evenement_id => $reservationsByEvenement)
    <h1 class="mt-4">La liste des Réservations pour {{ $reservationsByEvenement->first()->evenement->nom_evenement }}</h1>

    <div class="contenu">
        <div class="tables">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom de l'Utilisateur</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date de Réservation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservationsByEvenement as $reservation)
                            <tr>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ $reservation->user->email }}</td>
                                <td>{{ $reservation->user->telephone }}</td>
                                <td>{{ $reservation->created_at }}</td>
                                <td>{{ ucfirst($reservation->statut) }}</td>
                                <td>
                                    <!-- Formulaire pour rejeter la réservation -->
                                    @if($reservation->statut == 'accepter')
                                        <form action="{{ route('reservations.reject', ['id' => $reservation->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT') <!-- Utilisation de la méthode PUT -->
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir rejeter cette réservation ?');" title="Rejeter">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach

{{ $reservations->links() }}

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/listeRervation.css') }}">
@endsection
