@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Incidencia</h2>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <option value="">Seleccionar opción</option>
                @foreach ($empleadosIncidenciasTransporte as $empleadosIncidenciasTransporte)
                <option class="optionTransporte" value="{{$empleadosIncidenciasTransporte->id}}-{{$empleadosIncidenciasTransporte->nombre}} {{$empleadosIncidenciasTransporte->apellidos}}">{{$empleadosIncidenciasTransporte->nombre}} {{$empleadosIncidenciasTransporte->apellidos}}</option>
                @endforeach
                @foreach ($empleadosIncidenciasLavadero as $empleadosIncidenciasLavadero)
                <option class="optionLavadero" value="{{$empleadosIncidenciasLavadero->id}}-{{$empleadosIncidenciasLavadero->nombre}} {{$empleadosIncidenciasLavadero->apellidos}}">{{$empleadosIncidenciasLavadero->nombre}} {{$empleadosIncidenciasLavadero->apellidos}}</option>
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
            <input id="fecha" name="fecha" type="date" class="form-control" required> 
        </div>
        <a href="/incidencias" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#nombreEmpleado').select2({
            language: "es",
            theme: "classic",
            width: '100%'
        });

        let Actual = new Date();
        let mesActual = Actual.getMonth();
        let anioActual = Actual.getFullYear();
        let ultimoDia = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate();
        let min = anioActual+'-'+mesActual+'-'+'01';
        let max = anioActual+'-'+mesActual+'-'+ultimoDia;

        $("#fecha").attr("min", min);
        $("#fecha").attr("max", max);

    });

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