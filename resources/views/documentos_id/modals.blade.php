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
            {{-- END propuesta inical --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Protocolo de investigacion --}}
             <div style="display: none" id="body-4" name="body-protocolo-de-investigacion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_protocoloInvestigacion']) !!}
                    
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('codigo4', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('titulo4', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('titulocorto', '3. Titulo Corto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('titulocorto', null, ['class' => 'form-control', 'placeholder' => 'Titulo Corto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('departamento', '4. Departamento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('departamento', null, ['class' => 'form-control', 'placeholder' => 'Departamento', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('patrocinador', '5. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinador', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('fecha', '6. Fecha de la versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('versiones', '7. Versiones previas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('versiones', null, ['class' => 'form-control', 'placeholder' => 'Versiones', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('enmiendas', '8. Enmiendas incluidas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('enmiendas', null, ['class' => 'form-control', 'placeholder' => 'Enmiendas', 'required']) !!}
                        </div>
                    </div>
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END protocolo de investigacion --}}

            {{-- ======================================================================================================================================================================= --}}


             {{-- Consentimiento Informado --}}
             <div style="display: none" id="body-5" name="body-consentimiento-informado">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_consentimientoInformado']) !!}
                    
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('sitio', '1. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('sitio', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerosujeto', '2. Número de sujeto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('numerosujeto', null, ['class' => 'form-control', 'placeholder' => 'Número de sujeto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('grupo', '3. Grupo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('grupo', null, ['class' => 'form-control', 'placeholder' => 'Grupo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('version', '4.  Versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('version', null, ['class' => 'form-control', 'placeholder' => 'Versión', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('fecha5', '5. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha5', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Consentimiento Informado --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Reporte de caso --}}
             <div style="display: none" id="body-6" name="body-consentimiento-informado">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reporteCaso']) !!}
                    
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('sitio6', '1. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('sitio6', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('codigo6', '2. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo6', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('numerosujeto6', '3. Número de sujeto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('numerosujeto6', null, ['class' => 'form-control', 'placeholder' => 'Número de sujeto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('version6', '4.  Versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('version6', null, ['class' => 'form-control', 'placeholder' => 'Versión', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('fecha6', '5. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha6', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('iniciales', '6.  Iniciales', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('iniciales', null, ['class' => 'form-control', 'placeholder' => 'Iniciales', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div7">
                        {!! Form::label('edad', '7.  Edad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('edad', null, ['class' => 'form-control', 'placeholder' => 'Edad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('sexo', '4. Sexo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('sexo', [ 'Hombre' => 'Hombre', 'Mujer' => 'Mujer','Otro'=>'Otro' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione sexo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('ocupacion', '9.  Ocupación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('ocupacion', null, ['class' => 'form-control', 'placeholder' => 'Ocupación', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('escolaridad', '10.  Escolaridad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('escolaridad', null, ['class' => 'form-control', 'placeholder' => 'Escolaridad', 'required']) !!}
                        </div>
                    </div>

                    <div class="migracionCampos row">
                        <div class="col form-group" id="div18">
                            {!! Form::label('6-75no', 'Agregar variables:', ['class' => 'form-label']) !!}
                            <div id="wrapper_migraciondoc2">
                                {!! Form::label('6-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('6v-75no18', null, ['class' => 'form-control','placeholder' => 'Variable', 'required']) !!}
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('6-75no18', null, ['class' => 'form-control','placeholder' => 'Valor', 'required']) !!}
                                
                                <button type="button" id="add_doc_migracion2" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>

        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Reporte de caso --}}


{{-- ======================================================================================================================================================================= --}}


             {{-- Folleto del investigador --}}
             <div style="display: none" id="body-7" name="body-folleto-investigador">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_folletoInvestigador']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('codigo7', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo7', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('nombreproducto', '2. Nombre del producto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombreproducto', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('patrocinadores', '3. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('patrocinadores', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('fecha7', '4. Fecha de la versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha7', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('versiones7', '5. Versiones previas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('versiones7', null, ['class' => 'form-control', 'placeholder' => 'Versiones previas', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div6">
                        {!! Form::label('enmiendas7', '6. Enmiendas incluidas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('enmiendas7', null, ['class' => 'form-control', 'placeholder' => 'Enmiendas incluidas', 'required']) !!}
                        </div>
                    </div>
                    

        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Folleto de investigador --}}

 {{-- ======================================================================================================================================================================= --}}


             {{-- sometimiento --}}
             <div style="display: none" id="body-8" name="body-sometimiento">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_sometimiento']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('codigo8', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo8', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('codigoUis', '2. Código UIS', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file"></i></span>
                            {!! Form::text('codigoUis', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                        </div>
                    </div>
                    

                    <div class="form-group" id="div3">
                        {!! Form::label('estado', '3. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('ciudad', '4. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    

                    <div class="form-group" id="div5">
                        {!! Form::label('fecha8', '5. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha8', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('titulo8', '6. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo8', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div7">
                        {!! Form::label('patrocinadores8', '7. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('patrocinadores8', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div8">
                        {!! Form::label('investigadorprincipal', '8. Investigador Principal (Nombre Completo)', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('investigadorprincipal', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="migracionCampos row">
                        <div class="col form-group" id="div18">
                            {!! Form::label('8-75no', 'Documentos a revisar:', ['class' => 'form-label']) !!}
                            <div id="wrapper_doc_8">
                                {!! Form::label('8-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('8-75no18', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha del documento', 'required']) !!}
                                <button type="button" id="add_doc_8" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>
                    

        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END sometimiento --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Compromisos --}}
             <div style="display: none" id="body-9" name="body-compromisos">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_compromisos']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('fecha9', '1. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha9', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('codigo9', '2. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo9', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div3">
                        {!! Form::label('estado9', '3. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado9', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('ciudad9', '4. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad9', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('direccion', '5. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::select('direccion', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México. ','Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.'=>'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('patrocinadores9', '6. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('patrocinadores9', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('tipoinvestigador', '7. Rol de Investigación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('tipoinvestigador', [ 'Investigador Principal' => 'Investigador Principal', 'Sub Investigador' => 'Sub Investigador','Coordinador de Estudios'=>'Coordinador de Estudios' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione rol de investigación', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('titulo9', '8. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo9', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('tituloabreviado9', '9. Título abreviado del miembro', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('tituloabreviado9', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado (Dr., Dra., etc...)', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10>
                        {!! Form::label('nombre9', '10. Nombre Completo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('nombre9', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div11">
                        {!! Form::label('cedula9', '11. Cédula', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('cedula9', null, ['class' => 'form-control', 'placeholder' => 'Cédula', 'required']) !!}
                        </div>
                    </div>
        
                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END compromisos --}}


{{-- ======================================================================================================================================================================= --}}


             {{-- Responsabilidades --}}
             <div style="display: none" id="body-10" name="body-responsabilidades">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_responsabilidades']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('fecha10', '1. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha10', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('codigo10', '2. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo10', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div3">
                        {!! Form::label('estado10', '3. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado10', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('ciudad10', '4. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad10', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('direccion10', '5. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::select('direccion10', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México. ','Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.'=>'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('patrocinadores10', '6. Nombre del patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('patrocinadores10', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div7">
                        {!! Form::label('titulo10', '7. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo10', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('tituloabreviado10', '8. Título abreviado del miembro', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('tituloabreviado10', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado (Dr., Dra., etc...)', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9>
                        {!! Form::label('nombre10', '9. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('nombre10', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END responsabilidades --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Autorizacion --}}
             <div style="display: none" id="body-11" name="body-autorizacion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_autorizacion']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('fecha11', '1. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha11', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('codigo11', '2. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo11', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div3">
                        {!! Form::label('estado11', '3. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado11', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('ciudad11', '4. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad11', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('direccion11', '5. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::select('direccion11', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México. ','Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.'=>'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('patrocinadores11', '6. Nombre del patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('patrocinadores11', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div7">
                        {!! Form::label('titulo11', '7. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo11', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9>
                        {!! Form::label('nombre11', '9. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('nombre11', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9>
                        {!! Form::label('hospital11', '9.  Nombre del Hospital para atención de urgencias', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('hospital11', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Hospital', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END responsabilidades --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Instalaciones --}}
             <div style="display: none" id="body-12" name="body-instalaciones">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_instalaciones']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('fecha12', '1. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha12', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('codigo12', '2. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo12', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div3">
                        {!! Form::label('lugar12', '3. Lugar', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('lugar12', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de Mexico' => 'Ciudad de Mexico'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione lugar', 'required']) !!}
                        </div>
                    </div>
                    

                    <div class="form-group" id="div4">
                        {!! Form::label('direccion12', '4. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::select('direccion12', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México. ','Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.'=>'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div5">
                        {!! Form::label('titulo12', '5. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo12', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('tituloabreviado12', '8. Título abreviado del miembro', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('tituloabreviado12', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado (Dr., Dra., etc...)', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7>
                        {!! Form::label('nombre12', '7. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('nombre12', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('cpe', '8. Cláusula de proveedores externos', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('cpe', [ 'Si' => 'Si', 'No' => 'No'], null, ['class' => 'form-control', 'placeholder' => 'Cláusula de proveedores externos', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Instalaciones --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- anticorrupcion --}}
             <div style="display: none" id="body-13" name="body-Anticorrupcion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_anticorrupcion']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('fecha13', '1. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha13', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div2">
                        {!! Form::label('lugar13', '2. Lugar', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('lugar13', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de Mexico' => 'Ciudad de Mexico'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione lugar', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('destinatario13', '3. Destinatario', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('destinatario13', null, ['class' => 'form-control', 'placeholder' => 'Destinatario', 'required']) !!}
                        </div>
                    </div>

                   

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END anticorrupcion --}}


{{-- ======================================================================================================================================================================= --}}


             {{-- Aviso de visita --}}
             <div style="display: none" id="body-14" name="body-avisovisita">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisovisita']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo14', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo14', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio14', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::number('numerositio14', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('fechaaviso14', '3. Fecha de aviso', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechaaviso14', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('tipovisita14', '4. Tipo de visita', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('tipovisita14', [ 'Apertura' => 'Apertura', 'Monitoreo' => 'Monitoreo', 'Auditoría'=>'Auditoría', 'Cierre'=>'Cierre','Terminación'=>'Terminación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de visita', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('fechavisita14', '5. Fecha de visita', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechavisita14', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('horainicio', '6. Hora de inicio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            {!! Form::time('horainicio', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7>
                        {!! Form::label('nombre14', '7. Nombre completo del investigador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('nombre14', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8>
                        {!! Form::label('sitio14', '8. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('sitio14', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9>
                        {!! Form::label('direccion14', '9. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('direccion14', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('estado14', '10. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado14', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div11">
                        {!! Form::label('ciudad14', '11. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad14', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div12">
                    {!! Form::label('cp14', '12. C.P.', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                        {!! Form::text('cp14', null, ['class' => 'form-control', 'placeholder' => 'C.P.', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div13">
                    {!! Form::label('pais14', '13.  País', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                        {!! Form::text('pais14', null, ['class' => 'form-control', 'placeholder' => 'País', 'required']) !!}
                    </div>
                </div>


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Instalaciones --}}

        </div>
        <!-- END Modal -->


    </div>
    </div>
