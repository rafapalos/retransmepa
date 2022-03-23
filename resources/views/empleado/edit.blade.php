@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar empleados</h2>
@stop

@section('content')
    <form action="/empleados/{{$empleado->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nº Empleado</label>
            <input id="numEmpleado" name="numEmpleado" type="text" class="form-control" value="{{$empleado->numEmpleado}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$empleado->nombre}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text" class="form-control" value="{{$empleado->apellidos}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">DNI</label>
            <input id="dni" name="dni" type="text" class="form-control" value="{{$empleado->dni}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha nacimiento</label>
            <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control" value="{{$empleado->fechaNacimiento}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" value="{{$empleado->estado}}">
                <option value="Activo" selected>Activo</option>
                <option value="Baja">Baja</option>
                <option value="Vacaciones">Vacaciones</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa" value="{{$empleado->empresa}}">
                <option value="GLS" selected>GLS</option>
                <option value="SEUR">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
                <option value="Todas">Todas</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cargo</label>
            <select class="form-control" id="cargo" name="cargo" value="{{$empleado->cargo}}">
                <option value="Repartidor">Repartidor</option>
                <option value="Administrativo">Administrativo</option>
                <option value="Gerente">Gerente</option>
            </select>
        </div>
        <a href="/empleados" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop