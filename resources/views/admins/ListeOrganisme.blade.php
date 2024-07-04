@extends('layouts.sidebar_admin')

@section('title', 'Tableau de bord')
@section('content')
<h1>Liste des Organismes</h1><br>
<div class="container">
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
                    <th>logo</th>
                    <th>nom</th>
                    <th>nina</th>
                    <th>statut</th>
                    <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach( $organismes as  $organisme)
                    <tr>
                    <td><a href="{{Route('DetailOrganisme',$organisme->id)}}">
                    <img src="{{('storage/' . $organisme->logo) }}" alt="Logo de {{ $organisme->name }}" width="80">
                        </a>
                    </td>
                    <td>{{ $organisme->user->name}}</td>
                        <td>{{ $organisme->nina}}</td>
                        <td><p class="statut">{{ $organisme->statut}}</p></td>
                        <td>
                            <form action="{{Route('SuprimerOrganisme', $organisme->id)}}" method="post">
                                @csrf
                               @method('DELETE')
                          <button type="submit"><i class="fas fa-trash"></i></button>
                              
                            
                            </form>
                        </td>
                    </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
<style>
            img{
                border-radius: 100%;
            }
            .statut{
                border: 1px solid green;
                width: 50%;
                text-align: center;
                background-color: #F53F7B;
                color: white;
                border:none;
                border-radius:20px;
                padding:8px;
                font-weight: bold;
            }
         </style>
@endsection
