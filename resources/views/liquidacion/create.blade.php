@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Liquidación</h2>
@stop

@section('content')
    <form action="/liquidaciones" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nº Repartidor</label>
            <input id="numRepartidor" name="numRepartidor" type="number" min="0" max="9999" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <select class="form-control" id="nombre" name="nombre" required>
                @foreach ($empleadosLiquidaciones as $empleadosLiquidacion)
                <option value="{{$empleadosLiquidacion->id}}-{{$empleadosLiquidacion->nombre}} {{$empleadosLiquidacion->apellidos}}">{{$empleadosLiquidacion->nombre}} {{$empleadosLiquidacion->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <select class="form-control" id="matricula" name="matricula" required>
                @foreach ($vehiculosLiquidaciones as $vehiculosLiquidacion)
                <option value="{{$vehiculosLiquidacion->id}}-{{$vehiculosLiquidacion->matricula}}">{{$vehiculosLiquidacion->matricula}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Entregas</label>
            <input id="entregas" name="entregas" type="number" min="1" max="300" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Recogidas</label>
            <input id="recogidas" name="recogidas" type="number" min="0" max="300" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Incidencias</label>
            <input id="incidencias" name="incidencias" type="number" min="0" max="300" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dia trabajado</label>
            <select class="form-control" id="diaTrabajado" name="diaTrabajado" required>
                <option value=""></option>
                <option value="Dia Completo">Dia Completo</option>
                <option value="Festivo">Festivo</option>
                <option value="Normal">Normal</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sueldo diario</label>
            <input id="dinero" name="dinero" type="number" step="any" class="form-control" readonly required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" min="2022-01-01" max="2050-01-01" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal Repartido</label>
            <select class="form-control" id="codPostal" name="codPostal" required>
                <option value="41930">41930</option>
                <option value="41927">41927</option>
                <option value="41940">41940</option>
            </select>
        </div>
        <a href="/liquidaciones" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('js')
<script>

    if ($("#diaTrabajado").val() == "") {
        $('#dinero').val('0');
    } 

    $("#diaTrabajado, #entregas, #recogidas").bind("change keyup", function(event){
        var diaTrabajado = $('#diaTrabajado').val();

        if (diaTrabajado == 'Dia Completo') {
            $('#dinero').val('50');
        } else if (diaTrabajado == 'Festivo'){
            let festivo = '0.90';

            let subTotal = parseInt($('#entregas').val()) + parseInt($('#recogidas').val());
            let total = parseInt(subTotal) * parseFloat(festivo);
            let totalRedondeado = total.toFixed(2);

            $('#dinero').val(totalRedondeado);

            if ($("#entregas").val() == "") {
                $('#dinero').val('0');
            } else if ($("#recogidas").val() == "") {
                $('#dinero').val('0');
            }

        } else if (diaTrabajado == 'Normal') {
            let normal = '0.80';

            let subTotal = parseInt($('#entregas').val()) + parseInt($('#recogidas').val());
            let total = parseInt(subTotal) * parseFloat(normal);
            let totalRedondeado = total.toFixed(2);

            $('#dinero').val(totalRedondeado);

            if ($("#entregas").val() == "") {
                $('#dinero').val('0');
            } else if ($("#recogidas").val() == "") {
                $('#dinero').val('0');
            }
        } else if (diaTrabajado == '') {
            $('#dinero').val('0');
        }
    });
</script>
@stop