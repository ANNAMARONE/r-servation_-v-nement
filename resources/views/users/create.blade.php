@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <h1>Create User</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Nom  complet:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <label>Adresse:</label>
        <input type="text" name="address" value="{{ old('address') }}">
        <button type="submit">Submit</button>
    </form>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('scripts')
@endsection
