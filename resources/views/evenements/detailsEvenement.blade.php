
{{-- @extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content') --}}








    <h1>Liste des événements</h1>
    <!-- Lien pour créer un nouvel événement -->
    <a href="{{ route('evenements.create') }}">Créer un nouvel événement</a>

    <!-- Affichage du message de succès s'il existe -->
    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif
<table>
        <thead>
            <tr>
               
               <div class="carte1">
                <th>Image</th>
                <th>Description</th>
               </div>

               <div class="carte2">
                <th>Nom</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Date limite</th>
               </div>
                {{-- <th>Nombre de places</th>
                <th>ID</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evenements as $evenement)
            <tr>
                <div class="carte1">
                    <td>
                        <!-- Affichage de l'image -->
                        <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" width="100">
                    </td>
                    <td>{{ $evenement->description }}</td>
                </div>
                
                    
                    <div class="carte2">
                        <td>{{ $evenement->nom_evenement }}</td>
                    <td>{{ $evenement->date }}</td>
                    <td>{{ $evenement->lieu }}</td>
                   <td>{{ $evenement->date_limite }}</td>
                    </div>

                   {{-- <td>{{ $evenement->nbr_place }}</td>
                   <td>{{ $evenement->id }}</td> --}}
                    
                    
                    <td>
                    <!-- Formulaire pour supprimer l'événement -->
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    
    







    {{-- @endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection --}}

