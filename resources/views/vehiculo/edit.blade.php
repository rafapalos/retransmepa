@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar Vehiculos</h2>
@stop

@section('content')
    <form action="/vehiculos/{{$vehiculo->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nº Vehiculo</label>
            <input id="numVehiculo" name="numVehiculo" type="text" class="form-control" value="{{$vehiculo->numVehiculo}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{$vehiculo->marca}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" value="{{$vehiculo->modelo}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" class="form-control" value="{{$vehiculo->matricula}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa">
                <option value="{{$vehiculo->empresa}}"></option>
                <option value="GLS">GLS</option>
                <option value="SEUR">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado">
                <option value="{{$vehiculo->estado}}"></option>
                <option value="Activo">Activo</option>
                <option value="Parado">Parado</option>
                <option value="Taller">Taller</option>
            </select>
        </div>
        <div class="mb-3" id="divPropiedad">
            <label for="" class="form-label">Propiedad</label>
            <select class="form-control" id="propiedad" name="propiedad" required>
                <option value="{{$vehiculo->propiedad}}"></option>
                <option value="Retransmepa">Retransmepa</option>
                <option value="Alquiler">Alquiler</option>
            </select>
        </div>
        <div class="mb-3" id="divAlquiler">
            <label for="" class="form-label">Alquiler</label>
            <select class="form-control" id="alquiler" name="alquiler">
                <option value="{{$vehiculo->alquiler}}"></option>
                <option value="Northgate">Northgate</option>
                <option value="Pinveco">Pinveco</option>
                <option value="Enterprise">Enterprise</option>
                <option value="Logicar">Logicar</option>
            </select>
        </div>
        <div class="mb-3" id="divFechaAlquilerDesde">
            <label for="" class="form-label">Fecha Desde Alquiler</label>
            <input id="fechaAlquilerDesde" name="fechaAlquilerDesde" type="date" class="form-control" min="2020-01-01" value="{{$vehiculo->fechaAlquilerDesde}}">
        </div>
        <div class="mb-3" id="divFechaAlquilerHasta">
            <label for="" class="form-label">Fecha Hasta Alquiler</label>
            <input id="fechaAlquilerHasta" name="fechaAlquilerHasta" type="date" class="form-control" min="2020-01-01" value="{{$vehiculo->fechaAlquilerHasta}}">
        </div>
        <a href="/vehiculos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $('#divAlquiler').hide();
    $('#divFechaAlquilerDesde').hide();
    $('#divFechaAlquilerHasta').hide();

	// Propiedad
	$(document).off('change', '#propiedad').on('change', '#propiedad', function() {
        if ($("#propiedad").val() == "Retransmepa") {
            $('#divAlquiler, #divFechaAlquilerDesde, #divFechaAlquilerHasta').hide();
            $('#alquiler, #fechaAlquilerDesde, #fechaAlquilerHasta').removeAttr('required', true);
            $('#alquiler').val('Null');
            $('#fechaAlquilerDesde').val('Null');
            $('#fechaAlquilerHasta').val('Null');
        } else if ($("#propiedad").val() == "Alquiler") {
            $('#divAlquiler, #divFechaAlquilerDesde, #divFechaAlquilerHasta').show();
            $('#alquiler, #fechaAlquilerDesde, #fechaAlquilerHasta').attr('required', true);
        } else if ($("#propiedad").val() == "Null") {
            $('#divAlquiler, #divFechaAlquilerDesde, #divFechaAlquilerHasta').hide();
            $('#alquiler, #fechaAlquilerDesde, #fechaAlquilerHasta').removeAttr('required', true);
            $('#alquiler').val('');
            $('#fechaAlquilerDesde').val('');
            $('#fechaAlquilerHasta').val('');
        }
    });

</script>
@stop