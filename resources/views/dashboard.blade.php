@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item active" style="font-size:16px; font-weight:bold;"><a> Bienvenido(a)</a></li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
</div>
@stop

@section('content')


<div class="card">

<div class="card-body">

<div class="table-responsive" style="text-align: center;">
    <img src="vendor/adminlte/dist/img/modelo_inicio.png" >
</div>

</div>
</div>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
@stop
