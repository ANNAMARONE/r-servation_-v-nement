

@extends('layouts.sidebar_admin')

@section('content')
<div>
    <h1>Événements</h1><br>
    <div class="row">
        @foreach($evenements as $index => $evenement)
        <div class="col-md-3 mb-4">
            <div class="card card-custom">
                <div class="image-container">
                    <img src="{{ $evenement->image }}" class="card-img-top img-fluid" alt="{{ $evenement->nom_evenement }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Événement {{ $index + 1 }}:<br>{{ $evenement->nom_evenement }}</h5>
                    <p class="card-text">{{ Str::limit($evenement->description, 80) }}</p>
                    <a href="{{ route('dashboardevenements.show', $evenement->id) }}" class="btn btn-custom" style="border: 2px solid #E91F63; color: #E91F63;">Voir plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

<style>
body {
    font-family: roboto;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}


.card-custom {
   border: none;
    height: 450px;
}

.card-img-top {
    width: 100%;
    max-height: 200px; /* Ajustez cette valeur pour limiter la hauteur de l'image */
   
}

.card-title {
    font-size: 1.25em;
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
    height: 200px;
}

</style>




















