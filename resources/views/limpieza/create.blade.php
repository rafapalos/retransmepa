@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Limpieza</h2>
@stop

@section('content')
    <form action="/limpiezas" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre del Cliente</label>
            <input id="nombreCliente" name="nombreCliente" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Lavado</label>
            <select class="form-control" id="tipoLavado" name="tipoLavado" required>
                <option value="Básico">Básico</option>
                <option value="Integral Tapicería">Integral Tapicería</option>
                <option value="Integral Reestreno">Integral Reestreno</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Coche</label>
            <select class="form-control" id="tipoCoche" name="tipoCoche" required>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha de Limpieza</label>
            <input id="fechaLimpieza" name="fechaLimpieza" type="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empleado a Asignar</label>
            <select class="form-control" id="empleadoAsignado" name="empleadoAsignado" required>
                <option value="Jose Torre de la Reina">Jose Torre de la Reina</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        <a href="/limpiezas" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop