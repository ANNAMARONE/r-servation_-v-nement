@extends('layouts.app')

@section('title', 'Liste des Evénements')

@section('content')
    <h1 class="mt-4">La liste des Événements</h1>

    <div class="bouton">
        <a href="{{ route('evenements.create') }}" class="btn">Ajouter un événement</a>
    </div>
    <div class="contenu">
        <div class="tables">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom de l'Événement</th>
                            <th>Lieu</th>
                            <th>Nombre de Places</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evenements as $evenement)
                            <tr>
                                <td>{{ $evenement->nom_evenement }}</td>
                                <td>{{ $evenement->lieu }}</td>
                                <td>{{ $evenement->nbr_place }}</td>
                                <td>{{ $evenement->date }}</td>
                                <td>
                                    <!-- Liens d'action avec des icônes -->
                                    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-sm btn-primary" title="Modifier"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('evenements.destroy', $evenement->id) }}" class="btn btn-sm btn-danger" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ?')"><i class="fas fa-trash-alt"></i></a>
                                    <a href="/reservations/liste" class="btn btn-sm btn-info" title="Voir les réservations"><i class="fas fa-list"></i></a>
                                    <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-sm btn-secondary" title="Voir les détails"><i class="fas fa-info-circle"></i></a>
                                </td>
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
<link rel="stylesheet" href="{{ asset('css/listeEvenement.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection