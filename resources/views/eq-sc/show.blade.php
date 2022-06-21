@extends('adminlte::page')

@section('title', 'Sitio Clínico')

@section('content_header')
@include('eq-sc.resume')
@stop

@section('content')
<div class="div_space">
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
                                    <li class="nav-item"><a onclick="list_equipamientofact();" class="nav-link" href="#tab_1" data-toggle="tab">Factibilidad</a></li>
                                    <li class="nav-item"><a onclick="TablasSom();" class="nav-link" href="#tab_2" data-toggle="tab">Sometimiento</a></li>
                                    <li class="nav-item"><a onclick="list_infraestructurafar();" class="nav-link" href="#tab_3" data-toggle="tab">Farmacia</a></li>
                                    <li class="nav-item"><a onclick="Tablas1Rec();" class="nav-link" href="#tab_4" data-toggle="tab">Reclutamiento</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Conducción</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab_1">
                                    @if(isset($factibilidad))
                                    {!! Form::model($factibilidad, ['route' => ['eq-sc.create_factibilidad', $factibilidad], 'id'=>'formcreate_factibilidad']) !!}
                                    @else
                                    {!! Form::open(['route' => 'eq-sc.create_factibilidad', 'autocomplete' => 'off', 'id'=>'formcreate_factibilidad']) !!}
                                    @endif
                                        @include('eq-sc.form_factibilidad')
                                        <div align="right">
                                            <a href="#" onclick="SalirFactibilidad();" class="btn btn-danger">Cancelar</a>
                                            <button type="button" onclick="GuardarFactibilidad();" class="btn btn-primary"><i class="fas fa-save"> Guardar factibilidad</i></button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_2">
                                    @if(isset($sometimiento))
                                    {!! Form::model($sometimiento, ['route' => ['eq-sc.create_sometimiento', $sometimiento], 'id'=>'formcreate_sometimiento']) !!}
                                    @else
                                    {!! Form::open(['route' => 'eq-sc.create_sometimiento', 'autocomplete' => 'off', 'id'=>'formcreate_sometimiento']) !!}
                                    @endif
                                        @include('eq-sc.form_sometimiento')
                                        <div align="right">
                                            <a href="#" onclick="SalirSometimiento();" class="btn btn-danger">Cancelar</a>
                                            <button type="button" onclick="GuardarSometimiento();" class="btn btn-primary"><i class="fas fa-save"> Guardar sometimiento</i></button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_3">
                                    @if(isset($farmacia))
                                    {!! Form::model($farmacia, ['route' => ['eq-sc.create_farmacia', $farmacia], 'id'=>'formcreate_farmacia']) !!}
                                    @else
                                    {!! Form::open(['route' => 'eq-sc.create_farmacia', 'autocomplete' => 'off', 'id'=>'formcreate_farmacia']) !!}
                                    @endif
                                        @include('eq-sc.form_farmacia')
                                        <div align="right">
                                            <a href="#" onclick="SalirFarmacia();" class="btn btn-danger">Cancelar</a>
                                            <button type="button" onclick="GuardarFarmacia();" class="btn btn-primary"><i class="fas fa-save"> Guardar farmacia</i></button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_4">
                                    @if(isset($reclutamiento))
                                    {!! Form::model($reclutamiento, ['route' => ['eq-sc.create_reclutamiento', $reclutamiento], 'id'=>'formcreate_reclutamiento']) !!}
                                    @else
                                    {!! Form::open(['route' => 'eq-sc.create_reclutamiento', 'autocomplete' => 'off', 'id'=>'formcreate_reclutamiento']) !!}
                                    @endif
                                        @include('eq-sc.form_reclutamiento')
                                        <div align="right">
                                            <a href="#" onclick="SalirReclutamiento();" class="btn btn-danger">Cancelar</a>
                                            <button type="button" onclick="GuardarReclutamiento();" class="btn btn-primary"><i class="fas fa-save"> Guardar reclutamiento</i></button>
                                        </div>
                                    {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane" id="tab_5">
                                        EN CONSTRUCCIÓN
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
@include('eq-sc.modals_factibilidad')
@include('eq-sc.modals_sometimiento')
@include('eq-sc.modals_farmacia')
@include('eq-sc.modals_reclutamiento')

@stop

{{--@section('footer')
    @include('eq-sc.resume')
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
    <script src="{{ asset('js/sc/factibilidad.js?9') }}"></script>
    <script src="{{ asset('js/sc/sometimiento.js?4') }}"></script>
    <script src="{{ asset('js/sc/farmacia.js?4') }}"></script>
    <script src="{{ asset('js/sc/reclutamiento.js?16') }}"></script>
@stop