@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Listado de vehiculos</h1>
@stop

@section('content')
    <a href="vehiculos/create" class="btn btn-primary mb-3">Añadir Vehiculo</a>

    <table id="vehiculos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Nº Vehiculo</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Matricula</th>
                <th scope="col">Empresa</th>
                <th scope="col">Estado</th>
                <th scope="col">Propiedad</th>
                <th scope="col">Empresa de Alquiler</th>
                <th scope="col">Fecha Alquiler Desde</th>
                <th scope="col">Fecha Alquiler Hasta</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo-> id }}</td>
                <td>{{ $vehiculo-> marca }}</td>
                <td>{{ $vehiculo-> modelo }}</td>
                <td>{{ $vehiculo-> matricula }}</td>
                <td>{{ $vehiculo-> empresa }}</td>
                <td>{{ $vehiculo-> estado }}</td>
                <td>{{ $vehiculo-> propiedad }}</td>
                <td>{{ $vehiculo-> alquiler }}</td>
                <td>{{ $vehiculo-> fechaAlquilerDesde }}</td>
                <td>{{ $vehiculo-> fechaAlquilerHasta }}</td>
                <td>
                    <form action="{{ route ('vehiculos.destroy',$vehiculo->id) }}" method="POST">
                        <a href="/vehiculos/{{ $vehiculo-> id }}/edit" class="btn btn-info">Editar</a>
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
    <!-- Datatables responsive -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.css"/>
@stop

@section('js')
    <!-- Datatables responsive sin buttons -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#vehiculos').DataTable({
            "responsive": true,
            "pageLength": 10,
            "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]],
            "info": false,
            "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
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
            }
        });
    } );
    </script>
@stop