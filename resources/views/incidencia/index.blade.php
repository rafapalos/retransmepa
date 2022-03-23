@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Listado de incidencias</h1>
@stop

@section('content')
    <a href="incidencias/create" class="btn btn-primary mb-3">Añadir incidencia</a>

    <table id="incidencias" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Nombre del empleado</th>
                <th scope="col">Sector</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Sanción</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidencias as $incidencia)
            <tr>
                <td>{{ $incidencia-> nombreEmpleado }}</td>
                <td>{{ $incidencia-> sector }}</td>
                <td>{{ $incidencia-> descripcion }}</td>
                <td>{{ $incidencia-> estado }}</td>
                <td>{{ $incidencia-> sancion }}</td>
                <td>{{ $incidencia-> fecha }}</td>
                <td>
                    <form action="{{ route ('incidencias.destroy',$incidencia->id) }}" method="POST">
                        <a href="/incidencias/{{ $incidencia-> id }}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#incidencias').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                "infoFiltered": "(Filtrado de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    } );
    </script>
@stop