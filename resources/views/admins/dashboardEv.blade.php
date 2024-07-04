@extends('layouts.sidebar_admin')

@section('title', 'Tableau de bord')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Widget 1 - Nombre d'événements -->
        <div class="col-md-4">
            <div class="card widget" style="background-color: #F53F7B;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title"></i>Utilisateurs</h5>
                            <p class="card-text">{{$totalUsers}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users " style="font-size:50px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget 2 - Nombre de participants -->
        <div class="col-md-4">
            <div class="card widget" style="background-color: #4862C4;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title"> Organismes</h5>
                            <p class="card-text">{{  $totalOrganismes }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users " style="font-size:50px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Widget 3 - Nombre de réservations -->
        <div class="col-md-4">
            <div class="card widget" style="background-color: #FC544B;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title"> Événements</h5>
                            <p class="card-text">{{  $totalEvenements }}</p>
                        </div>
                        <div class="icon">
                            <i class="material-icons" style="font-size:50px">event</i> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>

    <!-- Tableau des événements -->
    <div class="contenu mt-4">
        <h3>Événements les plus populaires</h3>
       
        <table class="table mt-3">
            <thead>
                <tr>
                    <th style="color: #000;">Image</th>
                    <th style="color: #000;">Titre</th>
                    <th style="color: #000;">Date</th>
                    <th style="color: #000;">Lieu</th>
                    <th style="color: #000;">Nombre de Places</th>
                    <th style="color: #000;">Limite de réservation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenements as $evenement)
                <tr>
                    <td> <!-- Affichage de l'image avec lien -->
                        <a href="{{ route('dashboardevenements.show', $evenement->id) }}">
                            <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" width="100">
                        </a>
                    </td>
                    <td>{{ $evenement->nom_evenement }}</td>
                    <td>{{ $evenement->date }}</td>
                    <td>{{ $evenement->lieu }}</td>
                    <td>{{ $evenement->nbr_place }}</td>
                    <td>{{ $evenement->date_limite }}</td>
                </tr>
                <tr style="border-top: 2px solid #fff;"></tr> <!-- Ligne horizontale -->
                @endforeach
            </tbody>
        </table>

        {{ $evenements->links() }} <!-- Pagination -->
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<style>
    .card {
        width: 280px;
        height: 140px;
        border-radius: 10px;
        color: white;
    }

    h1 {
        font-family: 'Roboto';
        font-size: 30px;
        font-weight: bold;
    }

    .bouton .btn:hover {
        background-color: var(--couleur-secondaire);
    }

    .contenu {
        background-color: #ffff;
        width: 98%;
        margin-top: 8%;
        height: 100%;
    }
  
</style>
@endsection
