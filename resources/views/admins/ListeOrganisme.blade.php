@extends('layouts.sidebar_admin')

@section('title', 'Tableau de bord')

@section('content')
    <h1 class="mt-4">Bienvenue sur le tableau de bord</h1>
    <p>Contenu principal de la page...</p>
   
    <div class="contenu">
        <div class="tables">
            <div class="table-responsive">
                
      
        <table class="table">
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
         <style>
            img{
                border-radius: 100%;
            }
            .statut{
                border: 1px solid green;
               width: 35%;
            padding: 10px;
           background-color: #F53F7B;
           color: white;
            }
         </style>
                @foreach( $organismes as  $organisme)
                    <tr>
                    <td><a href="{{Route('DetailOrganisme',$organisme->id)}}">
                    <img src="{{('storage/' . $organisme->logo) }}" alt="Logo de {{ $organisme->user->name }}" width="80">

                        </a>
                    </td>
                    <td>{{ $organisme->user->name }}</td>
                        <td>{{ $organisme->nina}}</td>
                        <td><button class="statut">{{ $organisme->statut}}</button></td>
                        <td>
                            <form action="{{Route('SuprimerOrganisme', $organisme->user->id)}}" method="post">
                                @csrf
                               @method('DELETE')
                          <button type="submit"><i class="fas fa-trash"></i></button>
                              
                            
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
@endsection

@section('styles')
  
@endsection

@section('scripts')
   
@endsection