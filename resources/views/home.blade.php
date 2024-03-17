@extends('layouts.app')


@section('content')
<div class="segundo-contendor">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h1 text">{{ __('Resumen') }}</div>
                <div class="container">
                    <div class="contenedor-secundario">
                        <br>
                        <div class="row grid gap-3 gap-md-0">
                            <div class="col-12 col-md-6 col-lg-3 container">
                                <article class="bg-success text-white rounded-3 container mb-md-3">
                                    <p>Usuarios Activos</p>
                                    <div class="d-flex align-items-center justify-content-around container">
                                        <p class="me-2 h3">3</p>
                                        <img src="/img/personas.svg" alt="">
                                    </div>
                                    <br>
                                </article>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 container">
                                <article class="bg-secondary text-white rounded-3 container mb-md-3">
                                    <p>Articulos Activos</p>
                                    <div class="d-flex align-items-center justify-content-around container">
                                        <p class="me-2 h3">3</p>
                                        <p><img src="img/articulos.svg" alt=""></p>
                                    </div>
                                    <br>
                                </article>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 ">
                                <article class="bg-info text-white rounded-3 container mb-md-3">
                                    <p>Autores</p>
                                    <div class="d-flex align-items-center justify-content-around container">
                                        <p class="me-2 h3">7</p>
                                        <p><img src="img/autor.svg" alt=""></p>
                                    </div>
                                    <br>
                                </article>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 ">
                                <article class="bg-warning text-white rounded-3 container mb-md-3">
                                    <p>Autores</p>
                                    <div class="d-flex align-items-center justify-content-around">
                                        <p class="me-2 h3">10</p>
                                        <p><img src="img/editores.svg" alt=""></p>
                                    </div>
                                    <br>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 