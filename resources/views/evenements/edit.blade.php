{{-- @extends('layouts.app') --}}

<style>
    .custom-form-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    .custom-form {
        max-width: 800px; /* Ajustez la largeur maximale selon vos besoins */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        border: 2px solid #000;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .custom-form img {
        width: 200px; /* Ajustez la taille de l'image */
        height: auto;
        border-radius: 8px;
    }

    .custom-form .form-section {
        flex: 1;
        margin-left: 20px; /* Espace entre l'image et le formulaire */
    }

    .custom-form h1 {
        margin-bottom: 20px;
    }

    .custom-form label {
        color: #000;
        font-weight: bold;
    }

    .custom-form .form-group {
        margin-bottom: 20px;
    }

    .custom-form .btn-primary {
        background-color: #F53F7B;
        color: #fff;
        border: none;
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .custom-form .btn-primary:hover {
        background-color: #e0356e;
    }

    .custom-form input[type="text"],
    .custom-form input[type="datetime-local"],
    .custom-form textarea,
    .custom-form input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
</style>

<div class="custom-form-container">
    <div class="custom-form">
        <img src="{{ asset('images/image1.png') }}" alt="image bi">
        <div class="form-section">
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
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $evenement->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="nbr_place">Nombre de places</label>
                    <input type="number" class="form-control" id="nbr_place" name="nbr_place" value="{{ $evenement->nbr_place }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
            </form>
        </div>
    </div>
</div>
