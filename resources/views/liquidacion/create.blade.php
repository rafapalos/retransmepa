@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Liquidación</h2>
@stop

@section('content')
    <form action="/liquidaciones" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nº Repartidor</label>
            <input id="numRepartidor" name="numRepartidor" type="number" min="0" max="9999" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Entregas</label>
            <input id="entregas" name="entregas" type="number" min="1" max="300" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Recojidas</label>
            <input id="recojidas" name="recojidas" type="number" min="0" max="300" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Incidencias</label>
            <input id="incidencias" name="incidencias" type="number" min="0" max="300" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dia trabajado</label>
            <select class="form-control" id="diaTrabajado" name="diaTrabajado">
                <option value="Dia Completo">Dia Completo</option>
                <option value="Festivo">Festivo</option>
                <option value="Normal">Normal</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal Repartido</label>
            <select class="form-control" id="codPostal" name="codPostal">
                <option value="41930">41930</option>
                <option value="41927">41927</option>
                <option value="41940">41940</option>
            </select>
        </div>
        <a href="/liquidaciones" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop