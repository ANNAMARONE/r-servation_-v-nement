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
@extends('layouts.header')

@section('content')
<div class="banner">
<div id="card" class="card" style="width: 25rem;">
  <img src="{{asset('img/Group 1171275846.png')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Bienvenue sur MyEvent  </h5>
    <p class="card-text">Découvrez notre plateforme de gestion de réservations d'événements, conçue pour offrir une expérience fluide aux utilisateurs et simplifier la gestion pour les organisateurs. Explorez une variété d'événements organisés par des associations et organismes, réservez facilement votre place, et profitez de chaque moment grâce à notre interface intuitive.</p>
   
  </div>
</div>
<div class="card text-white">
  <img  src="{{asset('img/Rectangle 3.png')}}" class="card-img" width="700rem" height="100%" alt="...">
  <div class="card-img-overlay">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="imagecarelo" src="{{asset('img/Rectangle1.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
   
      <img id="imagecarelo" src="{{asset('img/Rectangle2.png')}}" class="d-block w-100" alt="...">
    </div>
    
    <div class="carousel-item">
      <img id="imagecarelo" src="{{asset('img/Rectangle4.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
 
  <button id="pages" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    
  </button>
</div>
  </div>
  <div class="image2">
    <img src="{{asset('img/Group 1171275801.png')}}" alt="">
</div>
</div>
</div>
<div class="contenaire1">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img src="{{asset('img/Rectangle 34624657.png')}}" class="img-fluid" height="50px" alt="...">
      
      </div>
    </div>
  </div>
  <div id="col-sm-6" class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 id="text1" class="card-title">A Propos de  Nous</h5>
        <p id="text2" class="card-text">Chez <span class="my">My</span> <span class="event">Event </span> , nous comprenons les défis auxquels les associations, les organisateurs et les participants sont confrontés lors de la planification et de la gestion des événements. C'est pourquoi nous avons créé une solution innovante qui centralise toutes les informations et facilite chaque étape du processus, de la publication d'événements à la gestion des inscriptions et des réservations.</p>
       
      </div>
    </div>
  </div>
</div>
</div>
<div class="contenair2">
<h1>Quelques Evénements à venir</h1>


<div class="container">
  <div class="row">
 
@foreach ($evenements as $evenement)
    <div class="col">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="{{ $evenement->image}}" alt="Card image">
  <div class="card-body">
  <h4 id="card-title" class="card-title">{{ $evenement->nom_evenement}}</h4>
    <a href="#" class="card-link"><i class="fa-solid fa-calendar-days" style="color: #4862C4;"></i>: {{ $evenement->date }}</a>
    <a id="icon"href="#" class="card-link"><i class="fa-solid fa-location-dot" style="color: #4862C4;"></i>{{ $evenement->lieu}}</a>
    <div id="icon1" class="card-body">
    <a href="#" class="card-link"><i class="fa-solid fa-eye" style="color:#F53F7B;"></i></a>
    <a id="icon" href="#" class="card-link"><img src="{{asset('img/Vector (1).png')}}" alt=""></a>
  </div>
  </div>
</div>
    </div>
    @endforeach

  </div>
  <button type="button" id="voireplus" class="btn btn-primary">Voire plus</button>
</div>
</div>
<div class="scrol">
<h1>Collaborateurs</h1>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="container">
  <div class="row">
    <div class="col">
    <img src="{{asset('img/logo1.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo3.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo8.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo2.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo5.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
 </div>
    <div class="carousel-item">
    <div class="container">
    <div class="row">
    <div class="col">
    <img src="{{asset('img/logo6.jpeg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo9.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo4.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo3.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo8.jpg')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  </div>
    </div>
    <div class="carousel-item">
    <div class="container">
    <div class="row">
    <div class="col">
    <img src="{{asset('img/logo3.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo8.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo4.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo1.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/logo5.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  </div>
    </div>
  </div>
  <button id="page2" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    
  </button>
  <button id="page2" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
   
  </button>
</div>
</div>
<div class="contact">
  <h1>contact</h1>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
    <div class="container mt-3">
  <form action="/action_page.php">
    <div class="mb-3 mt-3">
      <label for="text">Prenom:</label>
      <input type="text" class="form-control" id="text" placeholder="Enter prenom" name="email">
    </div>
    <div class="mb-3">
      <label for="text">Nom:</label>
      <input type="text" class="form-control" id="text" placeholder="Enter nom" name="pswd">
    </div>
    <label for="comment">Message:</label>
    <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
    <button id="contact" type="submit" class="btn btn-primary">envoyer</button>
  </form>
</div>

    </div>
    <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img src="{{asset('img/Rectangle 34624652.png')}}" class="img-fluid" height="50px" alt="...">
      
      </div>
    </div>
  </div>
  </div>
</div>

</div>

@endsection

@section('styles')
 <style>
  .scrol{
    margin-top: 5%;
  }
  .scrol h1{
    text-align: center;
      color:#F53F7B;
      font-weight:bold;
      margin-bottom: 5%;
  }
    #card-title{
      text-align: center;
      font-weight: bold;
      color: #4862C4;
    }
    #page2{
      border-radius: 100%;
        height: 60px;
        width: 60px;
        background-color:black;
        color: black;
        margin-top: 5%;
    }
    .contenair2{
      margin-top: 5%;

    }
    #icon{
      float: right;
      margin-left: 5%;
     
    }
    #icon1{
      margin-top: 10%;
    }
    .contenair2 h1{
      text-align: center;
      color:#F53F7B;
      font-weight:bold;
      margin-bottom: 5%;
      
    }
    .contenair2 .card{
      border: 1px solid black;
      margin-bottom: 5%;
      
      
    }
    .contenair2 .card a{
      color: black;
      font-weight: bold;
    }
    .contenair2 .card i{
    margin-right: 3px;
    }
.event{
    color: #F53F7B;
    font-weight:bold;
}
.my{
    color:#4862C4;
    font-weight:bold;

}
    .banner{
        display: flex;
        justify-content:space-between;
        width: 100%;
        height: 110vh;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .card{
        border: none;
    }
    #card{
        margin-left: 10%;
        
    }
    #pages{
        border-radius: 100%;
        height: 60px;
        width: 60px;
        background-color:black;
        color: black;
        margin-top: 50%;
    }
    #imagecarelo{
        margin-top: 8%;
    }
    .image2{
       margin-right: 10%;
       margin-top: -20%;
       
    }
    .contenaire1{
        margin-top: 8%;
        width: 95%;
        height: 60%;
        margin-left:20px;
    }
    #col-sm-6{
        margin-top: 10%;
        border: 1px solid black;
    }
    #text2{
        margin-top: 15%;
      font-size: 20px;
    }
    #text1{
        text-align: center;
        color:#F53F7B;
        font-size: 30px;
        font-weight: bold;
        margin-top: 10%;
    }
    #voireplus{
     margin-left: 40%;
     background-color: #F53F7B;
    }
    .contact{
      margin-top: 10%;
    }
    .contact h1{
      text-align: center;
      color:#F53F7B;
      font-weight:bold;
      margin-bottom: 5%;
    }
    #contact{
      width: 100%;
      margin-top: 5%;
      background-color: #F53F7B;
    }
 </style>
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection
    
</body>
</html>