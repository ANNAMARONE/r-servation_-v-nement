{{-- resources/views/evenements/edit.blade.php --}}
{{-- @extends('layouts.app') --}}

    <div class="container">
        <h1>Modifier l'événement</h1>

        <form action="{{ route('evenements.update', $evenement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom_evenement">Nom de l'événement</label>
                <input type="text" class="form-control" id="nom_evenement" name="nom_evenement" value="{{ $evenement->nom_evenement }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $evenement->image }}">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="datetime-local" class="form-control" id="date" name="date" value="{{ $evenement->date->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="form-group">
                <label for="date_limite">Date limite d'inscription</label>
                <input type="datetime-local" class="form-control" id="date_limite" name="date_limite" value="{{ $evenement->date_limite->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="form-group">
                <label for="lieu">Lieu</label>
                <input type="text" class="form-control" id="lieu" name="lieu" value="{{ $evenement->lieu }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $evenement->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="nbr_place">Nombre de places</label>
                <input type="number" class="form-control" id="nbr_place" name="nbr_place" value="{{ $evenement->nbr_place }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
        </form>
    </div>

