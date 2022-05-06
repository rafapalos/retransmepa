@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content')
    <!-- <div class="card">
        <div class="card-header">
            <h1 class="card-title">Retransmepa S.L</h1>
        </div>

        <div class="card-body">
            <p>Una empresa dedicada al transporte y lavado de vehículos.</p>
        </div>

        <div class="card-body">
            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    Para contactar con GLS Bormujos puedes visitar este <a href="https://gls-bormujos.negocio.site/" class="underline">enlace.</a>
                </div>
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    Para contactar con Lavados Express Bormujos estamos en el Polígono Almargen, C/ Manzanilla, nave 3-3, Bormujos 41930 o por teléfono 854 60 28 27 y si lo prefiere a través de Whassap al 640 14 49 93.
                </div>
            </div>
        </div>
    </div>
  -->
    <div class="card">
        <div class="card-header">Retransmepa S.L</div>
        <div class="card-body">
            <h5 class="card-title">Una empresa dedicada al transporte y lavados de vehículos.</h5>
            <p class="card-text">Para contactar con GLS Bormujos puedes visitar este <a href="https://gls-bormujos.negocio.site/" class="underline">enlace.</a></p>
            <p class="card-text">Para contactar con Lavados Express Bormujos estamos en el Polígono Almargen, C/ Manzanilla, nave 3-3, Bormujos 41930 o por teléfono 854 60 28 27 y si lo prefiere a través de Whassap al 640 14 49 93.</p>
        </div>
        <div class="card-body maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.919308583663!2d-6.0731654843704135!3d37.36808614322545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd121397bbc8b3cd%3A0xcc9fdc04b5eceb38!2sLavados%20express%20Bormujos!5e0!3m2!1ses!2ses!4v1651054472558!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custon.css">
    <style>
        .maps {
            text-align: center
        }
    </style>
@stop 
