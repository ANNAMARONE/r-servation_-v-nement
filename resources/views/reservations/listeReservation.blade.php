
@extends('layouts.app')

@section('title', 'Liste des Réservations')

@section('content')
<div class="bouton">
    <a href="{{ route('evenements.index') }}" class="btn">Retour</a>
    <!-- Icône d'impression -->
    <button onclick="printReservations()" class="btn">
        <i class="fas fa-print"></i> Imprimer
    </button>
</div><br><br>

@if($reservations->isEmpty())
    <p>Aucune réservation disponible.</p>
@else
    @foreach($reservations->groupBy('evenement_id') as $evenement_id => $reservationsByEvenement)
        <h1 class="mt-4">La liste des Réservations pour {{ $reservationsByEvenement->first()->evenement->nom_evenement }}</h1>
        
        <div class="contenu">
            <div class="tables">
                <div class="table-responsive">
                    @if($reservationsByEvenement->isEmpty())
                        <p>Aucune réservation pour cet événement.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom de l'Utilisateur</th>
                                    <th class="d-none d-md-table-cell"> Email</th>
                                    <th class="d-none d-md-table-cell">Date de Réservation</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservationsByEvenement as $reservation)
                                    <tr>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td class="d-none d-md-table-cell">{{ $reservation->user->email }}</td>
                                        <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($reservation->created_at)->format('d-m-Y') }}</td>
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
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    {{ $reservations->links() }}
@endif

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/listeReservation.css') }}">
@endsection

@section('scripts')
<script>
    function printReservations() {
        window.print();
    }
</script>
@endsection
