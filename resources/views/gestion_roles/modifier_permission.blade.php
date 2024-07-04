@extends('layouts.sidebar_admin')


@section('content')
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
        <button type="submit" class="btn btn-primary">ajouter</button>
    </form>
</div>
@endsection
