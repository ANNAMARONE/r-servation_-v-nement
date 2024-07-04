@extends('layouts.app')

@section('title', 'Ajout Evénement')

@section('content')
<div class="bouton">
    <a href="{{ route('evenements.index') }}" class="btn">Retour</a>
</div>
<div class="custom-form-container">
    <div class="custom-form row">
        <!-- Colonne pour l'image -->
        <div class="col-md-6">
            <img src="{{ asset('images/ajouterform.jpg') }}" alt="image bi" class="img-fluid">
        </div>
        <!-- Colonne pour le formulaire -->
        <div class="col-md-6 formulaire">
            <h1>Créer un événement</h1>
            <form action="{{ route('evenements.store') }}" method="POST">
                @csrf
                 
                <div class="form-group">
                    <label for="nom_evenement">Nom de l'événement</label>
                    <input type="text" class="form-control" id="nom_evenement" name="nom_evenement" required placeholder="Entrez le nom de l'événement">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="URL de l'image">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" required placeholder="Sélectionnez la date et l'heure">
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" required placeholder="Entrez le lieu">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required placeholder="Entrez la description de l'événement"></textarea>
                </div>
                <div class="form-group">
                    <label for="nbr_place">Nombre de places</label>
                    <input type="number" class="form-control" id="nbr_place" name="nbr_place" required placeholder="Entrez le nombre de places">
                </div>
                <div class="form-group">
                    <label for="date_limite">Date limite d'inscription</label>
                    <input type="datetime-local" class="form-control" id="date_limite" name="date_limite" required placeholder="Sélectionnez la date limite d'inscription">
                </div>
               
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
</div>

<style>

</style>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/createevenement.css') }}">
@endsection

@section('scripts')
@endsection
