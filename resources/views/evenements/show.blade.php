@extends('layouts.app')

@section('title', "Détails de l'événement")

@section('content')
<div class="contenu">
    <div class="tables">
        <div class="container mt-5">
            <div class="row">
                <!-- 1ère Colonne -->
                @auth
                <div class="col-md-6">
                    <h1>{{ $evenement->nom_evenement }}</h1>
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>{{ $evenement->description }}</p>  @endauth 
                    <div class="image-container">
                        <img src="{{ asset('images/banner.png') }}" class="img-fluid" alt="Image avec texte">
                        <div class="image-text"><i class="fas fa-calendar-alt"></i> {{ $evenement->date }} à {{ $evenement->lieu }}</div>
                    </div>
                    <p class="places"> <i class="fas fa-users"></i> Nombre de places : {{ $evenement->nbr_place }}</p>
                </div>
                <!-- 2ème Colonne -->     

                {{-- @auth
                <span class="navbar-text">
                    Hello {{ Auth::user()->name }}
                </span>
                @endauth  --}}

                <div class="col-md-6">
                    <div class="mb-3 image">
                        <img src="{{ $evenement->image }}" class="img-fluid" alt="Image">
                    </div>
                    <div class="image-container" style="margin-left: 20px;">
                        <img src="{{ asset('images/banner.png') }}" class="img-fluid" alt="Image avec texte" style="width: 70%">
                        <div class="image-text">Date limite: {{ $evenement->date_limite }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection
