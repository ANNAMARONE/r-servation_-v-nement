@extends('layouts.sidebar_admin')


@section('content')
<div class="container">
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-primary">Ajouter un rôle</a>
    <a href="{{ route('permissions.index') }}"class="btn btn-primary">Permissions</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            {{ $message }}
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger mt-3">
            {{ $message }}
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>#Id</th>
                <th> Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{Route('roles.editPermissions',$role->id)}}">{{ $role->name }}</a></td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Modifier</a>
                    @if (!in_array($role->name, ['admin','utilisateur', 'organismes']))
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">suprimer</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
