@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Incidencia</h2>
@stop

@section('content')
    <form action="/incidencias/{{$incidencia->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre de Empleado</label>
            <input id="nombreEmpleado" name="nombreEmpleado" type="text" class="form-control" value="{{$incidencia->nombreEmpleado}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sector</label>
            <select class="form-control" id="sector" name="sector" value="{{$incidencia->sector}}">
                <option value="Transporte">Transporte</option>
                <option value="Lavadero">Lavadero</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$incidencia->descripcion}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" value="{{$incidencia->estado}}">
                <option value="Pendiente">Pendiente</option>
                <option value="Solucionado">Solucionado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sanción</label>
            <input id="sancion" name="sancion" type="number" min="0" max="10000" class="form-control" value="{{$incidencia->sancion}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" value="{{$incidencia->fecha}}">
        </div>
        <a href="/incidencias" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop