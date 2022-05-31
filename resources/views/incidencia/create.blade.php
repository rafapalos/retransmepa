@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Incidencia</h2>
@stop

@section('content')
    <form action="/incidencias" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Sector</label>
            <select class="form-control" id="sector" name="sector" required>
                <option value="Transporte">Transporte</option>
                <option value="Lavadero">Lavadero</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre de Empleado</label>
            <select class="form-control" id="nombreEmpleado" name="nombreEmpleado" required>
                <option value="" selected>Elije una opción</option>
                @foreach ($empleadosIncidenciasTransporte as $empleadosIncidenciasTransporte)
                <option class="optionTransporte" value="{{$empleadosIncidenciasTransporte->nombre}} {{$empleadosIncidenciasTransporte->apellidos}}">{{$empleadosIncidenciasTransporte->nombre}} {{$empleadosIncidenciasTransporte->apellidos}}</option>
                @endforeach
                @foreach ($empleadosIncidenciasLavadero as $empleadosIncidenciasLavadero)
                <option class="optionLavadero" value="{{$empleadosIncidenciasLavadero->nombre}} {{$empleadosIncidenciasLavadero->apellidos}}">{{$empleadosIncidenciasLavadero->nombre}} {{$empleadosIncidenciasLavadero->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Solucionado">Solucionado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sanción</label>
            <input id="sancion" name="sancion" type="number" min="0" max="10000" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" min="2022-01-01" max="2050-01-01" class="form-control" required> 
        </div>
        <a href="/incidencias" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('js')
<script>
    $('.optionLavadero').hide();

    $("#sector").bind("change keyup", function(event){
        var sector = $('#sector').val();

        if (sector == 'Transporte') {
            $('#nombreEmpleado').val('');
            $('.optionLavadero').hide();
            $('.optionTransporte').show();
        } else if (sector == 'Lavadero') {
            $('#nombreEmpleado').val('');
            $('.optionLavadero').show();
            $('.optionTransporte').hide();
        }
    });
</script>
@stop