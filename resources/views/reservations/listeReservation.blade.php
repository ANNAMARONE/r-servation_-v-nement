@extends('layouts.app')

@section('title', 'Liste des Evénements')

@section('content')
    <h1 class="mt-4">La liste des Réservations</h1>

    <div class="contenu">
        <div class="tables">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom Utilisateur</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Date de Réservation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->user->nom_utilisateur }}</td>
                                <td>{{ $reservation->user->email }}</td>
                                <td>{{ $reservation->user->telephone }}</td>
                                <td>{{ $reservation->created_at }}</td>
                                <td>
                                    <!-- Actions d'acceptation et de rejet -->
                                    <a href="#" class="btn btn-sm btn-success" title="Accepter">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Rejeter">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
            {{ $reservations->links() }} 

        </div>
    </div>
    
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/listeRervation.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection