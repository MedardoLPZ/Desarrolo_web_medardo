<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($article) ? 'Editar Artículo' : 'Crear Artículo' }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    
    <div class="container pt-5 ">
        <form id="article-form" action="{{ isset($article) ? route('articles.update', $article->id) : route('articles.store') }}" method="POST" novalidate>
            @csrf
            @if(isset($article))
                @method('PUT')
            @endif
            <div class="card">
                <div class="card-header h1 text">{{ isset($article) ? __('Editar Artículo') : __('Crear Artículo') }}</div>
                <div class="container ">
                    <div class="form-group mb-4 mt-5">
                        <label for="title">Título del Artículo</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ isset($article) ? $article->title : '' }}" required>
                        <div class="invalid-feedback">Por favor ingresa el título del artículo.</div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="content">Contenido del Artículo</label>
                        <textarea class="form-control" id="content" name="content" required>{{ isset($article) ? $article->content : '' }}</textarea>
                        <div class="invalid-feedback">Por favor ingresa el contenido del artículo.</div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="author">Autor del Artículo</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ isset($article) ? $article->author : '' }}" required>
                        <div class="invalid-feedback">Por favor ingresa el autor del artículo.</div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="category_id">Categoría</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ isset($article) && $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Por favor selecciona la categoría del artículo.</div>
                    </div>
                </div>
                <div class="card-footer text-muted py-4">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-auto">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-secondary p-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                        <path fill="#fff" d="M6.742 1.473a1.13 1.13 0 0 1 2.516 0l6.742 12.5A1.13 1.13 0 0 1 15.123 16H.877a1.13 1.13 0 0 1-.877-1.027L6.742 1.473z"/>
                                        <path fill="#fff" d="M7.997 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm0-8.5a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0v-5z"/>
                                    </svg>
                                </div>                                
                                <p class="mb-0 ms-2">Recuerde siempre guardar los datos</p>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancelar</button>
                            <button type="submit" id="submit-btn" class="btn btn-primary">{{ isset($article) ? 'Actualizar' : 'Guardar' }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>

    <!-- Modal de confirmación de cancelar -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Confirmar Cancelación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cancelar? Los datos no guardados se perderán.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="{{ route('articles.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('article-form');
            var inputFields = form.querySelectorAll('.form-control');
            
            inputFields.forEach(function(field) {
                field.addEventListener('input', function() {
                    if (field.checkValidity()) {
                        field.classList.remove('is-invalid');
                    }
                });
            });
            
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    // Mostrar mensajes de error debajo de los campos inválidos
                    var invalidFields = form.querySelectorAll(':invalid');
                    invalidFields.forEach(function(field) {
                        field.classList.add('is-invalid');
                    });
                }
                
                form.classList.add('was-validated');
            });
        });
    </script>
</body>
</html>
