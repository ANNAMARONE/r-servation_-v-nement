
   <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    @extends('layouts.header')

    @section('content')
        <div class="banner">
            <div id="card" class="card" style="width: 25rem;">
                <img src="{{ asset('img/Group 1171275846.png') }}" class="card-img-top" alt="..."
                    style="width:150px"><br>
                <div class="card-body">
                    <h1 class="card-title">Bienvenue sur <span style="color: #4862C4">My</span> <span
                            style="color: #F53F7B">Event</span> </h1><br>
                    <p class="card-text" style="width:500px">Découvrez notre plateforme de gestion de réservations
                        d'événements, conçue pour offrir une expérience fluide aux utilisateurs et simplifier la gestion
                        pour les organisateurs. Explorez une variété d'événements organisés par des associations et
                        organismes, réservez facilement votre place, et profitez de chaque moment grâce à notre interface
                        intuitive.</p>

                </div>
            </div>
            <div class="card text-white">
                <img src="{{ asset('img/Rectangle 3.png') }}" class="card-img" width="700rem" height="100%" alt="...">
                <div class="card-img-overlay">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img id="imagecarelo" src="{{ asset('img/Rectangle1.png') }}" class="d-block "
                                    alt="..." style="width:300px; height:250px;">
                                <h3 style="text-align: center">Vernissage</h3>
                            </div>
                            <div class="carousel-item">

                                <img id="imagecarelo" src="{{ asset('img/Rectangle2.png') }}" class="d-block" alt="..."
                                    style="width:300px; height:250px;">
                                <h3 style="text-align: center">Conférences</h3>
                            </div>

                            <div class="carousel-item">
                                <img id="imagecarelo" src="{{ asset('img/Rectangle4.png') }}" class="d-block"
                                    alt="..."style="width:300px;height:250px;">
                                <h3 style="text-align: center">Concert</h3>
                            </div>
                        </div>

                        <button id="pages" class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>

                        </button>
                    </div>
                </div>
                <div class="image2" style="width:150px; height:auto">
                    <img src="{{ asset('img/Group 1171275801.png') }}" alt="" style="width:150px;height:auto">
                </div>
            </div>
        </div>
        <div class="contenaire1 " style="margin-top: -15%">
            <div class="row" style=" display:flex;">
                <div class="col-sm-6" style="height: 450px">
                    <div class="card" style="height: 400px">
                        <div class="card-body" style="height: 400px">
                            <img src="{{ asset('img/Rectangle 34624657.png') }}" class="img-fluid" height="50px"
                                alt="..." style="margin-left: 30%; margin-top:-15%" height="400px">

                        </div>
                    </div>
                </div>
                <div id="col-sm-6" class="col-sm-6" style="height: 450px">
                    <div class="card" style="height: 400px">
                        <div class="card-body" style="height: 400px">
                            <h1 id="text1">A Propos de Nous</h1>
                            <p id="text2" style="width:500px">Chez <span class="my">My</span> <span
                                    class="event">Event </span> , nous comprenons les défis auxquels les associations, les
                                organisateurs et les participants sont confrontés lors de la planification et de la gestion
                                des événements. C'est pourquoi nous avons créé une solution innovante qui centralise toutes
                                les informations et facilite chaque étape du processus, de la publication d'événements à la
                                gestion des inscriptions et des réservations.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenair2">
            <h1>Quelques Evénements à venir</h1>

                <div class="row" style="width:100%; margin-left: 5%; margin-right:auto; align-items:center">
                    @foreach ($evenements as $evenement)
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/star.jpg') }}" alt="" class="star">
                                <img src="{{ $evenement->image }}" alt="{{ $evenement->nom_evenement }}" class="image">
                                <h2>{{ $evenement->nom_evenement }}</h2>
                                <div class="row">
                                    <p>
                                        <i class="fas fa-calendar-alt"></i> :
                                        {{ \Carbon\Carbon::parse($evenement->date)->format('d-m-Y') }}
                                    </p>
                                    <p>
                                        <i class="fas fa-map-marker-alt"></i> :
                                        {{ $evenement->lieu }}
                                    </p>
                                </div>
                                <div class="icons">
                                    <a href="#" data-toggle="modal"
                                        data-target="#eventModal-{{ $evenement->id }}">
                                        <i class="material-icons">visibility</i>

                                    </a>
                                    <a href="#" data-toggle="modal"
                                        data-target="#reservationModal-{{ $evenement->id }}">
                                        {{-- <i class="fas fa-calendar-check"></i> --}}
                                        <i class="material-icons">event_seat</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                          {{ $evenements->links() }}
                      </div>
                    @endforeach

                </div>
                <div class="bouton">
                  <a href="{{ route('evenements.index') }}" class="btn">Voir Plus</a>
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
                                    <img src="{{ asset('img/logo1.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo3.png') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo8.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo2.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo5.png') }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('img/logo6.jpeg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo9.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo4.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo3.png') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo8.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('img/logo3.png') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo8.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo4.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo1.jpg') }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="col">
                                    <img src="{{ asset('img/logo5.png') }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="page2" class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                </button>
                <button id="page2" class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                </button>
            </div>
        </div>
        <div class="contact">
            <h1>Contact</h1>
            <div class="container">
                <div class="row" style="display: flex; justify-content:space-around">
                    <div class="col-sm-4">
                        <div class="container mt-3">
                            <form action="/action_page.php">
                                <div class="mb-3 mt-3">
                                    <label for="text">Prenom:</label>
                                    <input type="text" class="form-control" id="text" placeholder="Enter prenom"
                                        name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="text">Nom:</label>
                                    <input type="text" class="form-control" id="text" placeholder="Enter nom"
                                        name="pswd">
                                </div>
                                <label for="comment">Message:</label>
                                <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                <button id="contact" type="submit" class="btn">Contacter</button>
                            </form>
                        </div>

                    </div>
                    <div class="col-sm-6" style="width:600px;">
                        <div class="card" style="width:600px;" >
                            <div class="card-body" style="width:600px;">
                                <img src="{{ asset('img/Rectangle 34624652.png') }}" class="img-fluid" height="50px"
                                    alt="..." style="width:600px; float:left;">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @section('styles')
        <style>
          body{
            overflow-x: hidden;
          }
            .scrol {
                margin-top: 5%;
            }

            .scrol h1 {
                text-align: center;
                color: #F53F7B;
                font-weight: bold;
                margin-bottom: 5%;
            }

            .card-title {
                text-align: center;
                font-weight: bold;
                font-size: 25px;
                margin-left: -25%;

            }

            #card p {
                font-size: 18px;
                text-align: justify;
            }

            #page2 {
                border-radius: 100%;
                height: 60px;
                width: 60px;
                background-color: black;
                color: black;
                margin-top: 5%;
            }

            .card {
                width: 488px;
                height: 650px;
                border: 1px solid #ccc;
                margin-bottom: 30px;
            }

            .card img.image {
                width: 488px;
                height: 461px;
                border-top-left-radius: 80px;
                border-bottom-left-radius: 80px;
                border-top-right-radius: 230.5px;
            }

            .card img.star {
                width: 50px;
                position: absolute;
                left: 85%;
                top: 10px;
            }

            .card h2 {
                margin-top: 20px;
                font-size: 26px;
                font-family: roboto;
                text-align: center;
                color: var(--couleur-secondaire);
                font-weight: bold;
            }

            .card .row {
                display: flex;
                justify-content: space-around;
                align-items: center;
            }

            .card .row p {
                font-size: 20px;
                font-weight: bold;
            }

            .card .row p i {
                font-size: 30px;
                color: var(--couleur-secondaire);
                margin-right: 8px;
            }

            .icons {
                margin-top: 10px;
                display: flex;
                align-items: center;
                justify-content: space-around;
                gap: 40%;
                font-weight: bold;
            }

            .icons a {
                margin-right: 20px;
                text-decoration: none;
                color: #333;
            }

            .icons a i {
                color: var(--couleur-principal);
                font-size: 30px;
            }

            .contenair2 {
                margin-top: 15%;

            }

            #icon {
                float: right;
                margin-left: 5%;

            }

            #icon1 {
                margin-top: 10%;
            }

            .contenair2 h1 {
                text-align: center;
                color: #F53F7B;
                font-weight: bold;
                margin-bottom: 5%;

            }

            .contenair2 .card {
                border: 1px solid black;
                margin-bottom: 5%;


            }

            .contenair2 .card a {
                color: black;
                font-weight: bold;
            }

            .contenair2 .card i {
                margin-right: 3px;
            }

            .event {
                color: #F53F7B;
                font-weight: bold;
            }

            .my {
                color: #4862C4;
                font-weight: bold;

            }

            .banner {
                display: flex;
                justify-content: space-between;
                width: 100%;
                height: 110vh;
                margin-top: 5%;
                margin-bottom: 5%;
            }

            .card {
                border: none;
            }

            #card {
                margin-left: 8%;

            }

            #pages {
                border-radius: 100%;
                height: 60px;
                width: 60px;
                background-color: black;
                color: black;
                margin-top: 50%;
            }

            #imagecarelo {
                margin-top: 8%;
            }

            .image2 {
                margin-right: 10%;
                margin-top: -20%;

            }

            .contenaire1 {

                width: 95%;

            }

            #col-sm-6 {

                border: 1px solid black;
            }

            #text2 {
                margin-top: 15%;
                font-size: 20px;
            }

            #text1 {
                text-align: center;
                color: #F53F7B;
                font-size: 30px;
                font-weight: bold;
            }

            #voireplus {
                margin-left: 40%;
                background-color: #F53F7B;
            }

            .contact {
                margin-top: 5%;
            }
            .contact input,.contact textarea{
              border-radius: 8px
            }
            .contact h1 {
                text-align: center;
                color: #F53F7B;
                font-weight: bold;
                margin-bottom: 5%;
            }

            #contact {
                width: 100%;
                margin-top: 5%;
                background-color: #F53F7B;
                color: white;
                border-radius: 8px;
            }
            .bouton {
    text-align: center; 
    float: center;
}

