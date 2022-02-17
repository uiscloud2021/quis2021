@extends('adminlte::page')

@section('title', 'Auxiliar')

@section('content_header')
<h4 class="m-0">Auxiliar bancario</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">

<div class="row">

    <div class="col-12 ">
        <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <?php $li=1; ?>
                @foreach ($cuentas as $cuenta)
                    @if($li == 1)
                        <li class="nav-item">
                            <a class="nav-link active" onclick="list_auxiliar({{$cuenta->id}});" id="custom-tabs-two-{{$li}}-tab" data-toggle="pill" href="#custom-tabs-two-{{$li}}" role="tab" aria-controls="custom-tabs-two-{{$li}}" aria-selected="true">{{$cuenta->nombre}}</a>
                            {!! Form::hidden('cuenta_id', $cuenta->id, ['class' => 'form-control', 'id'=>'cuenta_id']) !!}
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" onclick="list_auxiliar({{$cuenta->id}});" id="custom-tabs-two-{{$li}}-tab" data-toggle="pill" href="#custom-tabs-two-{{$li}}" role="tab" aria-controls="custom-tabs-two-{{$li}}" aria-selected="false">{{$cuenta->nombre}}</a>
                        </li>
                    @endif
                    <?php $li++; ?>
                @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <?php $div=1; ?>
                    @foreach ($cuentas as $cuenta)
                        @if($div == 1)
                            <div class="tab-pane fade active show" id="custom-tabs-two-{{$div}}" role="tabpanel" aria-labelledby="custom-tabs-two-{{$div}}-tab">
                        @else
                            <div class="tab-pane fade" id="custom-tabs-two-{{$div}}" role="tabpanel" aria-labelledby="custom-tabs-two-{{$div}}-tab">
                        @endif

                        <div class="table-responsive">
                            <div align="right">
                                <button type="button" class="btn btn-primary" onclick="CreateMovimiento({{$cuenta->id}});">
                                    <i class="fas fa-file"> Agregar movimiento</i>
                                </button>  
                            </div><br/>
                            <table id="tbl_auxiliar{{$cuenta->id}}" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                                <thead class="bg-mexg2 text-white">
                                <tr>
                                    <th scope="col">Fecha de movimiento</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>

                        </div>
                        <?php $div++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



</div>
</div>

<!--MODALS-->
@include('adm/auxiliar.modals')


@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="{{ asset('js/administracion/auxiliar.js?3') }}"></script>
@stop