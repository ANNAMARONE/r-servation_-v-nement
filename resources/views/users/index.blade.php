@extends('layouts.sidebar_admin')

@section('title', 'Liste des utilisateurs')

@section('content')
    <div class="container">
        <h1 style="font-weight: bold">Liste des utilisateurs</h1>

        <!-- Tableau responsive pour afficher les utilisateurs -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rôle</th> <!-- Ajout d'une colonne pour les rôles -->
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Boucle pour afficher chaque utilisateur -->
                    @foreach ($users as $user)
                        <tr>
                            <!-- Affiche le nom de l'utilisateur -->
                            <td>{{ $user->name }}</td>

                            <!-- Affiche l'email de l'utilisateur -->
                            <td>{{ $user->email }}</td>
                            <!-- Affiche les rôles de l'utilisateur -->
                            <td>
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}<br>
                                @endforeach
                            </td>

                            <!-- Actions disponibles pour chaque utilisateur -->
                            <td>
                                <!-- Utilisation d'une icône pour supprimer l'utilisateur -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-link text-dark" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                        <i class="fas fa-trash-alt"></i> <!-- Icône de poubelle -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
