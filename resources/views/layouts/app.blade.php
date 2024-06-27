<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
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
        <div class=" border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> 
                    <span>Tableau de bord</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-calendar-alt mr-2"></i> 
                    <span>Événements</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-book mr-2"></i>
                    <span>Réservations</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center mt-auto" id="logout">
                    <i class="fas fa-sign-out-alt mr-2"></i> 
                    <span>Déconnexion</span>
                </a>
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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-home"></i> Accueil
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="#" style="border-right: 1px solid #ccc; ">
                                <i class="fas fa-search"></i> Explorer Événements
                            </a>
                        </li>
                    </ul>
                    <span class="navbar-text">Hello Prénom</span>
                </div>
            </nav>
            
        </div>
    </div>
    <div class="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>  <!-- Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- js pour cacher le sidebar et gérer les liens actives -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(".list-group-item").click(function() {
            $(".list-group-item").removeClass("active");
            $(this).addClass("active");
        });
    </script>
    @yield('scripts')
</body>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

</html>
