@extends('layouts.app')

@section('title', 'Ajout Evénement')

@section('content')
<div class="bouton">
    <a href="{{ route('evenements.index') }}" class="btn">Retour</a>
</div>
<div class="custom-form-container">
    <div class="custom-form row">
        <!-- Colonne pour le formulaire -->
        <div class="col-md-8 formulaire">
            <h1>Créer un événement</h1>
            <form action="{{ route('evenements.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nom_evenement">Nom de l'événement</label>
                    <input type="text" class="form-control @error('nom_evenement') is-invalid @enderror" id="nom_evenement" name="nom_evenement"  placeholder="Entrez le nom de l'événement" value="{{ old('nom_evenement') }}">
                    @error('nom_evenement')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="URL de l'image" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date"  placeholder="Sélectionnez la date et l'heure" value="{{ old('date') }}">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" class="form-control @error('lieu') is-invalid @enderror" id="lieu" name="lieu"  placeholder="Entrez le lieu" value="{{ old('lieu') }}">
                    @error('lieu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"  placeholder="Entrez la description de l'événement">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nbr_place">Nombre de places</label>
                    <input type="number" class="form-control @error('nbr_place') is-invalid @enderror" id="nbr_place" name="nbr_place"  placeholder="Entrez le nombre de places" value="{{ old('nbr_place') }}">
                    @error('nbr_place')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date_limite">Date limite d'inscription</label>
                    <input type="datetime-local" class="form-control @error('date_limite') is-invalid @enderror" id="date_limite" name="date_limite"  placeholder="Sélectionnez la date limite d'inscription" value="{{ old('date_limite') }}">
                    @error('date_limite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('scripts')
@endsection
