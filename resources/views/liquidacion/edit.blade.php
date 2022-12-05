@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Liquidación</h2>
@stop

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
    <form action="/liquidaciones/{{$liquidacion->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nº Repartidor</label>
            <input id="numRepartidor" name="numRepartidor" type="number" min="0" max="9999" class="form-control" value="{{$liquidacion->numRepartidor}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <select class="form-control" id="nombre" name="nombre" required>
                <option value="">Seleccionar opción</option>
                @foreach ($empleadosEdit as $empleadosEdit)
                <option value="{{$empleadosEdit->id}}-{{$empleadosEdit->nombre}} {{$empleadosEdit->apellidos}}">{{$empleadosEdit->nombre}} {{$empleadosEdit->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <select class="form-control" id="matricula" name="matricula" required>
                <option value="">Seleccionar opción</option>
                @foreach ($matriculaEdit as $matriculaEdit)
                <option value="{{$matriculaEdit->id}}-{{$matriculaEdit->matricula}}">{{$matriculaEdit->matricula}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Entregas</label>
            <input id="entregas" name="entregas" type="number" min="1" max="300" class="form-control" value="{{$liquidacion->entregas}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Recogidas</label>
            <input id="recogidas" name="recogidas" type="number" min="0" max="300" class="form-control" value="{{$liquidacion->recogidas}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Incidencias</label>
            <input id="incidencias" name="incidencias" type="number" min="0" max="300" class="form-control" value="{{$liquidacion->incidencias}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dia trabajado</label>
            <select class="form-control" id="diaTrabajado" name="diaTrabajado" required>
                <option class="optionValueDiaTrabajado" value="{{$liquidacion->diaTrabajado}}">{{$liquidacion->diaTrabajado}}</option>
                <option class="optionDiaCompleto" value="Dia Completo">Dia Completo</option>
                <option class="optionFestivo" value="Festivo">Festivo</option>
                <option class="optionNormal" value="Normal">Normal</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sueldo diario</label>
            <input id="dinero" name="dinero" type="text" class="form-control" value="{{$liquidacion->dinero}}" readonly required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" value="{{$liquidacion->fecha}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal Repartido</label>
            <select class="form-control" id="codPostal" name="codPostal" required>
                <option value="">Seleccionar opción</option>
                @foreach ($codPostalesEdit as $codPostalesEdit)
                <option value="{{$codPostalesEdit->id}}-{{$codPostalesEdit->codigoPostal}}">{{$codPostalesEdit->codigoPostal}}</option>
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
    // SELECT RESPONSIVE
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

    if ($("#optionValueDiaTrabajado").val() == "") {
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

    // SELECT DIA TRABAJADO
    var optionDiaTrabajado = $('.optionValueDiaTrabajado').val();

    if (optionDiaTrabajado == 'Dia Completo') {
        $('.optionDiaCompleto').hide();
        $('.optionFestivo').show();
        $('.optionNormal').show();
    } else if (optionDiaTrabajado == 'Festivo') {
        $('.optionValueDiaTrabajado').hide();
        $('.optionDiaCompleto').show();
        $('.optionNormal').show();
    } else if (optionDiaTrabajado == 'Normal') {
        $('.optionDiaCompleto').show();
        $('.optionFestivo').show();
        $('.optionValueDiaTrabajado').hide();
    }

    // SELECT CODIGO POSTAL
    var optionCodPostal = $('.optionValueCodPostal').val();

    if (optionCodPostal == '41930') {
        $('.optionBormujos').hide();
        $('.optionMairena').show();
        $('.optionTomares').show();
    } else if (optionCodPostal == '41927') {
        $('.optionBormujos').show();
        $('.optionMairena').hide();
        $('.optionTomares').show();
    } else if (optionCodPostal == '41940') {
        $('.optionBormujos').show();
        $('.optionMairena').show();
        $('.optionTomares').hide();
    }
</script>
@stop