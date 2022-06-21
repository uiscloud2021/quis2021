@extends('adminlte::page')

@section('title', 'Comité de Ética')

@section('content_header')
@include('eq-ce.resume')
@stop

@section('content')
<div class="div_space"><br/>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="overlay-wrapper col-md-12">
                    <div class="overlay" id="overlay" style="position:fixed; display:none">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        <div class="text-bold pt-2"> Guardando...</div>
                    </div>

                    <div class="col-12">
                        <!--<div class="card">-->
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"></h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a onclick="list_miembroin();" class="nav-link" href="#tab_1" data-toggle="tab">Integración</a></li>
                                    <li class="nav-item"><a onclick="list_fechasom();" class="nav-link" href="#tab_2" data-toggle="tab">Sometimiento</a></li>
                                    <li class="nav-item"><a onclick="list_reunion();" class="nav-link" href="#tab_3" data-toggle="tab">Reunión</a></li>
                                    <li class="nav-item"><a onclick="Tablas1Seg();" class="nav-link" href="#tab_4" data-toggle="tab">Seguimiento</a></li>
                                    <li class="nav-item"><a onclick="list_auditoria();" class="nav-link" href="#tab_5" data-toggle="tab">Auditorías</a></li>
                                    <li class="nav-item"><a onclick="list_domicilioci();" class="nav-link" href="#tab_6" data-toggle="tab">Cierre</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab_1">
                                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_integracion']) !!}
                                        @include('eq-ce.form_integracion')
                                        <div align="right">
                                            <a href="#" onclick="SalirIntegracion();" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_2">
                                    @if(isset($sometimiento))
                                    {!! Form::model($sometimiento, ['route' => ['eq-ce.create_sometimiento', $sometimiento], 'id'=>'formcreate_sometimiento']) !!}
                                    @else
                                    {!! Form::open(['route' => 'eq-ce.create_sometimiento', 'autocomplete' => 'off', 'id'=>'formcreate_sometimiento']) !!}
                                    @endif
                                        @include('eq-ce.form_sometimiento')
                                        <div align="right">
                                            <a href="#" onclick="SalirSometimiento();" class="btn btn-danger">Cancelar</a>
                                            <button type="button" onclick="GuardarSometimiento();" class="btn btn-primary"><i class="fas fa-save"> Guardar sometimiento</i></button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reunion']) !!}
                                        @include('eq-ce.form_reunion')
                                        <div align="right">
                                            <a href="#" onclick="SalirReunion();" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_4">
                                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_seguimiento']) !!}
                                        @include('eq-ce.form_seguimiento')
                                        <div align="right">
                                            <a href="#" onclick="SalirSeguimiento();" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_5">
                                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_auditoria']) !!}
                                        @include('eq-ce.form_auditoria')
                                        <div align="right">
                                            <a href="#" onclick="SalirAuditoria();" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_6">
                                    @if(isset($cierre))
                                    {!! Form::model($cierre, ['route' => ['eq-ce.create_cierre', $cierre], 'id'=>'formcreate_cierre']) !!}
                                    @else
                                    {!! Form::open(['route' => 'eq-ce.create_cierre', 'autocomplete' => 'off', 'id'=>'formcreate_cierre']) !!}
                                    @endif
                                        @include('eq-ce.form_cierre')
                                        <div align="right">
                                            <a href="#" onclick="SalirCierre();" class="btn btn-danger">Cancelar</a>
                                            <button type="button" onclick="GuardarCierre();" class="btn btn-primary"><i class="fas fa-save"> Guardar cierre</i></button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        <!--</div>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--MODALS-->
@include('eq-ce.modals_integracion')
@include('eq-ce.modals_sometimiento')
@include('eq-ce.modals_seguimiento')
@include('eq-ce.modals_cierre')

@stop

{{--@section('footer')
    @include('eq-ce.resume')
@stop--}}

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
    <script src="{{ asset('js/ce/integracion.js?7') }}"></script>
    <script src="{{ asset('js/ce/sometimiento.js?2') }}"></script>
    <script src="{{ asset('js/ce/reunion.js?5') }}"></script>
    <script src="{{ asset('js/ce/seguimiento.js?2') }}"></script>
    <script src="{{ asset('js/ce/auditoria.js?1') }}"></script>
    <script src="{{ asset('js/ce/cierre.js?2') }}"></script>
@stop