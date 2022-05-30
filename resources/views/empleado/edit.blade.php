@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar empleados</h2>
@stop

@section('content')
    <form action="/empleados/{{$empleado->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3" id="divID">
            <label for="" class="form-label">ID</label>
            <input id="id" name="id" type="text" class="form-control" value="{{$empleado->id}}">
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
            <select class="form-control" id="estado" name="estado">
                <option value="{{$empleado->estado}}"></option>
                <option value="Activo">Activo</option>
                <option value="Baja">Baja</option>
                <option value="Vacaciones">Vacaciones</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                <option value="{{$empleado->empresa}}"></option>
                <option value="GLS">GLS</option>
                <option value="SEUR">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
                <option value="LavadosExpress">LavadosExpress</option>
                <option value="Todas">Todas Transporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cargo</label>
            <select class="form-control" id="cargo" name="cargo">
                <option value="{{$empleado->cargo}}"></option>
                <option value="Limpiador">Limpiador</option>
                <option value="Repartidor">Repartidor</option>
                <option value="Administrativo">Administrativo</option>
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
<script>
    $('#divID').hide();
</script>
@stop