@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $evenement->nom_evenement }}</h1>
    <img src="{{ asset('storage/' . $evenement->image) }}" alt="{{ $evenement->nom_evenement }}" width="300">
    <p>{{ $evenement->description }}</p>
    <p>Date: {{ $evenement->date }}</p>
    <p>Lieu: {{ $evenement->lieu }}</p>
    <p>Nombre de places: {{ $evenement->nbr_place }}</p>
    <p>Date limite: {{ $evenement->date_limite }}</p>
</div>
@endsection
