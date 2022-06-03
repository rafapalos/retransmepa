@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h2>Añadir Usuarios</h2>
@stop

@section('content')
    <form action="/usuarios" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="name" name="name" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Correo</label>
            <input id="email" name="email" type="email" class="form-control" required>
        </div>
        <div class="mb-3" id="divContraseña">
            <label for="" class="form-label">Contraseña</label>
            <input id="password" name="password" type="text" class="form-control" required>
        </div>
        <div class="mb-3" id="divEmailVerificado">
            <label for="" class="form-label">Email Verificado</label>
            <input id="email_verified_at" name="email_verified_at" type="text" class="form-control" required>
        </div>
        <a href="/usuarios" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop
@section('js')
<script>
    $('#divContraseña').hide();
    $('#divEmailVerificado').hide();

    let date = new Date();

    let fechaActual = date.getFullYear() + '-' + ( date.getMonth() + 1 ) + '-' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();

    $('#email_verified_at').val(fechaActual);

    $('#password').val('$2y$10$AsQKd00iCPZFYqSGat1vQuiNnVVOH6La8PVKc.9u3COjHfPisl5mu');
</script>
@stop

