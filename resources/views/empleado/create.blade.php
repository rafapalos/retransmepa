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
            <label for="" class="form-label">DNI</label>
            <input id="dni" name="dni" type="text" value="{{old('dni')}}" class="form-control" pattern="[0-9]{8}[A-Z]{1}" title="Debe poner 8 números y una letra en mayúsculas" required>
            @if ($errors->has('dni'))
                <span class="error text-danger" for="input-dni">El dni ya está registrado anteriormente</span>
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
                <option class="optionRepartidor" value="Repartidor" selected>Repartidor</option>
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
</script>
@stop