.bouton .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: var(--couleur-principal);
    color: white; 
    text-decoration: none; 
    border-radius: 8px;
    transition: background-color 0.3s ease; 
    margin-right: 20px;
}

.bouton .btn:hover {
    background-color: var(--couleur-secondaire); 
}
    
@media screen and (max-width: 900px) {
 .banner{
   display: block;
       margin: 0;
       padding: 0;
       width: 100%;
       height: 110vh;
       margin-bottom: 20%;
 }
 #card{
       margin: 0;
       padding: 0;
      
   }
   body{
     margin: 0;
     padding: 0;
   }
   .contenaire1{
       padding-top: 40vh;
       margin:0;
       text-align: center;
       width: 90%;
       margin-left: 5%;
   }
   h1{
     font-size:18px;
   }
   #text2{
       margin-top: 15%;
     font-size: 18px;
   }
   #text1{
       text-align: center;
       color:#F53F7B;
       font-size: 16px;
       font-weight: bold;
       margin-top: 10%;
   }
   #cardmedia{
     width: 350px;
     margin-left: 5%;
   }
   #page2{
       display: none;
   }
   #pages{
       display: none;
   }
}
</style>
@endsection


@section('scripts')
   <!-- Vous pouvez ajouter des scripts supplémentaires ici -->
@endsection


</body>
</html>