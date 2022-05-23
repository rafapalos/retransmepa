@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Listado de liquidaciones</h1>
@stop

@section('content')
    <a href="liquidaciones/create" class="btn btn-primary mb-3">Añadir Liquidación</a>
    <table id="liquidaciones" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Nº Repartidor</th>
                <th scope="col">Nombre</th>
                <th scope="col">Matricula</th>
                <th scope="col">Entregas</th>
                <th scope="col">Recogidas</th>
                <th scope="col">Incidencias</th>
                <th scope="col">Dia Trabajado</th>
                <th scope="col">Dinero</th>
                <th scope="col">Fecha</th>
                <th scope="col">Código Postal</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($liquidaciones as $liquidacion)
            <tr>
                <td>{{ $liquidacion-> numRepartidor }}</td>
                <td>{{ $liquidacion-> nombre }}</td>
                <td>{{ $liquidacion-> matricula }}</td>
                <td>{{ $liquidacion-> entregas }}</td>
                <td>{{ $liquidacion-> recogidas }}</td>
                <td>{{ $liquidacion-> incidencias }}</td>
                <td>{{ $liquidacion-> diaTrabajado }}</td>
                <td>{{ $liquidacion-> dinero }}</td>
                <td>{{ $liquidacion-> fecha }}</td>
                <td>{{ $liquidacion-> codPostal }}</td>
                <td>
                    <form action="{{ route ('liquidaciones.destroy',$liquidacion->id) }}" method="POST">
                        <a href="/liquidaciones/{{ $liquidacion-> id }}/edit" class="btn btn-info">Editar</a>
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
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@stop

@section('js')
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- DataTables -->
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
        $('#liquidaciones').DataTable({
            "pageLength": 10,
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
    });
    </script>
@stop