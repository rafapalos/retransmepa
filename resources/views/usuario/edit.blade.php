@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Editar usuarios</h2>
@stop

@section('content')
    <form action="/usuarios/{{$usuario->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" value="{{$usuario->name}}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Correo</label>
            <input id="email" name="email" type="email" class="form-control" value="{{$usuario->email}}" required>
        </div>
        <div class="mb-3" id="divContraseña">
            <label for="" class="form-label">Contraseña</label>
            <input id="password" name="password" type="text" class="form-control" value="{{$usuario->password}}">
        </div>
        <div class="mb-3" id="divCorreoVerificado">
            <label for="" class="form-label">Correo Verificado</label>
            <input id="email_verified_at" name="email_verified_at" type="text" class="form-control" value="{{$usuario->email_verified_at}}">
        </div>
        <a href="/usuarios" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('js')
<script>
$('#divCorreoVerificado').hide();
$('#divContraseña').hide();

// let date = new Date();

// let fechaActual = date.getFullYear() + '-' + ( date.getMonth() + 1 ) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

// $('#email_verified_at').val(fechaActual);

</script>
@stop