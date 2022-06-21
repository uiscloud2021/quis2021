@extends('adminlte::page')

@section('title', 'Documentos')

@section('content_header')
<h4 class="m-0">Documentos Seguridad</h4>
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
                    </ul>
        
                </div>

            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    <!--<div class="tab-pane fade show active" id="esquemas" role="tabpanel" aria-labelledby="esquemas-tab">
                        CARUOSEL
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="https://www.quis.com.mx/quis/areas/sitio/formatos/SC/EQ-SC-1.png" class="mx-auto d-block w-10" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.quis.com.mx/quis/areas/sitio/formatos/SC/EQ-SC-2.png" class="mx-auto d-block w-10" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.quis.com.mx/quis/areas/sitio/formatos/SC/EQ-SC-3.png" class="mx-auto d-block w-10" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </button>
                        </div>
                        CAROUSEL END
                    </div>-->

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
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" onclick="cambiarCapacitacion('assets/C/Ca-C Seguridad.pdf');" role="tab" aria-controls="vert-tabs-1" aria-selected="false"> Ca-C Seguridad</a>
                                                    </li>
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
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" onclick="cambiarManuales('assets/C/1M-C Seguridad.pdf');" role="tab" aria-controls="vert-tabs-2" aria-selected="false"> M-C Seguridad</a>
                                                    </li>
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
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" onclick="cambiarProcesos('assets/C/PC-C Seguridad.pdf');" role="tab" aria-controls="vert-tabs-3" aria-selected="false"> PC-C Seguridad</a>
                                                    </li> 
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
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" onclick="cambiarProcedimientos('assets/C/PNO-C-101 Prevencion.pdf');" role="tab" aria-controls="vert-tabs-4" aria-selected="false"> PNO-C-101 Prevención</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" onclick="cambiarProcedimientos('assets/C/PNO-C-201 Atencion.pdf');" role="tab" aria-controls="vert-tabs-4" aria-selected="false"> PNO-C-201 Atención</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" onclick="cambiarProcedimientos('assets/C/PNO-C-301 Recuperacion.pdf');" role="tab" aria-controls="vert-tabs-4" aria-selected="false"> PNO-C-301 Recuperación</a>
                                                    </li>
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
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" onclick="cambiarInstructivos('assets/C/IT-C Seguridad.pdf');" role="tab" aria-controls="vert-tabs-5" aria-selected="false"> IT-C Seguridad</a>
                                                    </li>
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

                    

                </div>

            </div>

</div>


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
    <script src="{{ asset('js/documentos_seguridad.js?1') }}"></script>
@stop