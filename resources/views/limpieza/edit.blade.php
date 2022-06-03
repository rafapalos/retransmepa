@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Limpieza</h2>
@stop

@section('content')
    <form action="/limpiezas/{{$limpieza->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre del Cliente</label>
            <input id="nombreCliente" name="nombreCliente" type="text" class="form-control" value="{{$limpieza->nombreCliente}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input id="matricula" name="matricula" type="text" class="form-control" value="{{$limpieza->matricula}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="marca" name="marca" type="text" class="form-control" value="{{$limpieza->marca}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="modelo" name="modelo" type="text" class="form-control" value="{{$limpieza->modelo}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Lavado</label>
            <select class="form-control" id="tipoLavado" name="tipoLavado" required>
                <option class="optionValueTipoLavado" value="{{$limpieza->tipoLavado}}">{{$limpieza->tipoLavado}}</option>
                <option class="optionBasico" value="Básico">Básico</option>
                <option class="optionTapiceria" value="Integral Tapicería">Integral Tapicería</option>
                <option class="optionReestreno" value="Integral Reestreno">Integral Reestreno</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de Coche</label>
            <select class="form-control" id="tipoCoche" name="tipoCoche" required>
                <option class="optionValueTipoCoche" value="{{$limpieza->tipoCoche}}">{{$limpieza->tipoCoche}}</option>
                <option class="optionPequeño" value="Pequeño">Pequeño</option>
                <option class="optionMediano" value="Mediano">Mediano</option>
                <option class="optionGrande" value="Grande">Grande</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input id="precio" name="precio" type="text" class="form-control" value="{{$limpieza->precio}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Fecha de Limpieza</label>
            <input id="fechaLimpieza" name="fechaLimpieza" type="date" class="form-control" value="{{$limpieza->fechaLimpieza}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Empleado a Asignar</label>
            <select class="form-control" id="empleadoAsignado" name="empleadoAsignado" required>
                <option value="">Elije una opción</option>
                @foreach ($empleadoEdit as $empleadoEdit)
                <option value="{{$empleadoEdit->id}}-{{$empleadoEdit->nombre}} {{$empleadoEdit->apellidos}}">{{$empleadoEdit->nombre}} {{$empleadoEdit->apellidos}}</option>
                @endforeach
            </select>
        </div>
        <a href="/limpiezas" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('js')
<script>
    // SELECT DE TIPO DE LAVADO
    var optionTipoLavado = $('.optionValueTipoLavado').val();

    if (optionTipoLavado == 'Básico') {
        $('.optionTapiceria').show();
        $('.optionBasico').hide();
        $('.optionReestreno').show();
    } else if (optionTipoLavado == 'Integral Tapicería') {
        $('.optionTapiceria').hide();
        $('.optionBasico').show();
        $('.optionReestreno').show();
    } else if (optionTipoLavado == 'Integral Reestreno') {
        $('.optionTapiceria').show();
        $('.optionBasico').show();
        $('.optionReestreno').hide();
    }

    // SELECT DE TIPO DE COCHE
    var optionTipoCoche = $('.optionValueTipoCoche').val();

    if (optionTipoCoche == 'Pequeño') {
        $('.optionMediano').show();
        $('.optionPequeño').hide();
        $('.optionGrande').show();
    } else if (optionTipoCoche == 'Mediano') {
        $('.optionMediano').hide();
        $('.optionPequeño').show();
        $('.optionGrande').show();
    } else if (optionTipoCoche == 'Grande') {
        $('.optionMediano').show();
        $('.optionPequeño').show();
        $('.optionGrande').hide();
    }
</script>
@stop