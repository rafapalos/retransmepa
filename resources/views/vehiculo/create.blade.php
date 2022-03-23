@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Vehiculo</h2>
@stop

@section('content')
    <form action="/vehiculos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nº Vehiculo</label>
            <input id="numVehiculo" name="numVehiculo" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                <option value="GLS" selected>GLS</option>
                <option value="Seur">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="Activo" selected>Activo</option>
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