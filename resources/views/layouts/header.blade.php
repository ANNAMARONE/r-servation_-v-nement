
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('styles')
</head>
<body>
   <header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste/evenements">Événements</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/reservations">Mes réservations</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="custom-btn-login nav-link" href="{{ route('login') }}">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="custom-btn-register nav-link" href="{{ route('register') }}">Inscription</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="custom-btn-logout nav-link" href="#" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
   </header>

   <div class="main-content">
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

            // Ajouter la classe 'active' au lien actuel
            var url = window.location.href;
            $('.navbar-nav a.nav-link').each(function() {
                if (url === this.href) {
                    $(this).closest('li').addClass('active');
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
