@extends('adminlte::page')

@section('title', 'Retransmepa')

@section('content_header')
    <h1>Gráfico de líneas</h1>
@stop

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta content="">
</head>  
<body>
    <div id="chart-container"></div>
</body>  
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
   
@stop

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var datas = <?php echo json_encode ($datas) ?>
        Highcharts.chart('chart-container', {
            
        })
    </script>
@stop