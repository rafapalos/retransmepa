@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Liquidación</h2>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <option value="">Seleccionar opción</option>
                @foreach ($empleadosLiquidaciones as $empleadosLiquidacion)
                <option value="{{$empleadosLiquidacion->id}}-{{$empleadosLiquidacion->nombre}} {{$empleadosLiquidacion->apellidos}}">{{$empleadosLiquidacion->nombre}} {{$empleadosLiquidacion->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <select class="form-control" id="matricula" name="matricula" required>
                <option value="">Seleccionar opción</option>
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
            <input id="fecha" name="fecha" type="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal Repartido</label>
            <select class="form-control" id="codPostal" name="codPostal" required>
                <option value="">Seleccionar opción</option>
                @foreach ($codPostalesLiquidaciones as $codPostalesLiquidacion)
                <option value="{{$codPostalesLiquidacion->id}}-{{$codPostalesLiquidacion->codigoPostal}}">{{$codPostalesLiquidacion->codigoPostal}}</option>
                @endforeach
            </select>
        </div>
        <a href="/liquidaciones" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nombre').select2({
            language: "es",
            theme: "classic",
            width: '100%'
        });

        $('#matricula').select2({
            language: "es",
            theme: "classic",
            width: '100%'
        });

        $('#codPostal').select2({
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