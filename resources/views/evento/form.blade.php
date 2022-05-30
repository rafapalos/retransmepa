@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Formulario de citas</h1>
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
      <a class="btn btn-primary"  href="{{ asset('/Evento/index') }}">Ir al calendario</a>
      <hr>

      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
       </div>
       @endif

      <div class="col-md-6">
        <form action="{{ asset('/Evento/create/') }}" method="post">
          @csrf
          <div class="fomr-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre">
          </div>
          <div class="fomr-group">
            <label>Matricula</label>
            <input type="text" class="form-control" name="matricula">
          </div>
          <div class="fomr-group">
            <label>Marca</label>
            <input type="text" class="form-control" name="marca">
          </div>
          <div class="fomr-group">
            <label>Modelo</label>
            <input type="text" class="form-control" name="modelo">
          </div>
          <div class="fomr-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha">
          </div>
          <div class="fomr-group">
            <label>Hora</label>
            <input type="time" min="06:00" max="22:00" class="form-control" name="hora">
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
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

