@extends('adminlte::page')

@section('title', 'Nuevo Formato CV')

@section('content_header')
@if ($tipo == 'esp')
<h4 class="m-0">FC-SC-2101 CV Español</h4>
@endif
@if ($tipo == 'eng')
<h4 class="m-0">FC-SC-2102 CV English</h4>
@endif
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="overlay-wrapper col-md-12">
                    <div class="overlay" id="overlay" style="position:fixed; display:none">
                        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        <div class="text-bold pt-2"> Guardando...</div>
                    </div>
                    {!! Form::hidden('afCount', $afCount, ['id' => 'afCount']) !!}
                    {!! Form::hidden('edCount', $edCount, ['id' => 'edCount']) !!}
                    {!! Form::hidden('exCount', $exCount, ['id' => 'exCount']) !!}
                    {!! Form::hidden('ceCount', $ceCount, ['id' => 'ceCount']) !!}
                    {!! Form::hidden('enCount', $enCount, ['id' => 'enCount']) !!}
                    {!! Form::hidden('esCount', $esCount, ['id' => 'esCount']) !!}


                    {!! Form::hidden('afiliacion', $afiliacion, ['id' => 'afiliacion']) !!}
                    {!! Form::hidden('educacion', $educacion, ['id' => 'educacion']) !!}
                    {!! Form::hidden('experiencia', $experiencia, ['id' => 'experiencia']) !!}
                    {!! Form::hidden('cedula', $cedula, ['id' => 'cedula']) !!}
                    {!! Form::hidden('entrenamiento', $entrenamiento, ['id' => 'entrenamiento']) !!}
                    {!! Form::hidden('estudio', $estudio, ['id' => 'estudio']) !!}

                    {!! Form::hidden('id', $cv->id, ['class' => 'form-control', 'id'=>'id']) !!}
                    {!! Form::hidden('otro', $all->no29, ['class' => 'form-control', 'id'=>'otro']) !!}
                    {!! Form::hidden('noclinical', $all->no30, ['class' => 'form-control', 'id'=>'noclinical']) !!}

                    {{-- {{$ceCount}} --}}
                    {!! Form::model( $all, ['route' => ['documentos_sc.store_cv'], 'autocomplete' => 'off', 'id'=>'formedit_documentosCV']) !!}

				        @include('documentos_sc.form')

                    <div align="right">
                        <a href="#" onclick="Salir();" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"> Guardar CV</i></button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal SALIR SIN GUARDAR-->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
            ¿Desea salir sin guardar la información?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" id="btnCancelar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnCancelar" class="btn btn-danger">Salir sin guardar</button>
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

    <script src="{{ asset('js/documentos_cv.js?7') }}"></script>
@stop