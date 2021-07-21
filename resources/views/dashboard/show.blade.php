@extends('adminlte::page')
@section('title', 'QUIS')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
    @endif

    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="table-responsive" id="lists" style="display:none">
                <table id="list" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                    <thead class="bg-primary text-white">
                    </thead>
                </table>
            </div>
        </div>
    </div><!--FIN CONTAINER-->

    <br/>

    <!--MODALS-->
    @include('dashboard.modals')

@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">-->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{ asset('js/servidor.js') }}"></script>
@stop
