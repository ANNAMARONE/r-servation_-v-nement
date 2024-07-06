@extends('layouts.app')

@section('title', 'Modifier un Événement')

@section('content')
<div class="bouton">
    <a href="{{ route('evenements.index') }}" class="btn">Retour</a>
</div>

<div class="custom-form-container">
    <div class="custom-form row">
        <!-- Colonne pour l'image -->
     
        <div class="col-md-8 formulaire">
            <h1>Modifier l'événement</h1>
            <form action="{{ route('evenements.update', $evenement->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nom_evenement">Nom de l'événement</label>
                    <input type="text" class="form-control" id="nom_evenement" name="nom_evenement" value="{{ $evenement->nom_evenement }}" required placeholder="Entrez le nom de l'événement">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $evenement->image }}" placeholder="URL de l'image">
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $evenement->date->format('Y-m-d\TH:i') }}" required placeholder="Sélectionnez la date et l'heure">
                </div>

                <div class="form-group">
                    <label for="date_limite">Date limite d'inscription</label>
                    <input type="datetime-local" class="form-control" id="date_limite" name="date_limite" value="{{ $evenement->date_limite->format('Y-m-d\TH:i') }}" required placeholder="Sélectionnez la date limite d'inscription">
                </div>

                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" value="{{ $evenement->lieu }}" required placeholder="Entrez le lieu">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required placeholder="Entrez la description de l'événement">{{ $evenement->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="nbr_place">Nombre de places</label>
                    <input type="number" class="form-control" id="nbr_place" name="nbr_place" value="{{ $evenement->nbr_place }}" required placeholder="Entrez le nombre de places">
                </div>

                <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('scripts')
<!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection
