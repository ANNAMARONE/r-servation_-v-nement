

@extends('layouts.sidebar_admin')

@section('content')
<div>
    <h1>Événements</h1><br>
    <div class="row">
        @foreach($evenements as $index => $evenement)
        <div class="col-md-3 mb-4">
            <div class="card card-custom">
                <div class="image-container">
                    <img src="{{ $evenement->image }}" class="card-img-top img-fluid" alt="{{ $evenement->nom_evenement }}" style="height: 200px">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Événement {{ $index + 1 }}:<br>{{ $evenement->nom_evenement }}</h5>
                    <p class="card-text">{{ Str::limit($evenement->description, 50) }}</p>
                    <a href="{{ route('dashboardevenements.show', $evenement->id) }}" class="btn btn-custom" >Voir plus</a>
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
    background: transparent;
    
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
}
.card-body a{
    color: #F53F7B;
    border: 2px solid #F53F7B;
    position: absolute; /* Positionne le bouton par rapport au parent .card-body */
    bottom: 15px; /* Définit la distance du bas */
    left: 15px; /* Définit la distance de la gauche */
}
.card-body a:hover{
    color: white;
}
.btn-custom:hover {
    display: inline-block;
    padding: 0.5em 1em;
    background: #F53F7B;
    color: white;
    border: 2px solid #F53F7B;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
}


.image-container {
    height: 200px;
}

</style>




















