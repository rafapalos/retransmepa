@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Detalles de la cita</h1>
@stop

@section('content')
<html>
  <head>
    <title></title>
    <meta content="">
  
  </head>
  <body>

    <div class="container">
      <div style="height:50px"></div>
      <p class="lead">
      <a class="btn btn-primary"  href="{{ asset('/Evento/index') }}">Ir a calendario</a>
      <hr>

      <div class="col-md-6">
        <form action="{{ asset('/Evento/create/') }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$event->nombre}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" class="form-control" value="{{$event->matricula}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{$event->marca}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" value="{{$event->modelo}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" value="{{$event->fecha}}" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Hora</label>
            <input id="hora" name="hora" type="time" class="form-control" value="{{$event->hora}}" disabled>
        </div>
          @csrf
          <!-- <a href = 'update/{{$event->nombre}}/{{$event->matricula}}/{{$event->marca}}/{{$event->modelo}}/{{$event->fecha}}/{{$event->hora}}' class="btn btn-success">Guardar</a> -->
          @method('DELETE')
          <a href = 'delete/{{$event->nombre}}/{{$event->matricula}}/{{$event->marca}}/{{$event->modelo}}/{{$event->fecha}}/{{$event->hora}}' class="btn btn-danger">Borrar</a>
        </form>
      </div>

    </div>

  </body>
</html>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body{
      font-family: 'Exo', sans-serif;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>
@stop