{{-- @extends('layouts.app') --}}

<style>
    /* Styles personnalisés pour le formulaire */
    .custom-form-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    .custom-form {
        max-width: 600px;
        padding: 20px;
        border: 2px solid #000;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
    }

    .custom-form img {
        width: 150px;
        height: auto;
        margin-right: 20px;
        border-radius: 8px;
    }

    .custom-form h1 {
        margin-bottom: 20px;
    }

    .custom-form label {
        color: #000;
        font-weight: bold;
    }

    .custom-form .btn-primary {
        background-color: #F53F7B;
        color: #fff;
        border: none;
        margin-top: 10px;
        margin-left: auto; /* Centre le bouton à droite */
        display: block; /* Permet au bouton d'occuper toute la largeur disponible */
    }

    .custom-form .btn-primary:hover {
        background-color: #e0356e;
    }

    .custom-form input[type="text"],
    .custom-form input[type="datetime-local"],
    .custom-form textarea,
    .custom-form input[type="number"] {
        flex: 1; /* Pour occuper l'espace restant */
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
</style>

<div class="custom-form-container">
    <div class="custom-form">
        <img src="images/image1.png" alt="Image de l'événement">
        <div style="flex: 1;">
            <h1>Créer un événement</h1>

            <form action="{{ route('evenements.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom_evenement">Nom de l'événement</label>
                    <input type="text" class="form-control" id="nom_evenement" name="nom_evenement" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" class="form-control" id="lieu" name="lieu" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="nbr_place">Nombre de places</label>
                    <input type="number" class="form-control" id="nbr_place" name="nbr_place" required>
                </div>
                <div class="form-group">
                    <label for="date_limite">Date limite d'inscription</label>
                    <input type="datetime-local" class="form-control" id="date_limite" name="date_limite" required>
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>
</div>
