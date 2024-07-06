@extends('layouts.sidebar_admin')


@section('content')
<div class="bouton">
    <a href="{{ route('roles.index') }}" class="btn">Retour</a>
</div><br><br><br>
<div class="container">
    <h1>Modifier les autorisations pour le rôle : {{ $role->name }}</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @endif
    <form action="{{ route('roles.updatePermissions', $role->id) }}" method="POST">
        @csrf
        <div class="form-group">
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                           id="permission_{{ $permission->id }}" 
                           {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                        {{ $permission->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>


<style>
     .btn-primary {
        padding: 10px 20px;
        background-color: #F53F7B;
        border:1px solid #F53F7B;
        color: white;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #4862C4;
    }


    .bouton {
        text-align: center;
        float: left;
    }

    .bouton .btn {
        display: inline-block;
        padding: 10px 20px;
        border: 1px solid #F53F7B;
        color: #F53F7B;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        margin-right: 20px;
    }

    .bouton .btn:hover {
        background-color: var(--couleur-principal);
        color: white
    }
</style>
@endsection
