<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://picsum.photos/1600/900'); /* URL de la imagen de fondo */
            background-size: cover; /* Cubrir toda el área */
            background-repeat: no-repeat; /* No repetir la imagen */
            background-attachment: fixed; /* Fijar la imagen de fondo */
            background-position: center; /* Centrar la imagen */
        }

        .container2 {
            background-color: rgba(255, 255, 255, 0.7); /* Agregar opacidad al contenedor */
            border: 2px solid #a6a6a6;
            border-radius: 10px;
            padding: 20px; /* Añadir padding */
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

        /* Estilos para los datos del artículo */
        .article-details {
            font-size: 18px;
            margin-top: 20px; /* Añadir margen superior */
        }

        .article-details p {
            margin-bottom: 10px; /* Añadir margen inferior */
        }
    </style>
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- "Inicio", "Artículos" y "Acerca de" a la izquierda -->
        <a class="navbar-brand" href="/">Inicio</a>
        <a class="navbar-brand" href="#">Artículos</a>
        <a class="navbar-brand" href="#">Acerca de</a>
        <!-- Botón para colapsar en dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- "Log in" y "Register" a la derecha -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container2 mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($article)
                        <div class="article">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 style="font-weight: bold; text-align: center;">{{ $article->title }}</h2>
                                </div>
                                <hr><br>
                                <div class="col-md-12">
                                    <div class="container">
                                        <p style="text-align: justify; font-size: 18px;">
                                            {{ $article->content }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-12 article-details ">
                                    <div class="container">
                                        <p><strong>Autor:</strong> {{ $article->author }}</p>
                                        <p><strong>Categoría:</strong> {{ $article->category->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <br><br> <!-- Salto de línea -->
                            <!-- Botones de compartir -->
                            <div class="row justify-content-center">
                                <div class="col-md-6 text-center">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                                       class="btn btn-primary" target="_blank"> Facebook</a>
                                </div>
                                <div class="col-md-6 text-center">
                                    <a href="whatsapp://send?text={{ urlencode(Request::fullUrl()) }}"
                                       class="btn btn-success" target="_blank"> WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>No se encontró el artículo.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js
