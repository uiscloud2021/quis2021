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
                        {!! Form::label('codigo3', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo3', null, ['class' => 'form-control 3no1', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>
    
                    <div class="form-group" id="div2">
                        {!! Form::label('titulo3', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo3', null, ['class' => 'form-control 3no2', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>
    
                    <div class="form-group" id="div3">
                        {!! Form::label('disenio3', '3. Diseño', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('disenio3', null, ['class' => 'form-control 3no3', 'placeholder' => 'Diseño', 'required']) !!}
                        </div>
                    </div>
    
                    <div class="migracionCampos row">
                        <div class="col form-group" id="div18">
                            {!! Form::label('75no', '4. Grupo de estudio:', ['class' => 'form-label']) !!}
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
                        {!! Form::label('tamanio3', '5. Tamaño de la muestra', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('tamanio3', null, ['class' => 'form-control 3no5', 'placeholder' => 'Tamaño de la muestra', 'required']) !!}
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_4']) !!}
                    
                    
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
                        {!! Form::label('titulocorto4', '3. Titulo Corto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulocorto4', null, ['class' => 'form-control', 'placeholder' => 'Titulo Corto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('departamento4', '4. Departamento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('departamento4', null, ['class' => 'form-control', 'placeholder' => 'Departamento', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('patrocinadores4', '5. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('patrocinadores4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div6">
                        {!! Form::label('fecha4', '6. Fecha de la versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha4', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('versiones4', '7. Versiones previas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('versiones4', null, ['class' => 'form-control', 'placeholder' => 'Versiones', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('enmiendas4', '8. Enmiendas incluidas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('enmiendas4', null, ['class' => 'form-control', 'placeholder' => 'Enmiendas', 'required']) !!}
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_5']) !!}
                    
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('sitio5', '1. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('sitio5', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerosujeto5', '2. Número de sujeto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('numerosujeto5', null, ['class' => 'form-control', 'placeholder' => 'Número de sujeto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('grupo5', '3. Grupo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('grupo5', null, ['class' => 'form-control', 'placeholder' => 'Grupo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('version5', '4.  Versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('version5', null, ['class' => 'form-control', 'placeholder' => 'Versión', 'required']) !!}
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
             <div style="display: none" id="body-6" name="body-reporteCaso">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reporteCaso']) !!}
                    
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('sitio6', '1. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
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
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('numerosujeto6', null, ['class' => 'form-control', 'placeholder' => 'Número de sujeto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('version6', '4.  Versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
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
                        {!! Form::label('iniciales6', '6.  Iniciales', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('iniciales6', null, ['class' => 'form-control', 'placeholder' => 'Iniciales', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div7">
                        {!! Form::label('edad6', '7.  Edad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('edad6', null, ['class' => 'form-control', 'placeholder' => 'Edad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('sexo6', '4. Sexo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::select('sexo6', [ 'Hombre' => 'Hombre', 'Mujer' => 'Mujer','Otro'=>'Otro' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione sexo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('ocupacion6', '9.  Ocupación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('ocupacion6', null, ['class' => 'form-control', 'placeholder' => 'Ocupación', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('escolaridad6', '10.  Escolaridad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('escolaridad6', null, ['class' => 'form-control', 'placeholder' => 'Escolaridad', 'required']) !!}
                        </div>
                    </div>

                    <div class="migracionCampos row">
                        <div class="col form-group" id="div18">
                            {!! Form::label('6-75no', 'Agregar variables:', ['class' => 'form-label']) !!}
                            <div id="wrapper_migraciondoc2">
                                {!! Form::label('6v-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                                {!! Form::label('6-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('6v-75no18', null, ['class' => 'form-control','placeholder' => 'Variable', 'required']) !!}
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_7']) !!}
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('codigo7', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo7', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('nombreproducto7', '2. Nombre del producto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('nombreproducto7', null, ['class' => 'form-control', 'placeholder' => 'Nombre del producto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('patrocinadores7', '3. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
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
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('versiones7', null, ['class' => 'form-control', 'placeholder' => 'Versiones previas', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div6">
                        {!! Form::label('enmiendas7', '6. Enmiendas incluidas', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
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
                        {!! Form::label('codigoUis8', '2. Código UIS', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file"></i></span>
                            {!! Form::text('codigoUis8', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                        </div>
                    </div>
                    

                    <div class="form-group" id="div3">
                        {!! Form::label('estado8', '3. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado8', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('ciudad8', '4. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad8', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
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
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores8', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div8">
                        {!! Form::label('investigadorprincipal8', '8. Investigador Principal (Nombre Completo)', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('investigadorprincipal8', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_9']) !!}
                    
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
                        {!! Form::label('direccion9', '5. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::select('direccion9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México. ', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México. ','Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.'=>'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('patrocinadores9', '6. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores9', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('tipoinvestigador9', '7. Rol de Investigación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('tipoinvestigador9', [ 'Investigador Principal' => 'Investigador Principal', 'Sub Investigador' => 'Sub Investigador','Coordinador de Estudios'=>'Coordinador de Estudios' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione rol de investigación', 'required']) !!}
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
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_10']) !!}
                    
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
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
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
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_11']) !!}
                    
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
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
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
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
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
            {{-- END Autorizacion --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Instalaciones --}}
             <div style="display: none" id="body-12" name="body-instalaciones">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_12']) !!}
                    
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
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::select('lugar12', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de Mexico' => 'Ciudad de Mexico'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione lugar', 'required']) !!}
                        </div>
                    </div>
                    

                    <div class="form-group" id="div4">
                        {!! Form::label('direccion12', '4. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
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
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre12', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('cpe', '8. Cláusula de proveedores externos', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_13']) !!}
                    
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
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::select('lugar13', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de Mexico' => 'Ciudad de Mexico'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione lugar', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('destinatario13', '3. Destinatario', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
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
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_14']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo14', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo14', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2>
                        {!! Form::label('numerositio14', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio14', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
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
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
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

                    <div class="form-group" id="div7">
                        {!! Form::label('nombre14', '7. Nombre completo del investigador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre14', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('sitio14', '8. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('sitio14', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('direccion14', '9. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
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
            {{-- END Aviso de visita --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta Regulatoria --}}
             <div style="display: none" id="body-15" name="body-carpetaregulatoria">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_15']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo15', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo15', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('titulo15', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo15', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('nombre15', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre15', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('numerositio15', '4. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio15', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('direccionsitio15', '5. Domicilio del sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::text('direccionsitio15', null, ['class' => 'form-control', 'placeholder' => 'Domicilio del sitio', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Carpeta Regulatoria --}}


{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta firmas autorizadas --}}
             <div style="display: none" id="body-16" name="body-firmasautorizadas">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_16']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo16', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo16', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio16', '4. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio16', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('nombre16', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre16', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END firmas autorizadas --}}
{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta contabilidad general --}}
             <div style="display: none" id="body-17" name="body-contablidadgeneral">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_17']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo17', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo17', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('nombre17', '2. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre17', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('descunidades17', '3. Descripción de las unidades', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('descunidades17', null, ['class' => 'form-control', 'placeholder' => 'Descripción de las unidades', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div4">
                        {!! Form::label('sitio17', '4. Sitio / Unidad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('sitio17', null, ['class' => 'form-control', 'placeholder' => 'Sitio / Unidad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('almacen17', '5. Almacén', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('almacen17', null, ['class' => 'form-control', 'placeholder' => 'Almacén', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>

            {{-- END Contabilidad general --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta contabilidad por sujeto --}}
             <div style="display: none" id="body-18" name="body-contablidadsujeto">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_18']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo18', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo18', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('nombre18', '2. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre18', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('descunidades18', '3. Descripción de las unidades', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('descunidades18', null, ['class' => 'form-control', 'placeholder' => 'Descripción de las unidades', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div4">
                        {!! Form::label('numsitio18', '4. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('numsitio18', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('numsujeto18', '5. Almacén', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('numsujeto18', null, ['class' => 'form-control', 'placeholder' => 'No. de sujeto', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>

            {{-- END Contabilidad por sujeto --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta embarque y devolucion--}}
             <div style="display: none" id="body-19" name="body-embarquedevolucion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_19']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo19', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo19', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('titulo19', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo19', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('patrocinadores19', '3. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores19', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('sitio19', '4. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('sitio19', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div5">
                        {!! Form::label('numsitio19', '5. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('numsitio19', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('numsitioc19', '6. Contacto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('numsitioc19', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('numsitior19', '7. Respaldo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('numsitior19', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div4">
                        {!! Form::label('telefono19', '8. Teléfono', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            {!! Form::number('telefono19', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'required']) !!}
                        </div>
                    </div>

                    

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END embarque y devolucions --}}



{{-- ======================================================================================================================================================================= --}}


            
             {{-- Envio y rescepcion --}}
             <div style="display: none" id="body-20" name="body-envio">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_20']) !!}

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo20', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo20', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numsitio20', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('numsitio20', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>
                    
                    <center>{!! Form::label('recibo', 'Para entregar a', ['class' => 'form-label']) !!}</center>
                    
                    <div class="form-group" id="div1">
                        {!! Form::label('nombre20', '1. Nombre completo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('nombre20', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div2">
                        {!! Form::label('direccion20', '2. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::text('direccion20', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'required']) !!}
                        </div>
                    </div>

                    
                    <div class="form-group" id="div3">
                        {!! Form::label('ciudad20', '3. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad20', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('estado20', '4. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado20', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('pais20', '5. País', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('pais20', null, ['class' => 'form-control', 'placeholder' => 'País', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('cp20', '6. Código postal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::number('cp20', null, ['class' => 'form-control', 'placeholder' => 'Código postal', 'required']) !!}
                        </div>
                    </div>            
                    
                    <div class="form-group" id="div7">
                        {!! Form::label('telefono20', '7. Teléfono', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            {!! Form::number('telefono20', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('correo20', '8. Correo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            {!! Form::text('correo20', null, ['class' => 'form-control', 'placeholder' => 'Correo', 'required']) !!}
                        </div>
                    </div>
                    

                    <center>{!! Form::label('envio', 'Persona que envía', ['class' => 'form-label']) !!}</center>

                    <div class="form-group" id="div9">
                        {!! Form::label('nombree20', '1. Nombre completo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('nombree20', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('telefonoe20', '2. Teléfono', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            {!! Form::number('telefonoe20', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div11">
                        {!! Form::label('correoe20', '3. Correo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            {!! Form::text('correoe20', null, ['class' => 'form-control', 'placeholder' => 'Correo', 'required']) !!}
                        </div>
                    </div>



                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END eenvio y recepcion --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Recibo de materiales--}}
             <div style="display: none" id="body-23" name="body-recibomateriales">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_recibomateriales']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo23', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo23', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('titulo23', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo23', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('patrocinadores23', '3. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores23', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('sitio23', '4. Sitio clínico', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('sitio23', null, ['class' => 'form-control', 'placeholder' => 'Nombre de sitio clínico', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div5">
                        {!! Form::label('direccionsitio23', '5. Dirección de sitio clínico', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::text('direccionsitio23', null, ['class' => 'form-control', 'placeholder' => 'Dirección de sitio clínico', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('fecha23', '6. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha23', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('investigador23', '7. Investigador Principal (Nombre Completo)', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('investigador23', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div9">
                        {!! Form::label('nombre23', '8. Nombre de quien envía', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('nombre23', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div9">
                        {!! Form::label('puesto23', '9. Puesto de quien envía', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('puesto23', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                        </div>
                    </div>

                    <div class="migracionCampos row">
                        <div class="col form-group" id="div18">
                            {!! Form::label('23-75no', '10. Material a enviar:', ['class' => 'form-label']) !!}
                            <div id="wrapper_doc_23">
                                {!! Form::label('23-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('23-75no18', null, ['class' => 'form-control','placeholder' => 'Descripción de material', 'required']) !!}
                                <button type="button" id="add_doc_23" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
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
            {{-- END Recibo de materiales --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta Devolucion de materiales --}}
             <div style="display: none" id="body-24" name="body-devolucion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_24']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo24', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo24', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio24', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio24', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('nombre24', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre24', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END DEvolucion de materiales --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- enrolamiento --}}
             <div style="display: none" id="body-28" name="body-enrolamiento">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_28']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo28', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo28', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio28', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio28', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('nombre28', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre28', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END enrolamiento --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Carpeta identificacion de sujetos --}}
             <div style="display: none" id="body-29" name="body-identificacion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_29']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo29', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo29', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio29', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio29', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('nombre29', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre29', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END identificacion de sujetos --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Visitas al sitio --}}
             <div style="display: none" id="body-30" name="body-visitas">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_30']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo30', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo30', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio30', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio30', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('nombre30', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre30', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Visitas al sitio --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Aviso de falla de seleccion --}}
             <div style="display: none" id="body-31" name="body-avisofalla">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_31']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo31', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo31', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('titulo31', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo31', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('patrocinadores31', '3. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores31', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('direccionsitio31', '4. Dirección de sitio clínico', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::text('direccionsitio31', null, ['class' => 'form-control', 'placeholder' => 'Dirección de sitio clínico', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('fecha31', '5. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha31', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('investigador31', '6. Investigador Principal (Nombre Completo)', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('investigador31', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div7">
                        {!! Form::label('apellido31', '7. Apellido del Investigador Principal (Nombre Completo)', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('apellido31', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('pais31', '8. País', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('pais31', null, ['class' => 'form-control', 'placeholder' => 'País', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('numsitio31', '9. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::text('numsitio31', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('numsujeto31', '10. Almacén', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('numsujeto31', null, ['class' => 'form-control', 'placeholder' => 'No. de sujeto', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div11">
                        {!! Form::label('fechanacimiento31', '11. Fecha de nacimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechanacimiento31', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div12">
                        {!! Form::label('genero31', '12. Género', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::select('genero31', [ 'Hombre' => 'Hombre', 'Mujer' => 'Mujer','Otro'=>'Otro' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione género', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div13">
                        {!! Form::label('fechafalla31', '13. Fecha de falla de selección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechafalla31', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>


                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Aviso de falla de seleccion --}}

{{-- ======================================================================================================================================================================= --}}


             {{-- Seguimiento --}}
             <div style="display: none" id="body-32" name="body-seguimiento">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_seguimiento']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo32', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo32', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('numerositio32', '2. No. de Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            {!! Form::number('numerositio32', null, ['class' => 'form-control', 'placeholder' => 'No. de Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('fechaseguimiento32', '3. Fecha de seguimineto', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechaseguimiento32', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('tipovisita32', '4. Tipo de visita', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('tipovisita32', [ 'Apertura' => 'Apertura', 'Monitoreo' => 'Monitoreo', 'Auditoría'=>'Auditoría', 'Cierre'=>'Cierre','Terminación'=>'Terminación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de visita', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('fechavisita32', '5. Fecha de visita', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechavisita32', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div6">
                        {!! Form::label('nombre32', '6. Nombre completo del investigador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::text('nombre32', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('sitio32', '7. Sitio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                            {!! Form::text('sitio32', null, ['class' => 'form-control', 'placeholder' => 'Sitio', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('direccion32', '8. Dirección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::text('direccion32', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div9">
                        {!! Form::label('estado32', '9. Estado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('estado32', null, ['class' => 'form-control', 'placeholder' => 'Estado', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('ciudad32', '10. Ciudad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                            {!! Form::text('ciudad32', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div11">
                    {!! Form::label('cp32', '11. C.P.', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                        {!! Form::text('cp32', null, ['class' => 'form-control', 'placeholder' => 'C.P.', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div12">
                    {!! Form::label('pais32', '12.  País', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                        {!! Form::text('pais32', null, ['class' => 'form-control', 'placeholder' => 'País', 'required']) !!}
                    </div>
                </div>

                <div class="migracionCampos row">
                    <div class="col form-group" id="div13">
                        
                        <div id="wrapper_doc32">
                            <div>
                            {!! Form::label('32-75no', '13.  Elementos de acción:', ['class' => 'form-label']) !!}
                            <br>
                            {!! Form::label('32-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                        
                            <div class="form-group" id="div13-1">
                                {!! Form::label('fi-75no18', 'Fecha inicio', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('fi-75no18', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group" id="div13-2">
                                {!! Form::label('ff-75no18', 'Fecha fin', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('ff-75no18', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                                
                            <div class="form-group" id="div13-3">
                                {!! Form::label('edo-75no18', 'Estado', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                    {!! Form::select('edo-75no18', [ 'Abierto' => 'Abierto', 'Cerrado' => 'Cerrado' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estado', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div13-4">
                                {!! Form::label('ti-75no18', 'Título', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                    {!! Form::text('ti-75no18', null, ['class' => 'form-control', 'placeholder' => 'Título', 'required']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group" id="div13-5">
                                {!! Form::label('ac-75no18', 'Acción requerida', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('ac-75no18', null, ['class' => 'form-control', 'placeholder' => 'Acción requerida', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div13-6">
                                {!! Form::label('no-75no18', 'Notas', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('no-75no18', null, ['class' => 'form-control', 'placeholder' => 'Notas', 'required']) !!}
                                </div>
                            </div>
                         </div>  
                        </div>
                        <button type="button" id="add_doc_32" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                        
                    </div>
                </div>


                <div class="migracionCampos row">
                    <div class="col form-group" id="div14">
                        
                        <div id="wrapper_doc32b">
                            <div>
                            {!! Form::label('32b-75no', '14.  Desviaciones:', ['class' => 'form-label']) !!}
                            <br>
                            {!! Form::label('32b-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            
                            <div class="form-group" id="div14-1">
                                {!! Form::label('su-75no18', 'Sujeto', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    {!! Form::text('su-75no18', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div14-2">
                                {!! Form::label('fe-75no18', 'Fecha evento', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('fe-75no18', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group" id="div14-3">
                                {!! Form::label('fr-75no18', 'Fecha reporte', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('fr-75no18', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                                
                            <div class="form-group" id="div14-4">
                                {!! Form::label('edod-75no18', 'Estado', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                    {!! Form::select('edod-75no18', [ 'Abierto' => 'Abierto', 'Cerrado' => 'Cerrado' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estado', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div14-5">
                                {!! Form::label('vi-75no18', 'Visita', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('vi-75no18', null, ['class' => 'form-control', 'placeholder' => 'Título', 'required']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group" id="div14-6">
                                {!! Form::label('se-75no18', 'Severidad', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('se-75no18', null, ['class' => 'form-control', 'placeholder' => 'Acción requerida', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div14-7">
                                {!! Form::label('c1-75no18', 'Categoría 1', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('c1-75no18', null, ['class' => 'form-control', 'placeholder' => 'Categoría 1', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div14-8">
                                {!! Form::label('c2-75no18', 'Categoría 2', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('c2-75no18', null, ['class' => 'form-control', 'placeholder' => 'Categoría 2', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="14-9">
                                {!! Form::label('de-75no18', 'Descripción', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('de-75no18', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div14-10">
                                {!! Form::label('acc-75no18', 'Acciones', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('acc-75no18', null, ['class' => 'form-control', 'placeholder' => 'Acciones', 'required']) !!}
                                </div>
                            </div>
                         
                            <div class="form-group" id="div14-11">
                                {!! Form::label('av-75no18', 'Aviso CEI', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    {!! Form::select('av-75no18', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div14-12">
                                {!! Form::label('fav-75no18', 'Fecha aviso', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('fav-75no18', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group" id="div14-13">
                                {!! Form::label('ffi-75no18', 'Fecha fin', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('ffi-75no18', null, ['class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                          </div>
                        </div>
                        <button type="button" id="add_doc_32b" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                        
                    </div>
                </div>




                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Seguimiento --}}

{{-- ======================================================================================================================================================================= --}}

             {{-- Aviso de terminacion --}}
             <div style="display: none" id="body-33" name="body-avisoterminacion">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_33']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo33', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo33', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('titulo33', '2. Título', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::text('titulo33', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div3">
                        {!! Form::label('patrocinadores33', '3. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores33', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div4">
                        {!! Form::label('fecha33', '4. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fecha33', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('lugar33', '5. Lugar', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            {!! Form::select('lugar33', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de Mexico' => 'Ciudad de Mexico'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione lugar', 'required']) !!}
                        </div>
                    </div>

                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Aviso de terminacion--}}


{{-- ======================================================================================================================================================================= --}}

             {{-- Aviso de terminacion --}}
             <div style="display: none" id="body-40" name="body-informe">
                
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_informe']) !!}
                    

                    <div class="form-group" id="div1">
                        {!! Form::label('codigo40', '1. Código', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('codigo40', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('patrocinadores40', '2. Patrocinador', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('patrocinadores40', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group" id="div3">
                        {!! Form::label('fechainicio40', '3. Fecha inicio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechainicio40', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div4">
                        {!! Form::label('fechater40', '4. Fecha de término', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('fechater40', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('md40', '5. Prueba de un nuevo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                            {!! Form::select('md40', [ 'MEDICAMENTO' => 'MEDICAMENTO', 'DISPOSITIVO' => 'DISPOSITIVO'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('nombremd40', '6. Nombre del nuevo medicamento o dispositivo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('nombremd40', null, ['class' => 'form-control', 'placeholder' => 'Nombre del nuevo medicamento o dispositivo', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div7">
                        {!! Form::label('patologia40', '7. Patología', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            {!! Form::text('patologia40', null, ['class' => 'form-control', 'placeholder' => 'Patología', 'required']) !!}
                        </div>
                    </div>

                    <div class="migracionCampos row">
                        <div class="col form-group" id="div8">
                            {!! Form::label('40-75no', '8. Instituciones participantes:', ['class' => 'form-label']) !!}
                            <div id="wrapper_doc_40">
                                {!! Form::label('40-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('40-75no18', null, ['class' => 'form-control','placeholder' => 'Agregar instituciones participantes', 'required']) !!}
                                <button type="button" id="add_doc_40" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="migracionCampos row">
                        <div class="col form-group" id="div9">
                            {!! Form::label('40b-75no', '9. Personal participante:', ['class' => 'form-label']) !!}
                            <div id="wrapper_doc_40b">
                                {!! Form::label('40b-75no18', '', ['class' => 'form-label', 'hidden']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('40b-75no18', null, ['class' => 'form-control','placeholder' => 'Agregar personal participante', 'required']) !!}
                                <button type="button" id="add_doc_40b" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="div10">
                        {!! Form::label('participacion40', '10. Tipo de participación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                            {!! Form::select('participacion40', [ 'ANÁLISIS DE FACTIBILIDAD' => 'ANÁLISIS DE FACTIBILIDAD', 'VINCULACIÓN' => 'VINCULACIÓN','INTEGRACIÓN DE EQUIPO' => 'INTEGRACIÓN DE EQUIPO','CAPACITACIÓN' => 'CAPACITACIÓN','DESARROLLO DEL PROYECTO' => 'DESARROLLO DEL PROYECTO','ADMINISTRACIÓN DEL PROYECTO' => 'ADMINISTRACIÓN DEL PROYECTO','INVESTIGADOR PRINCIPAL' => 'INVESTIGADOR PRINCIPAL','SUB-INVESTIGADOR' => 'SUB-INVESTIGADOR','COORDINACIÓN DE ESTUDIO' => 'COORDINACIÓN DE ESTUDIO'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de participación', 'required']) !!}
                        </div>
                    </div>

                    
                </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelar" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Aviso de terminacion--}}



        </div>
        <!-- END Modal -->


    </div>
    </div>
