<!-- resources/views/evenements/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $evenement->nom_evenement }}</div>
            <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" width="300">

            <div class="card-body">
                <p><strong>Description:</strong> {{ $evenement->description }}</p>
                <p><strong>Date:</strong> {{ $evenement->date }}</p>
                <p><strong>Lieu:</strong> {{ $evenement->lieu }}</p>
                <p><strong>Date limite d'inscription:</strong> {{ $evenement->date_limite }}</p>

                {{-- <a href="{{ route('dashboardevenements.edit', $evenement->id) }}" class="btn btn-primary">Modifier</a> --}}

                <form action="{{ route('dashboardevenements.destroy', $evenement->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection


