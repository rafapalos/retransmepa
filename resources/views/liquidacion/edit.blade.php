@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Liquidación</h2>
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
            <input id="nombre" name="nombre" type="text" class="form-control" value="{{$liquidacion->nombre}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <select class="form-control" id="matricula" name="matricula" required>
                <option value="">Elija una opción</option>
                @foreach ($matriculaEdit as $matriculaEdit)
                <option value="{{$matriculaEdit->matricula}}">{{$matriculaEdit->matricula}}</option>
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
                <option value="optionFestivo">Festivo</option>
                <option value="optionNormal">Normal</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Dinero</label>
            <input id="dinero" name="dinero" type="text" class="form-control" value="{{$liquidacion->dinero}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha</label>
            <input id="fecha" name="fecha" type="date" class="form-control" min="2022-01-01" max="2050-01-01" value="{{$liquidacion->fecha}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Código Postal Repartido</label>
            <select class="form-control" id="codPostal" name="codPostal" required>
                <option class="optionValueCodPostal" value="{{$liquidacion->codPostal}}">{{$liquidacion->codPostal}}</option>
                <option class="optionBormujos" value="41930">41930</option>
                <option class="optionMairena" value="41927">41927</option>
                <option class="optionTomares" value="41940">41940</option>
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

    // SELECT DIA TRABAJADO
    var optionDiaTrabajado = $('.optionValueDiaTrabajado').val();

    if (optionDiaTrabajado == 'Dia Completo') {
        $('.optionDiaCompleto').hide();
        $('.optionFestivo').show();
        $('.optionNormal').show();
    } else if (optionDiaTrabajado == 'Festivo') {
        $('.optionDiaCompleto').show();
        $('.optionFestivo').hide();
        $('.optionNormal').show();
    } else if (optionDiaTrabajado == 'Normal') {
        $('.optionDiaCompleto').show();
        $('.optionFestivo').show();
        $('.optionNormal').hide();
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