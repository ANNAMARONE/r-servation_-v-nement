
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- sidebar CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @yield('styles')
</head>
<body>
    <div id="wrapper" class="d-flex">
        <!-- Sidebar -->
         
        <div class="border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard_organisme') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('dashboard_organisme') ? 'active' : '' }}">
                   
                    <i class="material-icons">dashboard</i>
                    <span>Tableau de bord</span>
                </a>
                <a href="{{ route('evenements.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('evenements*') ? 'active' : '' }}">
                    <i class="material-icons">event</i>
                    <span>Événements</span>
                </a>
                <a href="{{ route('evenements.index') }}" class="list-group-item list-group-item-action d-flex align-items-center {{ request()->is('reservations*') ? 'active' : '' }}">
                    <i class="material-icons">event_seat</i>
                    <span>Réservations</span>
                </a>                
             
                <form method="POST" action="{{route('logout')}}" class="list-group-item list-group-item-action d-flex align-items-center mt-auto"id="logout">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 d-flex align-items-center">
                        <i class="material-icons">logout </i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
                <button class="btn btn-primary" id="menu-toggle">
                    <span class="navbar-toggler-icon custom-toggler"></span>
                </button>
                <a class="navbar-brand ml-3" href="#"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                <div class="ml-auto d-flex">
                   
                    
                     <!-- RÉCUPERER LE NOM DU USER CONNECTÉ -->
                     @auth
                    <span class="navbar-text">
                        Hello {{ Auth::user()->name }}
                    </span>
                    @endauth 
                    
                </div>
            </nav>

            <div class="main-content">
                <div class="container-fluid">
                    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- js pour cacher le sidebar et gérer les liens actives -->
    <script>
        $(document).ready(function() {
    // Toggle sidebar
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // Active link handling
    $(".list-group-item").click(function() {
        $(".list-group-item").removeClass("active");
        $(this).addClass("active");
    });
});

    </script>
    @yield('scripts')
</body>



