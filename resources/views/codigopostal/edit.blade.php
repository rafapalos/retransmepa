@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar Código Postal</h2>
@stop

@section('content')
    <form action="/codigopostales/{{$codigopostal->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Localidad</label>
            <input id="localidad" name="localidad" type="text" class="form-control" value="{{$codigopostal->localidad}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Municipio</label>
            <input id="municipio" name="municipio" type="text" class="form-control" value="{{$codigopostal->municipio}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal</label>
            <input id="codigopostal" name="codigopostal" type="text" value="{{$codigopostal->codigoPostal}}" class="form-control" readonly>
        </div>
        <a href="/codigopostales" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
  