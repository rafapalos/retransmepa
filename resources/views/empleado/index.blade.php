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
                    <button class="btn btn-danger functionDelete">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<!-- Datatables responsive -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.css" />
@stop

@section('js')
<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Datatables responsive sin buttons -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/sr-1.1.1/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('.functionDelete').click(function(event) {
            var form = $(this).closest("form");

            event.preventDefault();

            swal({
                title: "¿Estás seguro de que desea eliminar este registro?",
                text: "Si eliminas esto, desaparecerá para siempre.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancelar", "Si"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!'
            }).then((result) => {
                if (result) {
                    form.submit();
                    swal(
                        'Borrado',
                        'El registro ha sido borrado.',
                        'success'
                    )
                } else {
                    swal(
                        'Cancelado',
                        'El registro no ha sido borrado.',
                        'error'
                    )
                }
            });
        });

        $('#empleados').DataTable({
            "responsive": true,
            "pageLength": 10,
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "Todos"]
            ],
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
    });
</script>
@stop