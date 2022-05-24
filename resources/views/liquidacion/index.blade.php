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
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.css"/> -->
<!-- <link href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.min.css" rel="stylesheet"/> -->

@stop

@section('js')
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        // $('#liquidaciones thead th').each(function() {
        //     var title = $(this).text();
        //     $(this).html(title + ' <input type="text" class="col-search-input" placeholder="Buscar" />');
        // });

        var table = $('#liquidaciones').DataTable({
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "Todos"]
            ],
            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
            "responsive": true,
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
            }, {
                // Botón para Pdf
                extend: 'pdf',
                filename: 'RegistroLimpiezas',
                className: 'btn btn-danger'
            }, {
                // Botón para imprimir
                extend: 'print',
                className: 'btn btn-warning'
            }]
        });

        // table.columns().every(function() {
        // var table = this;
        //     $('input', this.header()).on('keyup change', function() {
        //         if (table.search() !== this.value) {
        //             table.search(this.value).draw();
        //         }
        //     });
        // });

    });
</script>
@stop