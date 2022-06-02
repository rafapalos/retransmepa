@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content')
<div class="card">
    <div class="card-header ">Retransmepa S.L</div>
    <div class="card-body mb-2">
        <h5 class="card-title">Una empresa dedicada al transporte y lavados de vehículos.</h5>
        <p class="card-text">Para contactar con GLS Bormujos puedes visitar este <a href="https://gls-bormujos.negocio.site/" class="underline">enlace.</a></p>
        <p class="card-text">Para contactar con Lavados Express Bormujos estamos en el Polígono Almargen, C/ Manzanilla, nave 3-3, Bormujos 41930 o por teléfono 854 60 28 27 y si lo prefiere a través de Whassap al 640 14 49 93.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="card-body map-responsive mb-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.919308583663!2d-6.0731654843704135!3d37.36808614322545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd121397bbc8b3cd%3A0xcc9fdc04b5eceb38!2sLavados%20express%20Bormujos!5e0!3m2!1ses!2ses!4v1651054472558!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<style>
    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 0;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
</style>
@stop