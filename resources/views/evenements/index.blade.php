{{-- @extends('layouts.app') --}}

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table img {
        max-width: 80px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .table .actions {
        display: flex;
        justify-content: space-around;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: #007bff;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover {
        color: #fff;
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }
</style>

<h1>Liste des événements</h1>
<a href="{{ route('evenements.create') }}" class="btn btn-primary mb-3">Créer un événement</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Image</th>
            <th scope="col">Date</th>
            <th scope="col">Date limite d'inscription</th>
            <th scope="col">Lieu</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($evenements as $evenement)
            <tr>
                <td>{{ $evenement->id }}</td>
                <td>{{ $evenement->nom_evenement }}</td>
                <td>
                    @if($evenement->image)
                        <img src="{{ asset($evenement->image) }}" alt="{{ $evenement->nom_evenement }}">
                    @else
                        <span>Aucune image</span>
                    @endif
                </td>
                <td>{{ $evenement->date->format('d/m/Y H:i') }}</td>
                <td>{{ $evenement->date_limite->format('d/m/Y H:i') }}</td>
                <td>{{ $evenement->lieu }}</td>
                <td class="actions">
                    <a href="{{ route('evenements.edit', $evenement) }}" class="btn btn-primary btn-sm">Éditer</a>
                    <form action="{{ route('evenements.destroy', $evenement) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
