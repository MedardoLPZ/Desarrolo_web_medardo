<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: rgb(220, 220, 220);
        }
        .container2 {
            background-color: #ffffff; 
            border: 2px solid #a6a6a6; 
            border-radius: 10px; 
            padding: 20px; /* Añadir un poco de relleno */
            max-width: 90%;
            margin: auto; 
            margin-top: 20px; 
            margin-bottom: 20px; 
        }
        .custom-button {
            margin-bottom: 10px;
            font-size: 18px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .article-img {
            max-width: 200px; 
            height: auto;
            margin: 0; 
        }
    </style>
</head>
<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- "Inicio", "Artículos" y "Acerca de" a la izquierda -->
            <a class="navbar-brand" href="#">Inicio</a>
            <a class="navbar-brand" href="#">Artículos</a>
            <a class="navbar-brand" href="#">Acerca de</a>
            <!-- Botón para colapsar en dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- "Iniciar sesión" y "Registrarse" a la derecha -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link">Inicio</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container2 my-4"> 
        <div class="row justify-content-center">
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://picsum.photos/200?article={{ $article->id }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, 100, $end='...') }}</p>
                            <a href="{{ route('articles.show', ['id' => $article->id]) }}" class="btn btn-primary">Seguir Leyendo</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización {{ $article->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
