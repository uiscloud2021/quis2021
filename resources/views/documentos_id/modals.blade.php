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


<!-- Modal ELIMINAR-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    <div class="modal-body">
        ¿Desea eliminar el registro?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminarRegistro" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Eliminar</button>
    </div>
    </div>
</div>
</div>

<!-- TODO Para los formatos que se van a descargar se rellenan algunos campos como el Codigo del protocolo -->
<!-- Modal Formato-->
<div class="modal fade" id="createFormatoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        
        <!-- content Modal -->
        <div class="modal-content" id="content_presentacion">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Nuevo Formato</h5>
                <button type="button" onclick="borrar_campos();" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Datos ID -->
            {!! Form::hidden('documentoformato_id', null, ['id' => 'documentoformato_id']) !!}
            {!! Form::hidden('empresa_id', session('id_empresa'), ['id' => 'empresa_id']) !!}
            {!! Form::hidden('menu_id', null, ['id' => 'menu_id']) !!}
            {!! Form::hidden('formato_id', null, ['id' => 'formato_id']) !!}
            {!! Form::hidden('proyecto_id', null, ['id' => 'proyecto_id']) !!}
            {!! Form::hidden('last_format', $last_format, ['id' => 'last_format']) !!}

            <div class="container-fluid" id="div0">
                {!! Form::label('no0', 'Proyecto (Código UIS)', ['class' => 'form-label']) !!}
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-folder"></i></span>
                    {!! Form::text('no0', null, ['class' => 'form-control', 'id' => 'no0', 'placeholder' => 'Protocolo', 'readonly']) !!}
                </div>
            </div>

{{-- ===================================================================================================================================================================== --}}

            {{-- Propuesta inical --}}
            <div style="display: none" id="body-3" name="body-propuestaInicial">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_propuestaInicial']) !!}
                    
    
                    <div class="form-group" id="div1">
                        {!! Form::label('codigo', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>
    
                    <div class="form-group" id="div2">
                        {!! Form::label('titulo', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>
    
                    <div class="form-group" id="div3">
                        {!! Form::label('disenio', '3. Diseño', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('disenio', null, ['class' => 'form-control', 'placeholder' => 'Diseño', 'required']) !!}
                        </div>
                    </div>
    
                    <div class="migracionCampos row">
                        <div class="col form-group" id="div18">
                            {!! Form::label('75no', 'Grupo de estudio:', ['class' => 'form-label']) !!}
                            <div id="wrapper_migraciondoc">
                                {!! Form::label('75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('75no18', null, ['class' => 'form-control','placeholder' => 'Criterio de inclusión', 'required']) !!}
                                <button type="button" id="add_doc_migracion" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group" id="div4">
                        {!! Form::label('tamanio', '4. Tamaño de la muestra', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('tamanio', null, ['class' => 'form-control', 'placeholder' => 'Tamaño de la muestra', 'required']) !!}
                        </div>
                    </div>
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Invitacion --}}

{{-- ======================================================================================================================================================================= --}}

           

        </div>
        <!-- END Modal -->


    </div>
    </div>