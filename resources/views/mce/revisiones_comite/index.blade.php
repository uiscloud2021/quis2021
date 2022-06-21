@extends('adminlte::page')

@section('title', 'Revisión Protocolo')

@section('content_header')
<h4 class="m-0">Revisión Protocolo</h4>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
@endif

<div class="card">

            <div class="card-header">

                <div class="container-xxl border border-5">

                    <ul class="nav nav-pills nav-fill p-1" id="myTab" role="tablist">
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link active" id="capacitacion-tab" data-bs-toggle="tab" data-bs-target="#capacitacion" type="button" role="tab" aria-controls="capacitacion" aria-selected="false">Presentación</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="manuales-tab" data-bs-toggle="tab" data-bs-target="#manuales" type="button" role="tab" aria-controls="manuales" aria-selected="false">Protocolo</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="procesos-tab" data-bs-toggle="tab" data-bs-target="#procesos" type="button" role="tab" aria-controls="procesos" aria-selected="false">ICF</a>
                        </li>
                        @role('Usuario Regulatorios')
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="procedimientos-tab" data-bs-toggle="tab" data-bs-target="#procedimientos" type="button" role="tab" aria-controls="procedimientos" aria-selected="false">Estudio en animales</a>
                        </li>
                        @endrole
                    </ul>
        
                </div>

            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    
                    {{-- PRESENTACIÓN --}}
                    <div class="tab-pane fade show active" id="capacitacion" role="tabpanel" aria-labelledby="capacitacion-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5 col-sm-5">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Presentaciones</h3>
                                                <div align="right">
                                                    @role('Usuario Regulatorios')
                                                    <button type="button" class="btn btn-info" onclick="CreatePresentacion();">
                                                        <i class="fas fa-file"> Agregar presentación</i>
                                                    </button>   
                                                    @endrole
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table id="tbl_presentacion" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                        <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($mce_presentaciones as $presentacion)
                                                            <tr>
                                                                <td style="cursor:pointer" onclick="download_presentacion('{{$presentacion->directorio}},{{$presentacion->protocolo}}');">{{ $presentacion->protocolo }}</td>
                                                                <td width="10px">
                                                                    @role('Usuario Regulatorios')
                                                                    <button type="button" id="btn_delete" onclick="delete_presentacion({{$presentacion->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
              
                                    <div class="col-7 col-sm-7 border-left">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="card-header">
                                                <h6 id="nombre_presentacion"></h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <embed id="pdf_presentacion" src="" width="100%" height="675" type="application/pdf">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PROTOCOLO --}}
                    <div class="tab-pane fade" id="manuales" role="tabpanel" aria-labelledby="manuales-tab">
                        <div class="card card-primary card-outline">

                            <div id="tabla_protocolo">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Protocolos</h3>
                                                    <div align="right">
                                                        @role('Usuario Regulatorios')
                                                        <button type="button" class="btn btn-info" onclick="CreateProtocolo();">
                                                            <i class="fas fa-file"> Agregar protocolo</i>
                                                        </button> 
                                                        @endrole
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table id="tbl_protocolo" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                            <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Código</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($mce_protocolos as $protocolo)
                                                            <tr>
                                                                <td style="cursor:pointer" onclick="cargarProtocolo('{{$protocolo->proyecto_id}}');">{{ $protocolo->nombre }}</td>
                                                                <td style="cursor:pointer" onclick="cargarProtocolo('{{$protocolo->proyecto_id}}');">{{ $protocolo->codigo }}</td>
                                                                <td width="10px">
                                                                    @role('Usuario Regulatorios')
                                                                    <button type="button" id="btn_delete" onclick="delete_protocolo({{$protocolo->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="preguntas_protocolo" style="display:none">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                {!! Form::select('documentos_protocolos', ['Seleccione documento...' => 'Seleccione documento...'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione documento...', 'onchange' => 'download_protocolo(this.value)', 'id' => 'documentos_protocolos']) !!}
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <a clas="form-label" id="a_protocolo" href="" target="_blank" style="display:none">Ver en tamaño completo</a>
                                                        <embed id="pdf_protocolo" src="" width="100%" height="675" type="application/pdf">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
              
                                        <div class="col-6 col-sm-6 border-left">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                <div class="card-header">
                                                    <h6>Preguntas Protocolo</h6>
                                                </div>
                                                <div class="card-body">
                                                {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formguardar_protocolo']) !!}
                                                    @include('mce.revisiones_comite.form_protocolo')
                                                {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- ICF --}}
                    <div class="tab-pane fade" id="procesos" role="tabpanel" aria-labelledby="procesos-tab">
                        <div class="card card-primary card-outline">

                            <div id="tabla_icf">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">ICF</h3>
                                                    <div align="right">
                                                        @role('Usuario Regulatorios')
                                                        <button type="button" class="btn btn-info" onclick="CreateICF();">
                                                            <i class="fas fa-file"> Agregar ICF</i>
                                                        </button> 
                                                        @endrole
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table id="tbl_icf" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                            <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Código</th>
                                                                <th scope="col">Subir Póliza/Materiales</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($mce_icf as $icf)
                                                            <tr>
                                                                <td style="cursor:pointer" onclick="cargarICF('{{$icf->proyecto_id}}');">{{ $icf->nombre }}</td>
                                                                <td style="cursor:pointer" onclick="cargarICF('{{$icf->proyecto_id}}');">{{ $icf->codigo }}</td>
                                                                <td width="10px">
                                                                    @role('Usuario Regulatorios')
                                                                    <button type="button" id="btn_warning" onclick="CreatePoliza({{$icf->proyecto_id}});" title="Subir Póliza" class="btn btn-warning btn-sm"><span class="fas fa-download"></span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <button type="button" id="btn_warning" onclick="CreateMaterial({{$icf->proyecto_id}});" title="Subir Materiales" class="btn btn-warning btn-sm"><span class="fas fa-download"></span></button>
                                                                    @endrole
                                                                </td>
                                                                <td width="10px">
                                                                    @role('Usuario Regulatorios')
                                                                    <button type="button" id="btn_delete" onclick="delete_icf({{$icf->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="preguntas_icf" style="display:none">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                {!! Form::select('documentos_icf', ['Seleccione documento...' => 'Seleccione documento...'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione documento...', 'onchange' => 'download_icf(this.value)', 'id' => 'documentos_icf']) !!}
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <a clas="form-label" id="a_icf" href="" target="_blank" style="display:none">Ver en tamaño completo</a>
                                                        <embed id="pdf_icf" src="" width="100%" height="675" type="application/pdf">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
              
                                        <div class="col-6 col-sm-6 border-left">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                <div class="card-header">
                                                <h6>Preguntas ICF</h6>
                                                </div>
                                                <div class="card-body">
                                                {!! Form::open(['autocomplete' => 'off', 'id'=>'formguardar_icf']) !!}
                                                    @include('mce.revisiones_comite.form_icf')
                                                {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    {{-- ANIMALES --}}
                    @role('Usuario Regulatorios')
                    <div class="tab-pane fade" id="procedimientos" role="tabpanel" aria-labelledby="procedimientos-tab">
                        <div class="card card-primary card-outline">

                            <div id="tabla_animales">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Estudio en animales</h3>
                                                    <div align="right">
                                                        <button type="button" class="btn btn-info" onclick="CreateAnimales();">
                                                            <i class="fas fa-file"> Agregar estudio</i>
                                                        </button>   
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table id="tbl_animales" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                            <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Código</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($mce_animales as $animales)
                                                            <tr>
                                                                <td style="cursor:pointer" onclick="cargarAnimales('{{$animales->proyecto_id}}');">{{ $animales->nombre }}</td>
                                                                <td style="cursor:pointer" onclick="cargarAnimales('{{$animales->proyecto_id}}');">{{ $animales->codigo }}</td>
                                                                <td width="10px">
                                                                    <button type="button" id="btn_delete" onclick="delete_animales({{$animales->id}});" title="Eliminar" class="btn btn-danger btn-sm"><span class="fas fa-trash-alt"></span></button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="preguntas_animales" style="display:none">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-header">
                                                {!! Form::select('documentos_animales', ['Seleccione documento...' => 'Seleccione documento...'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione documento...', 'onchange' => 'download_animales(this.value)', 'id' => 'documentos_animales']) !!}
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <a clas="form-label" id="a_animales" href="" target="_blank" style="display:none">Ver en tamaño completo</a>
                                                        <embed id="pdf_animales" src="" width="100%" height="675" type="application/pdf">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
              
                                        <div class="col-6 col-sm-6 border-left">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                <div class="card-header">
                                                <h6>Preguntas estudio</h6>
                                                </div>
                                                <div class="card-body">
                                                {!! Form::open(['autocomplete' => 'off', 'id'=>'formguardar_animales']) !!}
                                                    @include('mce.revisiones_comite.form_animales')
                                                {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endrole

                    
                </div>

            </div>

</div>



<!-- Modal ELIMINAR ARCHIVO-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el archivo?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminarRegistro" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal CREAR PRESENTACION-->
<div class="modal fade" id="createPresentacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPresentacionModalLabel">Nueva presentación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_presentacion', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('protocolo', 'Nombre de presentación', ['class' => 'form-label']) !!}
            {!! Form::text('protocolo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'protocolo' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo', 'Presentación en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'archivo', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPresentacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR PROTOCOLO-->
<div class="modal fade" id="createProtocoloModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProtocoloModalLabel">Nuevo protocolo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_protocolo', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('codigo_protocolo', 'Código', ['class' => 'form-label']) !!}
            {!! Form::select('codigo_protocolo', $protocolos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'codigo_protocolo' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nombre_protocolo', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_protocolo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre_protocolo' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo_protocolo', 'Protocolo español en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo_protocolo', null, ['class' => 'form-control', 'id' => 'archivo_protocolo', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('archivo_protocolo2', 'Protocolo inglés en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo_protocolo2', null, ['class' => 'form-control', 'id' => 'archivo_protocolo2', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGProtocolo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR ICF-->
<div class="modal fade" id="createICFModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createICFModalLabel">Nuevo ICF</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_icf', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('codigo_icf', 'Código', ['class' => 'form-label']) !!}
            {!! Form::select('codigo_icf', $protocolos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'codigo_icf' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nombre_icf', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_icf', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre_icf' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo_icf', 'ICF en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo_icf', null, ['class' => 'form-control', 'id' => 'archivo_icf', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGICF" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR ANIMALES-->
<div class="modal fade" id="createAnimalesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAnimalesModalLabel">Nuevo estudio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_animales', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('codigo_animales', 'Código', ['class' => 'form-label']) !!}
            {!! Form::select('codigo_animales', $protocolos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'codigo_animales' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nombre_animales', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_animales', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre_animales' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo_animales', 'Estudio en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo_animales', null, ['class' => 'form-control', 'id' => 'archivo_animales', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGAnimales" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR POLIZA-->
<div class="modal fade" id="createPolizaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPolizaModalLabel">Nueva póliza</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_poliza', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        {!! Form::hidden('codigo_poliza', null, ['class' => 'form-control', 'id' => 'codigo_poliza' ]) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_poliza', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_poliza', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre_poliza' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo_poliza', 'Póliza en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo_poliza', null, ['class' => 'form-control', 'id' => 'archivo_poliza', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPoliza" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR MATERIAL-->
<div class="modal fade" id="createMaterialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createMaterialModalLabel">Nuevo material</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_material', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        {!! Form::hidden('codigo_material', null, ['class' => 'form-control', 'id' => 'codigo_material' ]) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_material', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_material', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre_material' ]) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo_material', 'Material en PDF', ['class' => 'form-label']) !!}
            {!! Form::file('archivo_material', null, ['class' => 'form-control', 'id' => 'archivo_material', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGMaterial" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
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
    <script src="{{ asset('js/mce/revisiones.js?5') }}"></script>
@stop