@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Empleados</h2>
@stop

@section('content')
    <form action="/empleados" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{old('nombre')}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text" class="form-control" value="{{old('apellidos')}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo Documento</label>
            <select class="form-control" id="documento" name="documento" required>
                <option class="optionValueDocumento" value="{{old('documento')}}">{{old('documento')}}</option>
                <option class="optionDNI" value="DNI">DNI</option>
                <option class="optionPasaporte" value="Pasaporte">Pasaporte</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nº Documento</label>
            <input id="num_documento" name="num_documento" type="text" value="{{old('num_documento')}}" class="form-control" required>
            @if ($errors->has('num_documento'))
                <span class="error text-danger" for="input-num_documento">El documento ya está registrado anteriormente</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha nacimiento</label>
            <input id="fechaNacimiento" name="fechaNacimiento" value="{{old('fechaNacimiento')}}" min="1950-01-01" max="2050-01-01" type="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option class="optionValueEstado" value="{{old('estado')}}">{{old('estado')}}</option>
                <option class="optionActivo" value="Activo">Activo</option>
                <option class="optionBaja" value="Baja">Baja</option>
                <option class="optionVacaciones" value="Vacaciones">Vacaciones</option>
                <option class="optionInactivo" value="Inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa" required>
                <option class="optionValueEmpresa" value="{{old('empresa')}}">{{old('empresa')}}</option>
                <option class="optionGLS" value="GLS">GLS</option>
                <option class="optionSEUR" value="SEUR">SEUR</option>
                <option class="optionCorreosExpress" value="CorreosExpress">CorreosExpress</option>
                <option class="optionLavadosExpress" value="LavadosExpress">LavadosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cargo</label>
            <select class="form-control" id="cargo" name="cargo" required>
                <option class="optionValueCargo" value="{{old('cargo')}}">{{old('cargo')}}</option>
                <option class="optionLimpiador" value="Limpiador">Limpiador</option>
                <option class="optionRepartidor" value="Repartidor">Repartidor</option>
                <option class="optionAdministrativo" value="Administrativo">Administrativo</option>
            </select>
        </div>
        <a href="/empleados" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
@section('js')
<script>
    $("#empresa").bind("change keyup", function(event){
        var empresa = $('#empresa').val();

        if (empresa == 'LavadosExpress') {
            $('#cargo').val('Limpiador');
        } else {
            $('#cargo').val('Repartidor');
        }
    });

    $("#cargo").bind("change keyup", function(event){
        var cargo = $('#cargo').val();

        if (cargo == 'Limpiador') {
            $('#empresa').val('LavadosExpress');
        } else {
            $('#empresa').val('GLS');
        }
    });

    // SELECT ESTADO
    var optionEstado = $('.optionValueEstado').val();

    if (optionEstado == 'Activo') {
        $('.optionActivo').hide();
        $('.optionBaja').show();
        $('.optionInactivo').show();
        $('.optionVacaciones').show();
    } else if (optionEstado == 'Baja') {
        $('.optionActivo').show();
        $('.optionBaja').hide();
        $('.optionInactivo').show();
        $('.optionVacaciones').show();
    } else if (optionEstado == 'Vacaciones') {
        $('.optionActivo').show();
        $('.optionBaja').show();
        $('.optionInactivo').show();
        $('.optionVacaciones').hide();
    } else if (optionEstado == 'Inactivo') {
        $('.optionActivo').show();
        $('.optionBaja').show();
        $('.optionInactivo').hide();
        $('.optionVacaciones').show();
    }

    // SELECT EMPRESA
    var optionEmpresa = $('.optionValueEmpresa').val();

    if (optionEmpresa == 'GLS') {
        $('.optionGLS').hide();
        $('.optionSEUR').show();
        $('.optionCorreosExpress').show();
        $('.optionLavadosExpress').show();
    } else if (optionEmpresa == 'SEUR') {
        $('.optionGLS').show();
        $('.optionSEUR').hide();
        $('.optionCorreosExpress').show();
        $('.optionLavadosExpress').show();
    } else if (optionEmpresa == 'CorreosExpress') {
        $('.optionGLS').show();
        $('.optionSEUR').show();
        $('.optionCorreosExpress').hide();
        $('.optionLavadosExpress').show();
    } else if (optionEmpresa == 'LavadosExpress') {
        $('.optionGLS').show();
        $('.optionSEUR').show();
        $('.optionCorreosExpress').show();
        $('.optionLavadosExpress').hide();
    }

    // SELECT EMPRESA
    var optionCargo = $('.optionValueCargo').val();

    if (optionCargo == 'Limpiador') {
        $('.optionLimpiador').hide();
        $('.optionRepartidor').show();
        $('.optionAdministrativo').show();
    } else if (optionCargo == 'Repartidor') {
        $('.optionLimpiador').show();
        $('.optionRepartidor').hide();
        $('.optionAdministrativo').show();
    } else if (optionCargo == 'Administrativo') {
        $('.optionLimpiador').show();
        $('.optionRepartidor').show();
        $('.optionAdministrativo').hide();
    }

    // DNI - PASAPORTE

    // var selectDniPasaporte = $('#dni_pasaporte').val();

    $("#documento").bind("change keyup", function(event){
        var selectDniPasaporte = $('#documento').val();

        if (selectDniPasaporte == 'DNI') {
            document.getElementById("num_documento").setAttribute("pattern", "[0-9]{8}[A-Z]{1}");
            document.getElementById("num_documento").setAttribute("title", "Debe poner 8 números y una letra en mayúsculas");
        } else if (selectDniPasaporte == 'Pasaporte') {
            document.getElementById("num_documento").setAttribute("pattern", "[A-Z]{1}[0-9]{8}");
            document.getElementById("num_documento").setAttribute("title", "Debe poner una letra en mayúsculas y 8 números");
        }
    });

    // SELECT DE DOCUMENTO
    var optionDocumento = $('.optionValueDocumento').val();

    if (optionDocumento == 'DNI') {
        $('.optionValueDocumento').hide();
        document.getElementById("num_documento").setAttribute("pattern", "[0-9]{8}[A-Z]{1}");
        document.getElementById("num_documento").setAttribute("title", "Debe poner 8 números y una letra en mayúsculas");
        $('.optionDNI').show();
        $('.optionPasaporte').show();
    } else if (optionDocumento == 'Pasaporte') {
        $('.optionValueDocumento').hide();
        document.getElementById("num_documento").setAttribute("pattern", "[A-Z]{1}[0-9]{8}");
        document.getElementById("num_documento").setAttribute("title", "Debe poner una letra en mayúsculas y 8 números");
        $('.optionDNI').show();
        $('.optionPasaporte').show();
    }
</script>
@stop