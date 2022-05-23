@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Listado de empleados</h1>
@stop

@section('content')
    <a href="empleados/create" class="btn btn-primary mb-3">Añadir Empleado</a>

    <table id="empleados" class="table table-striped table-bordered shadow-lg mt-4 display responsive nowrap" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Nº Empleado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">DNI</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Estado</th>
                <th scope="col">Empresa</th>
                <th scope="col">Cargo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado-> id }}</td>
                <td>{{ $empleado-> nombre }}</td>
                <td>{{ $empleado-> apellidos }}</td>
                <td>{{ $empleado-> dni }}</td>
                <td>{{ $empleado-> fechaNacimiento }}</td>
                <td>{{ $empleado-> estado }}</td>
                <td>{{ $empleado-> empresa }}</td>
                <td>{{ $empleado-> cargo }}</td>
                <td>
                    <form action="{{ route ('empleados.destroy',$empleado->id) }}" method="POST">
                        <a href="/empleados/{{ $empleado-> id }}/edit" class="btn btn-info">Editar</a>
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
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#empleados').DataTable({
            responsive: true,
            "pageLength" : 10,
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
            "responsive": false,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                "infoFiltered": "(Filtrado de _MAX_ total registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
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