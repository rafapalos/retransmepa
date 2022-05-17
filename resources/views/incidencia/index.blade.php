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
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#incidencias').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
            // "dom": 'Bfrtip',
            // "dom": 'lfrtipB',
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
            },
            "buttons": [{
                // Botón para Excel
                extend: 'excel',
                footer: true,
                filename: 'RegistroLimpiezas',
                className: 'btn btn-success'
            },{
                // Botón para Pdf
                extend: 'pdf',
                filename: 'RegistroLimpiezas',
                className: 'btn btn-danger'
            },{
                // Botón para imprimir
                extend: 'print',
                className: 'btn btn-warning'
            }]
        });
    } );
    </script>
@stop