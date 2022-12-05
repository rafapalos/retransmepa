@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Cliente</h2>
@stop

@section('content')
    <form action="/clientes" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre del Cliente</label>
            <input id="nombreCliente" name="nombreCliente" type="text" value="{{old('nombreCliente')}}" maxLength="30" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" value="{{old('matricula')}}"name="matricula" type="text" maxLength="8" pattern="[0-9]{4}[-][A-Z]{3}" title="La matricula debe tener el siguiente formato '0000-XXX'" class="form-control" required>
            @if ($errors->has('matricula'))
                <span class="error text-danger" for="input-matricula">La matricula ya está registrado anteriormente</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" value="{{old('marca')}}" maxLength="15" pattern="[A-Za-z ]{1,15}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" maxLength="15" value="{{old('modelo')}}" pattern="[A-Za-z0-9]{1,15}" class="form-control" required>
        </div>
        <a href="/clientes" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop