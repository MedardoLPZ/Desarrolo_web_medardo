<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Título que redirige a la página principal -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @auth <!-- Verificar si el usuario está autenticado -->

        <div class="container d-flex text-center flex-column justify-content-center prueba">
            <div class="row contenedor-principal flex-row"> <!-- Añadimos la clase flex-row aquí -->
                <div class="col-12 col-md-3 border-end border-black-subtle order-md-1 border-sm-0 bg-white">
                    <div class="img-container">
                        <img src="img/logo2.png" alt="" class="img-fluid img-form d-block d-md-none">
                        <img src="img/logo1.png" alt="" class="img-fluid img-form d-none d-md-block">
                    </div>
                    <div class="d-md-block d-flex flex-md-column flex-row">
                        <a class="d-block mr-md-2 mb-2 mb-md-0 cbn" href="{{ route('home') }}"><img src="img/home.svg" alt=""> Home</a>
                        <a class="d-block mr-md-2 mb-2 mb-md-0 cbn" href="{{ route('articles.index') }}"><img src="img/arti.svg" alt=""> Artículos</a>
                        <a class="d-block mr-md-2 mb-2 mb-md-0 cbn" href="#"><img src="img/usurios.svg" alt=""> Bolsa de 
                        Empleo</a>
                        <a class="d-block mr-md-2 mb-2 mb-md-0 cbn" href="#"><img src="img/configuraciones.svg" alt=""> Configuraciones</a>
                    </div>                    
                </div>
                @endauth <!-- Fin de la verificación de autenticación -->
                <main class=" container @auth col-md-9 ms-md-auto col-lg-9 px-md-4 order-md-2 @endauth">
                    <br><br>
                    @yield('content')
                </main>
            </div>
        </div>
        

</body>
</html>
