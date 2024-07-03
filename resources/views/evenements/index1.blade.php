

@extends('layouts.sidebar_admin')

@section('content')
<div>
    <h1>Événements</h1>
    <div class="row">
        @foreach($evenements as $index => $evenement)
        <div class="col-md-4 mb-4">
            <div class="card card-custom">
                <div class="image-container">
                    <img src="{{ $evenement->image }}" class="card-img-top img-fluid" alt="{{ $evenement->nom_evenement }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Événement {{ $index + 1 }}:<br>{{ $evenement->nom_evenement }}</h5>
                    <p class="card-text">{{ Str::limit($evenement->description, 100) }}</p>
                    <a href="{{ route('afficherevenement.show1', $evenement->id) }}" class="btn btn-custom" style="border: 2px solid #E91F63; color: #E91F63;">Voir plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    margin: 0 auto;
}

.header, .footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 1em;
}

.card-custom {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 1em;
    margin-bottom: 1em;
    background-color: #7B809A;
}

.card-img-top {
    border-radius: 10px;
    width: 100%;
    height: auto;
    max-height: 200px; /* Ajustez cette valeur pour limiter la hauteur de l'image */
    object-fit: cover; /* Pour que l'image couvre l'espace tout en conservant son ratio */
}

.card-title {
    font-size: 1.25em;
    margin-bottom: 0.5em;
}

.card-text {
    font-size: 1em;
    color: #6c757d;
}

.btn-custom {
    display: inline-block;
    padding: 0.5em 1em;
    color: #E91F63;
    border: 2px solid #E91F63;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
}

.image-container {
    overflow: hidden;
    border-radius: 5px;
    margin-bottom: 1em; /* Ajoute de l'espace entre l'image et le contenu de la carte */
}

.navbar-text {
    color: #fff;
}

</style>




















