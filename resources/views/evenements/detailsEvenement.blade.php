<!-- resources/views/evenements/show.blade.php -->
@extends('layouts.sidebar_admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>



<div class="container">
  <div class="row">
    <div class="col">
    <div class="container">
  <div class="row">
    <div class="col">
    <div class="row">
    <div class="col">
     <h1>{{ $evenement->nom_evenement }}</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <p><strong><i class="fa-solid fa-location-dot" style="color: #4862C4;"></i></strong> {{ $evenement->lieu }}</p>
    </div>
  </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <div class="card" style="width: 22rem;">
  <img src="{{ $evenement->image }}" class="card-img-top" alt="{{ $evenement->nom_evenement }}">
  <div class="card-body">
    <p class="card-text">{{ $evenement->description }}</p>
  </div>
</div>
    </div>

  </div>
</div>
    </div>
    <div class="col" id="col2">
    <div class="container">
  <div class="row">
    <div class="col">
      <h1>Detail Événemen</h1>
      <hr>
    </div>
    
  </div>
  <div class="row">
    <div class="col">
    <div class="container" id="container1">
  <div class="row">
    <div class="col">
      <img src="{{asset('img/Group 1171275785.png')}}" width="80px" height="80px" alt="">
    </div>
    <div class="col">
    <div class="container">
  <div class="row">
    <div class="col">
      <h5>organiser par</h5>
    </div>
    </div>
    <div class="row">
    <div class="col">
    {{$user->name}}
    </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <div class="col">
    <div class="container" id="container1">
  <div class="row">
    <div class="col">
    <img src="{{asset('img/Group 1171275741.png')}}" width="80px" height="80px" alt="">
    </div>
    <div class="col">
    <div class="container">
  <div class="row">
    <div class="col">
     <h5>date et heur:</h5>
    </div>
    </div>
    <div class="row">
    <div class="col">
    {{ $evenement->date }}
    </div>
    </div>
  </div>
    </div>
  </div>
</div>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <div class="col">
    <div class="container" id="container1">
  <div class="row">
    <div class="col">
    <img src="{{asset('img/Group 1171275742.png')}}"  width="80px" height="80px" alt="">
    </div>
    <div class="col">
    <div class="container">
  <div class="row">
    <div class="col">
    <h5>Localisation</h5>
    </div>
    </div>
    <div class="row">
    <div class="col">
    {{ $evenement->lieu}}
    </div>
    </div>
  </div>
    </div>
  </div>
</div>
    </div>
    </div>
  </div>
  <form action="{{ route('dashboardevenements.destroy', $evenement->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button id="btn6" type="submit" class="btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                            <i class="fa-solid fa-trash-can" style="color: #F44336;"></i>
                            </button>
                        </form>
</div>
    </div>
  
  </div>
</div> 
   <div class="evenement">
   <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($evenementsListe as $evenements)
    <div class="col">
    <div class="card h-100">
      <img id="imagelist" src="{{ $evenements->image }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{ $evenements->nom_evenement }}</h5>
        <p class="card-text">date:{{ $evenements->date}}</p>
      </div>
      <hr>
      <div class="card-body">
    <a id="card3" href="#" class="card-link">date de limite:<br> {{ $evenements->date_limite}}</a>
    <a href="#" class="card-link"><i class="fa-solid fa-location-dot" style="color: #4862C4;"></i>{{ $evenements->lieu}}</a>
  </div>
    </div>
   
  </div>
    @endforeach
 
 
</div>
   </div>
@endsection
<style>
  #container1{
    margin-top: 5%;
   
  }
  #col2{
    
    height: 500px;
    margin-top: 10%;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    
  }
  h5{
    color:#4862C4;
    font-weight:bold;
    font-size: 18px;
  }
  h1{
    font-weight: bold;
    font-size: 30px;
  }
  .evenement{
    margin-top: 5%;
    text-align: center;
  }
  #imagelist{
    border-radius: 15px;
    width:95%;
  
  }
  .d-inline{
    float: right;
  }
  #btn6{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;;
  }
   a{
    justify-content:space-between;
    margin: 10px;
    color: black;
    text-decoration: none;
  }
  #card3{
    margin: 10px;
  }
</style>
</body>
</html>



