@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-bold">Sitio Clínico</li>
            <li class="breadcrumb-item active" aria-current="page">Documentos</li>
        </ol>
    </nav>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">
    <div class="card-header">
        <i class="fa fa-file"></i>
        Documentos 
        <small>descarga</small>
    </div>
    <div class="card-body">

        <div class="card">

            <div class="card-header">

                <div class="container-xxl rounded-pill border border-5">

                    <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link active rounded-pill" id="esquemas-tab" data-bs-toggle="tab" data-bs-target="#esquemas" type="button" role="tab" aria-controls="esquemas" aria-selected="true">Esquemas</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link rounded-pill" id="capacitacion-tab" data-bs-toggle="tab" data-bs-target="#capacitacion" type="button" role="tab" aria-controls="capacitacion" aria-selected="false">Capacitación</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link rounded-pill" id="manuales-tab" data-bs-toggle="tab" data-bs-target="#manuales" type="button" role="tab" aria-controls="manuales" aria-selected="false">Manuales</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link rounded-pill" id="procesos-tab" data-bs-toggle="tab" data-bs-target="#procesos" type="button" role="tab" aria-controls="procesos" aria-selected="false">Procesos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link rounded-pill" id="procedimientos-tab" data-bs-toggle="tab" data-bs-target="#procedimientos" type="button" role="tab" aria-controls="procedimientos" aria-selected="false">Procedimientos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link rounded-pill" id="instructivos-tab" data-bs-toggle="tab" data-bs-target="#instructivos" type="button" role="tab" aria-controls="instructivos" aria-selected="false">Instructivos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link rounded-pill" id="formatos-tab" data-bs-toggle="tab" data-bs-target="#formatos" type="button" role="tab" aria-controls="formatos" aria-selected="false">Formatos</a>
                        </li>
                    </ul>
        
                </div>

            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="esquemas" role="tabpanel" aria-labelledby="esquemas-tab">
                        <!--CARUOSEL-->
                        
                        <!--CAROUSEL END-->
                    </div>

                    {{-- CAPACITACION --}}
                    <div class="tab-pane fade" id="capacitacion" role="tabpanel" aria-labelledby="capacitacion-tab">

                        <div class="row">

                            <div class="col-12 col-sm-5">
                                <div class="table-responsive">
                                    <table id="documentos_capacitacion" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                        <thead class="bg-mexg1 text-white">
                                            <tr>
                                                <th scope="col">Nombre de la capacitación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($documentos_capacitacion as $documento_capacitacion)
                                                <tr id="tr_cambiar_capacitacion" style="cursor: pointer;" onclick="cambiarCapacitacion('{{$documento_capacitacion->directorio}}');">
                                                    <td>{{ $documento_capacitacion->nombre_doc }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-7">
                                
                                <embed id="pdf_capacitacion" src="" width="100%" height="675" type="application/pdf">

                            </div>

                        </div>

                    </div>

                    {{-- MANUALES --}}
                    <div class="tab-pane fade" id="manuales" role="tabpanel" aria-labelledby="manuales-tab">
                        
                        <div class="row">

                            <div class="col-12 col-sm-5">
                                <div class="table-responsive">
                                    <table id="documentos_manuales" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                        <thead class="bg-mexg1 text-white">
                                            <tr>
                                                <th scope="col">Nombre del manual</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($documentos_manuales as $documento_manuales)
                                                <tr id="tr_cambiar_manuales" style="cursor: pointer;" onclick="cambiarManuales('{{$documento_manuales->directorio}}');">
                                                    <td>{{ $documento_manuales->nombre_doc }}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-7">

                                <embed id="pdf_manuales" src="" width="100%" height="675" type="application/pdf">

                            </div>
                            
                        </div>

                    </div>

                    {{-- PROCESOS --}}
                    <div class="tab-pane fade" id="procesos" role="tabpanel" aria-labelledby="procesos-tab">
                        
                        <div class="row">

                            <div class="col-12 col-sm-5">
                                <div class="table-responsive">
                                    <table id="documentos_procesos" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                        <thead class="bg-mexg1 text-white">
                                            <tr>
                                                <th scope="col">Nombre del proceso</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($documentos_procesos as $documento_procesos)
                                                <tr id="tr_cambiar_procesos" style="cursor: pointer;" onclick="cambiarProcesos('{{$documento_procesos->directorio}}');">
                                                    <td>{{ $documento_procesos->nombre_doc }}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-7">

                                <embed id="pdf_procesos" src="" width="100%" height="675" type="application/pdf">

                            </div>
                            
                        </div>

                    </div>

                    {{-- PROCEDIMIENTOS --}}
                    <div class="tab-pane fade" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
                        
                        <div class="row">

                            <div class="col-12 col-sm-5">
                                <div class="table-responsive">
                                    <table id="documentos_procedimientos" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                        <thead class="bg-mexg1 text-white">
                                            <tr>
                                                <th scope="col">Nombre del procedimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($documentos_procedimientos as $documento_procedimientos)
                                                <tr id="tr_cambiar_procedimientos" style="cursor: pointer;" onclick="cambiarProcedimientos('{{$documento_procedimientos->directorio}}');">
                                                    <td>{{ $documento_procedimientos->nombre_doc }}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-7">

                                <embed id="pdf_procedimientos" src="" width="100%" height="675" type="application/pdf">

                            </div>
                            
                        </div>

                    </div>

                    {{-- INSTRUCTIVOS --}}
                    <div class="tab-pane fade" id="instructivos" role="tabpanel" aria-labelledby="instructivos-tab">
                        
                        <div class="row">

                            <div class="col-12 col-sm-5">
                                <div class="table-responsive">
                                    <table id="documentos_instructivos" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%">
                                        <thead class="bg-mexg1 text-white">
                                            <tr>
                                                <th scope="col">Nombre del instructivo</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($documentos_instructivos as $documento_instructivos)
                                                <tr id="tr_cambiar_instructivos" style="cursor: pointer;" onclick="cambiarInstructivos('{{$documento_instructivos->directorio}}');">
                                                    <td>{{ $documento_instructivos->nombre_doc }}</td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-7">

                                <embed id="pdf_instructivos" src="" width="100%" height="675" type="application/pdf">

                            </div>
                            
                        </div>

                    </div>

                    {{-- FORMATOS --}}
                    <div class="tab-pane fade" id="formatos" role="tabpanel" aria-labelledby="formatos-tab">

                        <div class="col py-3">
                            <h5 class="card-title">Buscar Formato</h5>
                        </div>
                        
                        <div class="col p-3">
                            {!! Form::select('doc_formatos', $documentos_formatos, null, ['class' => 'form-control select2 select2-selection', 'id' =>'doc_formatos', 'style' => 'width: 100%',  'placeholder' => 'Selecciona un formato']) !!}
                        </div>


                        <div id="table-formato" style="display: none" class="table-responsive">

                            <div align="right">
                                {{-- TODO: cambiar el metodo, que se va a mandar a llamar en el JS-documentos --}}
                                {{-- <button type="button" class="btn btn-primary" onclick="CreateSeguimiento();"> --}}
                                {{-- <a target="_blank" rel="noreferrer noopener" href="" class="btn btn-primary"><span class="fas fa-file"></span> 
                                    {{ __('PDF') }}</a>  --}}
                                    <!-- TODO: Enviar en el metodo el id del formato para decidir que mola usar o si se abre una ventana nueva -->
                                <button id="new_format" type="button" class="btn btn-primary"  onclick="CreateFormato();">
                                    <i class="fas fa-file"></i> Nuevo formato
                                </button>  
                            </div><br>

                            <table id="formatos_table" class="table table-striped table-hover table-bordered shadow-lg mt-4" style="width:100%;">
                                <thead class="bg-mexg1 text-white">
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Código UIS</th>
                                        <th scope="col">Fecha de aprobación</th>
                                        <th scope="col">Realizado por:</th>
                                        <th scope="col">Descargar/Eliminar</th>
                                        <th scope="col">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>  


                        <div id="download-formato" style="display: none">
                            <div align="right">
                                {{-- TODO: cambiar el metodo, que se va a mandar a llamar en el JS-documentos --}}
                                {{-- <button type="button" class="btn btn-primary" onclick="CreateSeguimiento();"> --}}
                                {{-- <a target="_blank" rel="noreferrer noopener" href="" class="btn btn-primary"><span class="fas fa-file"></span> 
                                    {{ __('PDF') }}</a>  --}}
                                    <!-- TODO: Enviar en el metodo el id del formato para decidir que mola usar o si se abre una ventana nueva -->
                                <button id="new_format" type="button" class="btn btn-primary"  onclick="CreateFormato();">
                                    <i class="fas fa-file"></i> Nuevo formato
                                </button>  
                            </div><br>
                        </div>


                    </div>
                    {{-- FORMATOS END --}}
                </div>

            </div>

        </div>

 
    </div>
</div>

<!--MODALS-->
@include('documentos.modals')

@stop

@section('css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('vendor/select2/css/select2.css?2') }}" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('vendor/select2/js/select2.full.js') }}"></script>

    <script src="{{ asset('js/documentos.js?158') }}"></script>
@stop