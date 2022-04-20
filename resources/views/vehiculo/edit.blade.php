@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar Vehiculos</h2>
@stop

@section('content')
    <form action="/vehiculos/{{$vehiculo->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nº Vehiculo</label>
            <input id="numVehiculo" name="numVehiculo" type="text" class="form-control" value="{{$vehiculo->numVehiculo}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{$vehiculo->marca}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" value="{{$vehiculo->modelo}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" class="form-control" value="{{$vehiculo->matricula}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                <option value="{{$vehiculo->empresa}}"></option>
                <option value="GLS">GLS</option>
                <option value="SEUR">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="{{$vehiculo->estado}}"></option>
                <option value="Activo">Activo</option>
                <option value="Parado">Parado</option>
                <option value="Taller">Taller</option>
            </select>
        </div>
        <a href="/vehiculos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop