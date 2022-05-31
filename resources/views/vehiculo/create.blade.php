@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Vehiculo</h2>
@stop

@section('content')
    <form action="/vehiculos" id="formVehiculos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input id="id" name="id" type="text" class="form-control" value="{{old('id')}}" required>
            @if ($errors->has('id'))
                <span class="error text-danger" for="input-id">El id ya está registrado anteriormente</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{old('marca')}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" value="{{old('modelo')}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" pattern="[0-9]{4}[-][A-Z]{3}" value="{{old('matricula')}}" class="form-control" required>
            <span class="validity"></span>
            <p>La matricula debe tener el siguiente formato "0000-XXX"</p>
            @if ($errors->has('matricula'))
                <span class="error text-danger" for="input-matricula">La matricula ya está registrada anteriormente</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa" required>
                <option class="optionValueEmpresa" value="{{old('empresa')}}">{{old('empresa')}}</option>
                <option class="optionGLS" value="GLS">GLS</option>
                <option class="optionSEUR" value="SEUR">SEUR</option>
                <option class="optionCorreosExpress" value="CorreosExpress">CorreosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado"  required>
                <option class="optionValueEstado" value="{{old('estado')}}">{{old('estado')}}</option>
                <option class="optionActivo" value="Activo">Activo</option>
                <option class="optionParado" value="Parado">Parado</option>
                <option class="optionTaller" value="Taller">Taller</option>
            </select>
        </div>
        <div class="mb-3" id="divPropiedad">
            <label for="" class="form-label">Propiedad</label>
            <select class="form-control" id="propiedad" name="propiedad" required>
                <option class="optionValuePropiedad" value="{{old('propiedad')}}">{{old('propiedad')}}</option>
                <option class="optionRetransmepa" value="Retransmepa">Retransmepa</option>
                <option class="optionAlquiler" value="Alquiler">Alquiler</option>
            </select>
        </div>
        <div class="mb-3" id="divAlquiler">
            <label for="" class="form-label">Alquiler</label>
            <select class="form-control" id="alquiler" name="alquiler">
                <option class="optionValueAlquiler" value="{{old('alquiler')}}">{{old('alquiler')}}</option>
                <option class="optionNorthgate" value="Northgate">Northgate</option>
                <option class="optionPinveco" value="Pinveco">Pinveco</option>
                <option class="optionEnterprise" value="Enterprise">Enterprise</option>
                <option class="optionLogicar" value="Logicar">Logicar</option>
            </select>
        </div>
        <div class="mb-3" id="divFechaAlquilerDesde">
            <label for="" class="form-label">Fecha Desde Alquiler</label>
            <input id="fechaAlquilerDesde" name="fechaAlquilerDesde" value="{{old('fechaAlquilerDesde')}}" type="date" class="form-control" min="2020-01-01">
        </div>
        <div class="mb-3" id="divFechaAlquilerHasta">
            <label for="" class="form-label">Fecha Hasta Alquiler</label>
            <input id="fechaAlquilerHasta" name="fechaAlquilerHasta" value="{{old('fechaAlquilerHasta')}}" type="date" class="form-control" min="2020-01-01">
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

    // SELECT ESTADO
    var optionEstado = $('.optionValueEstado').val();

    if (optionEstado == 'Activo') {
        $('.optionActivo').hide();
        $('.optionParado').show();
        $('.optionTaller').show();
    } else if (optionEstado == 'Parado') {
        $('.optionActivo').show();
        $('.optionParado').hide();
        $('.optionTaller').show();
    } else if (optionEstado == 'Taller') {
        $('.optionActivo').show();
        $('.optionParado').show();
        $('.optionTaller').hide();
    }

    // SELECT EMPRESA
    var optionEmpresa = $('.optionValueEmpresa').val();

    if (optionEmpresa == 'GLS') {
        $('.optionGLS').hide();
        $('.optionSEUR').show();
        $('.optionCorreosExpress').show();
    } else if (optionEmpresa == 'SEUR') {
        $('.optionGLS').show();
        $('.optionSEUR').hide();
        $('.optionCorreosExpress').show();
    } else if (optionEmpresa == 'CorreosExpress') {
        $('.optionGLS').show();
        $('.optionSEUR').show();
        $('.optionCorreosExpress').hide();
    }

    // SELECT PROPIEDAD
    var optionPropiedad = $('.optionValuePropiedad').val();

    if (optionPropiedad == 'Retransmepa') {
        $('.optionRetransmepa').hide();
        $('.optionAlquiler').show();
    } else if (optionPropiedad == 'Alquiler') {
        $('.optionRetransmepa').show();
        $('.optionAlquiler').hide();
        $('#divAlquiler, #divFechaAlquilerDesde, #divFechaAlquilerHasta').show();
        $('#alquiler, #fechaAlquilerDesde, #fechaAlquilerHasta').attr('required', true);
    }

    // SELECT ALQUILER
    var optionAlquiler = $('.optionValueAlquiler').val();

    if (optionAlquiler == 'Northgate') {
        $('.optionNorthgate').hide();
        $('.optionPinveco').show();
        $('.optionEnterprise').show();
        $('.optionLogicar').show();
    } else if (optionAlquiler == 'Pinveco') {
        $('.optionNorthgate').show();
        $('.optionPinveco').hide();
        $('.optionEnterprise').show();
        $('.optionLogicar').show();
    } else if (optionAlquiler == 'Enterprise') {
        $('.optionNorthgate').show();
        $('.optionPinveco').show();
        $('.optionEnterprise').hide();
        $('.optionLogicar').show();
    } else if (optionAlquiler == 'Logicar') {
        $('.optionNorthgate').show();
        $('.optionPinveco').show();
        $('.optionEnterprise').hide();
        $('.optionLogicar').hide();
    }
</script>
@stop