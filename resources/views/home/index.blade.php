@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h4 class="m-0">Estadísticas QUIS</h4>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Gráficos</h1>
        </div>

        <div class="card-body">
        <div class="table-responsive">
        <div class="container-fluid">
            <div class="row">


            </div>
        </div>
        </div>
        </div>
    </div>
@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
@stop

@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    }
    </script>
@stop
