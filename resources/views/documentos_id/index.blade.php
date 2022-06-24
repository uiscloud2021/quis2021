@extends('adminlte::page')

@section('title', 'Documentos ID')

@section('content_header')
<h4 class="m-0">Documentos Innovacion y desarrollo</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">

            <div class="card-header">

                <div class="container-xxl border border-5">

                    <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                        <!--<li class="nav-item p-1" role="presentation">
                            <a class="nav-link active rounded-pill" id="esquemas-tab" data-bs-toggle="tab" data-bs-target="#esquemas" type="button" role="tab" aria-controls="esquemas" aria-selected="true">Esquemas</a>
                        </li>-->
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link active" id="capacitacion-tab" data-bs-toggle="tab" data-bs-target="#capacitacion" type="button" role="tab" aria-controls="capacitacion" aria-selected="false">Capacitación</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="manuales-tab" data-bs-toggle="tab" data-bs-target="#manuales" type="button" role="tab" aria-controls="manuales" aria-selected="false">Manuales</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="procesos-tab" data-bs-toggle="tab" data-bs-target="#procesos" type="button" role="tab" aria-controls="procesos" aria-selected="false">Procesos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="procedimientos-tab" data-bs-toggle="tab" data-bs-target="#procedimientos" type="button" role="tab" aria-controls="procedimientos" aria-selected="false">Procedimientos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="instructivos-tab" data-bs-toggle="tab" data-bs-target="#instructivos" type="button" role="tab" aria-controls="instructivos" aria-selected="false">Instructivos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="formatos-tab" data-bs-toggle="tab" data-bs-target="#formatos" type="button" role="tab" aria-controls="formatos" aria-selected="false">Formatos</a>
                        </li>
                    </ul>
        
                </div>

            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">

                    {{-- CAPACITACION --}}
                    <div class="tab-pane fade show active" id="capacitacion" role="tabpanel" aria-labelledby="capacitacion-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Capacitación</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav flex-column nav-tabs">
                                                @foreach ($documentos_capacitacion as $documento_capacitacion)
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" onclick="cambiarCapacitacion('{{$documento_capacitacion->directorio}}');" role="tab" aria-controls="vert-tabs-1" aria-selected="false"> {{ $documento_capacitacion->nombre_doc }}</a>
                                                    </li>
                                                @endforeach 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-9 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <!--LI CAPACITACIÓN-->
                                            <div class="tab-pane fade" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                                                <embed id="pdf_capacitacion" src="" width="100%" height="675" type="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- MANUALES --}}
                    <div class="tab-pane fade" id="manuales" role="tabpanel" aria-labelledby="manuales-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Manuales</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav flex-column nav-tabs">
                                                @foreach ($documentos_manuales as $documento_manuales)
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" onclick="cambiarManuales('{{$documento_manuales->directorio}}');" role="tab" aria-controls="vert-tabs-2" aria-selected="false"> {{ $documento_manuales->nombre_doc }}</a>
                                                    </li>
                                                @endforeach 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-9 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <!--LI MANUALES-->
                                            <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                                                <embed id="pdf_manuales" src="" width="100%" height="675" type="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PROCESOS --}}
                    <div class="tab-pane fade" id="procesos" role="tabpanel" aria-labelledby="procesos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Procesos</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav flex-column nav-tabs">
                                                @foreach ($documentos_procesos as $documento_procesos)
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" onclick="cambiarProcesos('{{$documento_procesos->directorio}}');" role="tab" aria-controls="vert-tabs-3" aria-selected="false"> {{ $documento_procesos->nombre_doc }}</a>
                                                    </li>
                                                @endforeach 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-9 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <!--LI PROCESOS-->
                                            <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                                                <embed id="pdf_procesos" src="" width="100%" height="675" type="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PROCEDIMIENTOS --}}
                    <div class="tab-pane fade" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Procedimientos</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav flex-column nav-tabs">
                                                @foreach ($documentos_procedimientos as $documento_procedimientos)
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" onclick="cambiarProcedimientos('{{$documento_procedimientos->directorio}}');" role="tab" aria-controls="vert-tabs-4" aria-selected="false"> {{ $documento_procedimientos->nombre_doc }}</a>
                                                    </li>
                                                @endforeach 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-9 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <!--LI PROCEDIMIENTOS-->
                                            <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                                                <embed id="pdf_procedimientos" src="" width="100%" height="675" type="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- INSTRUCTIVOS --}}
                    <div class="tab-pane fade" id="instructivos" role="tabpanel" aria-labelledby="instructivos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Instructivos</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <ul class="nav flex-column nav-tabs">
                                                @foreach ($documentos_instructivos as $documento_instructivos)
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" onclick="cambiarInstructivos('{{$documento_instructivos->directorio}}');" role="tab" aria-controls="vert-tabs-5" aria-selected="false"> {{ $documento_instructivos->nombre_doc }}</a>
                                                    </li>
                                                @endforeach 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-9 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <!--LI INSTRUCTIVOS-->
                                            <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
                                                <embed id="pdf_instructivos" src="" width="100%" height="675" type="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FORMATOS --}}
                    <div class="tab-pane fade" id="formatos" role="tabpanel" aria-labelledby="formatos-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Protocolos</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table id="tbl_codigos" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                        <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Código UIS</th>
                                                                <th scope="col">Código</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($proyectos as $proyecto)
                                                            <tr>
                                                                <td style="cursor:pointer" onclick="list_codigos({{$proyecto->id}});">{{ $proyecto->no18 }}</td>
                                                                <td style="cursor:pointer" onclick="list_codigos({{$proyecto->id}});">{{ $proyecto->no20 }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-7 border-left">
                                        <div class="card" id="buscador" style="display:none">
                                            <div class="card-header">
                                                <h6 id="nombre_codigo"></h6>
                                                {!! Form::hidden('protocolo_id', null, ['id' => 'protocolo_id']) !!}
                                            </div>
                                            <div class="col p-3">
                                                {!! Form::select('doc_formatos', $documentos_formatos, null, ['class' => 'form-control select2 select2-selection', 'id' =>'doc_formatos', 'style' => 'width: 100%',  'placeholder' => 'Selecciona un formato']) !!}
                                            </div>

                                            <br/>
                                            <div class="table-responsive" id="tabla_buscador" style="display:none">
                                                <div align="left">
                                                    <button id="new_format" type="button" class="btn btn-primary"  onclick="CreateFormato(); cargarDatosProtocolo();">
                                                    <i class="fas fa-file"></i> Nuevo</button>  
                                                </div><br/>
                                                <table id="table-formato" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:100%;">
                                                    <thead class="bg-mexg1 text-white">
                                                        <tr>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Realizado por:</th>
                                                            <th scope="col">Descargar / Eliminar</th>
                                                            <th scope="col">Editar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    {{-- FORMATOS END --}}
                </div>

            </div>

</div>

<!--MODALS-->
@include('documentos_id.modals')

@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('vendor/select2/css/select2.css?1') }}" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('vendor/select2/js/select2.full.js') }}"></script>

    <script src="{{ asset('js/documentos_id.js?4') }}"></script>
@stop