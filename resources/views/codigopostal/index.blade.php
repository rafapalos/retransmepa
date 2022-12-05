@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
<h1>Listado de Códigos Postales</h1>
@stop

@section('content')
<a href="codigopostales/create" class="btn btn-primary mb-3">Añadir Código Postal</a>

<table id="codigopostales" class="table table-striped table-bordered shadow-lg mt-4 display responsive nowrap" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Localidad</th>
            <th scope="col">Municipio</th>
            <th scope="col">Código Postal</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($codigopostales as $codigopostal)
        <tr>
            <td>{{ $codigopostal-> id }}</td>
            <td>{{ $codigopostal-> localidad }}</td>
            <td>{{ $codigopostal-> municipio }}</td>
            <td>{{ $codigopostal-> codigoPostal }}</td>
            <td>
                <form action="{{ route ('codigopostales.destroy',$codigopostal->id) }}" method="POST">
                    <a href="/codigopostales/{{ $codigopostal-> id }}/edit" class="btn btn-info">Editar</a>
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

        $('#codigopostales').DataTable({
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