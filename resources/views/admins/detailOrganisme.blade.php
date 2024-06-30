
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
@extends('layouts.sidebar_admin')

@section('title', 'Tableau de bord')
<style>
   #row{
border: 1px solid black;
border-collapse: collapse;
    }
    #liste{
margin-left: 80%;
    }
    #btn1{
      background-color:#B6DCB8;
      color: black;
    }
    #btn2{
      background-color:rgb(255, 3, 3,26%);
      color: black;
      margin: 10px;
    }
    #row2{
      margin-left: 20px;
      margin-top: 30px;
    }
    .card-title{
      color: #4862C4;
      font-weight: bold;
    }
    .card-text{
      color: #63B967;
    }
</style>
@section('content')
<div class="container">
  <div id="row" class="row">
    <div class="col">
    <img src="{{('storage/' . $organisme->logo) }}" alt="" width="100">
     <p>{{ $organisme->description}} </p>
    </div>
    <div class="col">
    <div class="container mt-2">
  <button id="liste" type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModal">
  <i class='fas fa-grip-vertical' style='font-size:24px'></i>
  </button>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
     
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
      <td>
                        
                            @if ( $organisme->statut == 'accepter')
                                <a href="{{ route('compte.rejeter', $organisme->id) }}" id="btn1" class="btn btn-success">valider <i class="fa-solid fa-check" style="color: #29AB30;"></i></a><br>
                                <a href="{{ route('compte.accepter', $organisme->id) }}" id="btn2" class="btn btn-danger">Rejeter<i class="fa-solid fa-xmark" style="color: #FF0303;"></i></a>
                            @else
                                <span>{{ ucfirst( $organisme->statut) }}</span>
                            @endif
     </td>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">fermer</button>
      </div>

    </div>
  </div>
</div>
    </div>
  </div>
  <div id="row" class="row">
    <div class="col">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-8">
    <div class="col-md-4">
      <img id="row2" src="{{asset('images/Group 1171275842.png')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">date d’inscription</h5>
        <p class="card-text">{{$organisme->created_at}}</p>
       
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img id="row2" src="{{asset('images/Group 1171275843.png')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Secteur d'activité</h5>
        <p class="card-text">{{$organisme->secteur_activité}}</p>
       
      </div>
    </div>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img id="row2" src="{{asset('images/Group 1171275844.png')}}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">locatisation</h5>
        <p class="card-text">{{$organisme->adresse}}</p>
       
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
@endsection

@section('styles')
  
@endsection

@section('scripts')
   
@endsection



</body>
</html>
