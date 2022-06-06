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
            <input id="matricula" name="matricula" type="text" maxLength="8" pattern="[0-9]{4}[-][A-Z]{3}" class="form-control" required>
            <p>La matricula debe tener el siguiente formato "0000-XXX"</p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" maxLength="15" pattern="[A-Za-z ]{1,15}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" maxLength="15" pattern="[A-Za-z0-9]{1,15}" class="form-control" required>
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
            <input id="precio" name="precio" type="number" step="any" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha de Limpieza</label>
            <input id="fechaLimpieza" name="fechaLimpieza" type="date" min="2022-01-01" max="2050-01-01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empleado a Asignar</label>
            <select class="form-control" id="empleadoAsignado" name="empleadoAsignado" required>
                @foreach ($empleadosLimpiezas as $empleadosLimpiezas)
                <option value="{{$empleadosLimpiezas->id}}-{{$empleadosLimpiezas->nombre}} {{$empleadosLimpiezas->apellidos}}">{{$empleadosLimpiezas->nombre}} {{$empleadosLimpiezas->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <a href="/limpiezas" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop