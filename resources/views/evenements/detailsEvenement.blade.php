@extends('layouts.sidebar_admin')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h1>{{ $evenement->nom_evenement }}</h1>
              <div class="card" style="width: 22rem;">
                <img src="{{ $evenement->image }}" class="card-img-top" alt="{{ $evenement->nom_evenement }}">
                <div class="card-body">
                    <p class="card-text">{{ $evenement->description }}</p>
                </div>
            </div>
        </div>
        <div class="col" id="col2">
            <div class="container">
                <h1>Detail Événement</h1>
                <hr>
                <div class="container mb-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('img/Group 1171275785.png') }}" width="80px" height="80px" alt="">
                        </div>
                        <div class="col">
                            <h5>Organisé par</h5>
                            {{ $organisme }}
                        </div>
                        
                    </div>
                </div>
                <div class="container mb-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('img/Group 1171275741.png') }}" width="80px" height="80px" alt="">
                        </div>
                        <div class="col">
                            <h5>Date et heure:</h5>
                            {{ $evenement->date }}
                        </div>
                    </div>
                </div>
                <div class="container mb-4">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('img/Group 1171275742.png') }}" width="80px" height="80px" alt="">
                        </div>
                        <div class="col">
                            <h5>Localisation</h5>
                            {{ $evenement->lieu }}
                        </div>
                    </div>
                </div>
                <form action="{{ route('dashboardevenements.destroy', $evenement->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button id="btn6" type="submit" class="btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                        <i class="fas fa-trash-alt" style="color: red"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="bouton">
        <a href="{{ route('afficherevenement.index1') }}" class="btn">Retour</a>
    </div><br>

    <div class="evenement">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($evenementsListe as $evenement)
            <div class="col">
                <div class="card h-100">
                    <img id="imagelist" src="{{ $evenement->image }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $evenement->nom_evenement }}</h5>
                        <p class="card-text">{{ $evenement->date->format('j F Y \à H\hi') }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link">{{ $evenement->date_limite }}</a>
                        <a href="#" class="card-link"><i class="fa-solid fa-location-dot" style="color: #4862C4;"></i>{{ $evenement->lieu }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
@endsection

<style>
    /* Votre style existant reste inchangé */
    #container1 {
        margin-top: 5%;
    }

    #col2 {
        height: 500px;
        margin-top: 10%;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }

    h5 {
        color: #4862C4;
        font-weight: bold;
        font-size: 18px;
    }

    h1 {
        font-weight: bold;
        font-size: 30px;
    }

    .evenement {
        margin-top: 5%;
        text-align: center;
    }

    #imagelist {
        border-radius: 15px;
        width: 100%;
    }
     .card-img-top{
        height: 250px;
     }
    .d-inline {
        float: right;
    }

    #btn6 {
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
    .card-footer{
        display: flex;
        justify-content: space-between
    }

    .bouton {
        text-align: center;
        float: left;
    }

    .bouton .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: var(--couleur-principal);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        margin-right: 20px;
    }

    .bouton .btn:hover {
        background-color: var(--couleur-secondaire);
    }
</style>
