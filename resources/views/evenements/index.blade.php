
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
                            <th>Nom </th>
                            <th class="d-none d-md-table-cell">Lieu</th>
                            <th class="d-none d-md-table-cell">Nombre de Places</th>
                            <th class="d-none d-md-table-cell">Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evenements as $evenement)
                            <tr>
                                <td>{{ $evenement->nom_evenement }}</td>
                                <td class="d-none d-md-table-cell">{{ $evenement->lieu }}</td>
                                <td class="d-none d-md-table-cell">{{ $evenement->nbr_place }}</td>
                                <td class="d-none d-md-table-cell"> {{ \Carbon\Carbon::parse($evenement->date)->format('d-m-Y') }}</td>
                                <td class="icons">
                                    <!-- Liens d'action avec des icônes -->
                                    <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-sm" title="Voir les détails"><i class="material-icons">visibility</i></a>
                                    <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-sm " title="Modifier"><i class="material-icons">edit</i></a>
                                    <a href="/reservations/liste/{{$evenement->id}}" class="btn btn-sm " title="Voir les réservations"><i class="material-icons">event_seat</i></a>
                                    <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm " title="Supprimer">
                                            <i class="material-icons" >delete</i>
                                        </button>
                                    </form> 
                                   
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
