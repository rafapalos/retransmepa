@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar empleados</h2>
@stop

@section('content')
    <form action="/empleados/{{$empleado->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3" id="divID">
            <label for="" class="form-label">ID</label>
            <input id="id" name="id" type="text" class="form-control" value="{{$empleado->id}}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$empleado->nombre}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellidos</label>
            <input id="apellidos" name="apellidos" type="text" class="form-control" value="{{$empleado->apellidos}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo Documento</label>
            <input id="documento" name="documento" type="text" class="form-control" value="{{$empleado->documento}}" readonly>
        </div>
        <div class="mb-3" id="divNumDocumento">
            <label for="" class="form-label">Nº Documento</label> 
            <input id="num_documento" name="num_documento" type="text" class="form-control" value="{{$empleado->num_documento}}" readonly>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha nacimiento</label>
            <input id="fechaNacimiento" name="fechaNacimiento" type="date" min="1950-01-01" max="2050-01-01" class="form-control" value="{{$empleado->fechaNacimiento}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option class="optionValueEstado" value="{{$empleado->estado}}">{{$empleado->estado}}</option>
                <option class="optionActivo" value="Activo">Activo</option>
                <option class="optionBaja" value="Baja">Baja</option>
                <option class="optionVacaciones" value="Vacaciones">Vacaciones</option>
                <option class="optionInactivo" value="Inactivo">Inactivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empresa</label>
            <select class="form-control" id="empresa" name="empresa"required>
                <option class="optionValueEmpresa" value="{{$empleado->empresa}}">{{$empleado->empresa}}</option>
                <option class="optionGLS" value="GLS">GLS</option>
                <option class="optionSEUR" value="SEUR">SEUR</option>
                <option class="optionCorreosExpress" value="CorreosExpress">CorreosExpress</option>
                <option class="optionLavadosExpress" value="LavadosExpress">LavadosExpress</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Cargo</label>
            <select class="form-control" id="cargo" name="cargo" required>
                <option class="optionValueCargo" value="{{$empleado->cargo}}">{{$empleado->cargo}}</option>
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
    $('#divID').hide();
    
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

    // EDIT DE ESTADO
    var optionEstado = $('.optionValueEstado').val();

    if (optionEstado == 'Activo') {
        $('.optionBaja').show();
        $('.optionVacaciones').show();
        $('.optionInactivo').show();
        $('.optionActivo').hide();
    } else if (optionEstado == 'Baja') {
        $('.optionBaja').hide();
        $('.optionVacaciones').show();
        $('.optionInactivo').show();
        $('.optionActivo').show();
    } else if (optionEstado == 'Vacaciones') {
        $('.optionBaja').show();
        $('.optionVacaciones').hide();
        $('.optionInactivo').show();
        $('.optionActivo').show();
    } else if (optionEstado == 'Inactivo') {
        $('.optionBaja').show();
        $('.optionVacaciones').show();
        $('.optionInactivo').hide();
        $('.optionActivo').show();
    }

    // EDIT DE EMPRESA
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

    // EDIT DE EMPRESA
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