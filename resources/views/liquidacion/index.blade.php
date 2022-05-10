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

    <!-- <div class="row col-7">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div> -->
@stop

@section('css')
    <!-- Admin -->
    <link rel="stylesheet" href="/css/admin_custom.css">

    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <!-- Buttons -->
    <link rel="stylesheet" href="/css/buttons.dataTables.min.css">
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
    <!-- Grafics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#liquidaciones').DataTable({
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
            // "dom": 'Bfrtip',
            // "dom": 'lfrtipB',
            "responsive": false,
            "language": {
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
            }],
            "order": [[ 0, "asc" ]]
        });
    } );
    </script>

    <!-- <script>
        
        var repartidor=<?php echo json_encode($liquidaciones[0]['nombre'])?>;
        var repartidor2=<?php echo json_encode($liquidaciones[1]['nombre'])?>;

        var dinero=<?php echo json_encode($liquidaciones[0]['dinero'])?>;
        var dinero2=<?php echo json_encode($liquidaciones[1]['dinero'])?>;

        let date = new Date();
        let output = date.getFullYear() + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + String(date.getDate()).padStart(2, '0');
        let fechaActual = output.substring(0, output.length - 3);
        // console.log(output);
        var liquidaciones=<?php echo json_encode($liquidaciones)?>;
        // console.log(liquidaciones);
        for (let y = 0; y < liquidaciones.length; y++) {
            let fechaAntigua = liquidaciones[y]['fecha'];
            let fechaNueva   = fechaAntigua.substring(0, fechaAntigua.length - 3);
            // console.log(fechaNueva);

            if (fechaNueva == fechaActual) {
                let arrayLiquidacionesNombre = [liquidaciones[y]['nombre']];
                let arrayLiquidacionesDinero = [liquidaciones[y]['dinero']];
                arrayLiqui = [arrayLiquidacionesNombre, arrayLiquidacionesDinero];
                console.log(arrayLiquidacionesNombre);
                console.log(arrayLiquidacionesDinero);

            } else {
                let arrayLiquidacionesFalse = [liquidaciones[y]['nombre']];
                // console.log('False: '+arrayLiquidacionesFalse);
            }


        }
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [arrayLiquidacionesNombre],
                datasets: [{
                    label: 'Dinero',
                    data: [arrayLiquidacionesDinero],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> -->
@stop