@extends('adminlte::page')

@section('title', 'Sometimientos')

@section('content_header')
<h4 class="m-0">Sometimientos</h4>
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
                            <a class="nav-link active" id="capacitacion-tab" data-bs-toggle="tab" data-bs-target="#capacitacion" type="button" role="tab" aria-controls="capacitacion" aria-selected="false">Archivos recibidos</a>
                        </li>
                        <li class="nav-item p-1" role="presentation">
                            <a class="nav-link" id="manuales-tab" data-bs-toggle="tab" data-bs-target="#manuales" type="button" role="tab" aria-controls="manuales" aria-selected="false">Archivos enviados</a>
                        </li>
                    </ul>
        
                </div>

            </div>

            <div class="card-body">

                <div class="tab-content" id="myTabContent">
                    
                    {{-- RECIBIDOS --}}
                    <div class="tab-pane fade show active" id="capacitacion" role="tabpanel" aria-labelledby="capacitacion-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Archivos recibidos</h3>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table id="tbl_recibidos" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                        <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Comentarios</th>
                                                                <th scope="col">Fecha</th>
                                                                <th scope="col">Usuario quien lo envío</th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ENVIADOS --}}
                    <div class="tab-pane fade" id="manuales" role="tabpanel" aria-labelledby="manuales-tab">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Archivos enviados</h3>
                                                <div align="right">
                                                    <button type="button" class="btn btn-info" onclick="CreateArchivo();">
                                                        <i class="fas fa-file"> Enviar archivo</i>
                                                    </button>   
                                                </div>
                                            </div>
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table id="tbl_enviados" class="table table-striped table-hover table-bordered shadow-lg mt-2" style="width:95%;">
                                                        <thead class="bg-mexg1 text-white">
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Comentarios</th>
                                                                <th scope="col">Usuario a quien se envío</th>
                                                                <th scope="col"></th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
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



<!-- Modal CREAR ENVIADOS-->
<div class="modal fade" id="createEnviadosModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEnviadosModalLabel">Nuevo archivo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enviado', 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'nombre' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('comentarios', 'Comentarios', ['class' => 'form-label']) !!}
            {!! Form::textarea('comentarios', null, ['class' => 'form-control', 'placeholder' => 'Ingrese comentarios o descripción', 'id' => 'comentarios' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('usuario', 'Usuario para quien va dirigido el archivo', ['class' => 'form-label']) !!}
            {!! Form::select('usuario', $users_uis, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'usuario']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('archivo', 'Archivo en ZIP', ['class' => 'form-label']) !!}
            {!! Form::file('archivo', null, ['class' => 'form-control', 'id' => 'archivo', 'placeholder' => 'Seleccione archivo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEnviados" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
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
    <script src="{{ asset('js/mce/sometimientos.js?8') }}"></script>
@stop