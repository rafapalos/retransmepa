@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Delegación</h2>
@stop

@section('content')
<form action="/delegaciones" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre de la Empresa</label>
        <input id="nombreEmpresa" name="nombreEmpresa" type="text" value="{{old('nombreEmpresa')}}" maxLength="30" class="form-control" required>
        @if ($errors->has('nombreEmpresa'))
                <span class="error text-danger" for="input-nombreEmpresa">El nombre de la empresa ya está registrado anteriormente</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Localidad</label>
        <input id="localidad" name="localidad" type="text" value="{{old('localidad')}}" maxLength="25" pattern="[A-Za-z ]{1,25}" class="form-control" required>
    </div>
    <a href="/delegaciones" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@stop