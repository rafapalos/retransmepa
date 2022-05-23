@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Vehiculo</h2>
@stop

@section('content')
    <form action="/vehiculos" id="formVehiculos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" pattern="[0-9]{4}[-][A-Z]{3}" class="form-control" required>
            <span class="validity"></span>
            <p>La matricula debe tener el siguiente formato "0000-XXX"</p>
            @if ($errors->has('matricula'))
                <span class="error text-danger" for="input-matricula">La matricula ya está registrada anteriormente</span>
                <!-- {{ $errors->first('matricula') }} -->
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa" required>
                <option value="GLS" selected>GLS</option>
                <option value="Seur">SEUR</option>
                <option value="CorreosExpress">CorreosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Activo" selected>Activo</option>
                <option value="Parado">Parado</option>
                <option value="Taller">Taller</option>
            </select>
        </div>
        <div class="mb-3" id="divPropiedad">
            <label for="" class="form-label">Propiedad</label>
            <select class="form-control" id="propiedad" name="propiedad" required>
                <option value=""></option>
                <option value="Retransmepa" selected>Retransmepa</option>
                <option value="Alquiler">Alquiler</option>
            </select>
        </div>
        <div class="mb-3" id="divAlquiler">
            <label for="" class="form-label">Alquiler</label>
            <select class="form-control" id="alquiler" name="alquiler">
                <option value="" selected></option>
                <option value="Northgate">Northgate</option>
                <option value="Pinveco">Pinveco</option>
                <option value="Enterprise">Enterprise</option>
                <option value="Logicar">Logicar</option>
            </select>
        </div>
        <div class="mb-3" id="divFechaAlquilerDesde">
            <label for="" class="form-label">Fecha Desde Alquiler</label>
            <input id="fechaAlquilerDesde" name="fechaAlquilerDesde" type="date" class="form-control" min="2020-01-01">
        </div>
        <div class="mb-3" id="divFechaAlquilerHasta">
            <label for="" class="form-label">Fecha Hasta Alquiler</label>
            <input id="fechaAlquilerHasta" name="fechaAlquilerHasta" type="date" class="form-control" min="2020-01-01">
        </div>
        <a href="/vehiculos" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
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
        } else if ($("#propiedad").val() == "") {
            $('#divAlquiler, #divFechaAlquilerDesde, #divFechaAlquilerHasta').hide();
            $('#alquiler, #fechaAlquilerDesde, #fechaAlquilerHasta').removeAttr('required', true);
            $('#alquiler').val('');
            $('#fechaAlquilerDesde').val('');
            $('#fechaAlquilerHasta').val('');
        }
    });

    $('#matricula').keyup(function(){
        var matricula = $('#matricula').val();
        console.log(matricula);

    });
</script>
@stop