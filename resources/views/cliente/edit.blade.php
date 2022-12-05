@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar Cliente</h2>
@stop

@section('content')
    <form action="/clientes/{{$cliente->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre del Cliente</label>
            <input id="nombreCliente" name="nombreCliente" type="text" class="form-control" value="{{$cliente->nombreCliente}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" maxLength="8" pattern="[0-9]{4}[-][A-Z]{3}" title="La matricula debe tener el siguiente formato '0000-XXX'" class="form-control" value="{{$cliente->matricula}}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{$cliente->marca}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" value="{{$cliente->modelo}}" required>
        </div>
        <a href="/clientes" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
