@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar Delegación</h2>
@stop

@section('content')
    <form action="/delegaciones/{{$delegacion->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre de la Empresa</label>
            <input id="nombreEmpresa" name="nombreEmpresa" type="text" class="form-control" value="{{$delegacion->nombreEmpresa}}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Localidad</label>
            <input id="localidad" name="localidad" type="text" class="form-control" value="{{$delegacion->localidad}}" required>
        </div>
        <a href="/delegaciones" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
