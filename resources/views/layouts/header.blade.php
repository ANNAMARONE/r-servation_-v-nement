<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'header')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- sidebar CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('styles')
</head>
<body>
   <header>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Événements</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mes réservations</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="custom-btn-login nav-link" href="{{ route('login') }}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="custom-btn-register nav-link" href="{{ route('register') }}" >Inscription</a>
                </li>
                
                @else
                <li class="nav-item">
                    <a class="custom-btn-logout nav-link" href="#" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                
                @endguest
            </ul>
        </div>
    </nav>
    
   </header>
    <div class="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>  <!-- Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Récupère l'URL de la page actuelle
            var url = window.location.href;
    
            // Itère sur chaque lien de la navbar
            $('.navbar-nav a.nav-link').each(function() {
                // Vérifie si l'URL de ce lien correspond à l'URL de la page actuelle
                if (url === (this.href)) {
                    // Ajoute la classe 'active' à l'élément parent <li>
                    $(this).closest('li').addClass('active');
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
