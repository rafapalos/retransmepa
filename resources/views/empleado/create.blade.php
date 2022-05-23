@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Empleados</h2>
@stop

@section('content')
    <form action="/empleados" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input id="id" name="id" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">DNI</label>
            <input id="dni" name="dni" type="text" class="form-control" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha nacimiento</label>
            <input id="fechaNacimiento" name="fechaNacimiento" type="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Activo" selected>Activo</option>
                <option value="Baja">Baja</option>
                <option value="Vacaciones">Vacaciones</option>
                <option value="Inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa" required>
                <option value="GLS" selected>GLS</option>
                <option value="SEUR">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
                <option value="LavadosExpress">LavadosExpress</option>
                <option value="Todas">Todas Transporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cargo</label>
            <select class="form-control" id="cargo" name="cargo" required>
                <option value="Limpiador">Limpiador</option>
                <option value="Repartidor" selected>Repartidor</option>
                <option value="Administrativo">Administrativo</option>
            </select>
        </div>
        <a href="/empleados" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop