
@extends('layouts.sidebar_admin')

@section()



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div id="container1" class="container mt-3">
  <h2>Liste des permissions</h2>           
  <table class="table table-striped">
    <thead>
    <button type="button" class="btn btn-primary"><a href="{{Route('permissions.create')}}">ajouter Permissions</a></button>
    <button type="button" class="btn btn-primary"><a href="{{Route('roles.index')}}">Voire les rôles</a></button>
      <tr id="ajoutpermissions" >
        <th>Permissions</th>
        <th>Suprimer <i class="fa-solid fa-trash" style="color: #FFD43B;"></i></th>
        <th>Modifier <i class="fa-solid fa-pen-to-square" style="color:#4862C4;"></i></th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission )
        <tr>
        <td>{{$permission->name}}</td>
        <td>
        <form action="{{Route('permissions.destroy', $permission->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
</form>

        </td>

        <td><button type="button" class="btn btn-primary"><a href="{{Route('permissions.edit',$permission->id)}}">Modifier</a></button></td>
      </tr>
      <tr>
      
      </tr>
        @endforeach
      
    </tbody>
  </table>
</div>
<style>
    #container1{
        padding-top: 10rem;
        margin-left: 20%;
    }
    a{
        color:black;
        text-decoration: none;
    }
  
</style>
</body>
</html>
@endsection