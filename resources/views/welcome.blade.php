<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
    <div class="col">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="{{asset('img/Rectangle 4 (1).png')}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    
    <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
    <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
  </div>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="{{asset('img/Rectangle 4 (1).png')}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="{{asset('img/Rectangle 4 (1).png')}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
</div>
    </div>
    <div class="col">
    <div class="card" style="width:400px">
  <img class="card-img-top" src="{{asset('img/Rectangle 4 (1).png')}}" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
</div>
    </div>
  </div>
  <button type="button" class="btn btn-primary">Primary</button>
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
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
 </div>
    <div class="carousel-item">
    <div class="row">
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
    </div>
    <div class="carousel-item">
    <div class="row">
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="col">
    <img src="{{asset('img/Rectangle 34624657.png')}}" class="d-block w-100" alt="...">
    </div>
  </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

@endsection

@section('styles')
 <style>
    
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
        width: 20px;
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
 </style>
@endsection

@section('scripts')
    <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection
    
</body>
</html>