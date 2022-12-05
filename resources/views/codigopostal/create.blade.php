@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Código Postal</h2>
@stop

@section('content')
    <form action="/codigopostales" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Localidad</label>
            <input id="localidad" name="localidad" type="text" class="form-control" maxLength="30" pattern="[A-Za-z ]{1,30}" value="{{old('localidad')}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Municipio</label>
            <input id="municipio" name="municipio" type="text" class="form-control" maxLength="30" pattern="[A-Za-z ]{1,30}" value="{{old('municipio')}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal</label>
            <input id="codigopostal" name="codigopostal" type="text" value="{{old('codigopostal')}}" maxLength="5" pattern="[0-9]{1,5}" class="form-control" required>
            @if ($errors->has('codigopostal'))
                <span class="error text-danger" for="input-codigopostal">El Código Postal ya está registrado anteriormente</span>
            @endif
        </div>
        <a href="/codigopostales" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop