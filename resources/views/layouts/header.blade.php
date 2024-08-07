
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'header')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('styles')
    <style>
        .nav-link.active {
            color: #F53F7B !important;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">

                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Accueil</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('liste/evenements') ? 'active' : '' }}"
                            href="/liste/evenements">Événements</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('reservations') ? 'active' : '' }}" href="/reservations">Mes
                                réservations</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="custom-btn-login nav-link {{ request()->is('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">



                            <!-- Button trigger modal -->
                            <button class="btn2" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <a class="custom-btn-register nav-link">Inscription</a>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Veuillez choisir une option
                                                pour vous s'inscrire:</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <a href="{{ route('register') }}" class="ConnecteUtilisateur">S'inscrire en tant
                                                qu'utilisateur</a><br>

                                        </div>
                                        <div class="modal-body">
                                            <a class="Connecteorganisme" href="{{ route('register_organisme') }}">S'inscrire
                                                en tant qu'organisme</a>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="btn3" type="button" class="btn "
                                                data-bs-dismiss="modal">fermer</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                       
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="custom-btn-logout nav-link" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <style>
            .btn2 {
                border: none;
                background-color: white;
            }

            #btn3 {
                background-color: #F53F7B;
                
            }

            .btn5 {
                padding-top: 5%;

            }
        </style>

    </header>

    <div class="main-content">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        @yield('content')
    </div>

    <!-- Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Gérer l'ouverture et la fermeture du menu burger
            $('.navbar-toggler').on('click', function() {
                $('#navbarNav').toggleClass('show');
            });
        });
    </script>
    @yield('scripts')
    @extends('layouts.footer')
</body>

</html>
