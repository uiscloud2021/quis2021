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

            {{-- <div class="container-fluid" id="div0">
                {!! Form::label('no0', 'Proyecto (Código UIS)', ['class' => 'form-label']) !!}
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-folder"></i></span>
                    {!! Form::text('no0', null, ['class' => 'form-control', 'id' => 'no0', 'placeholder' => 'Protocolo', 'readonly']) !!}
                </div>
            </div> --}}


{{-- ======================================================================================================================================================================= --}}

                {{-- Confidencialidad de UIS --}}
                <div style="display: none" id="body-9" name="body-confidencialidadUIS">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_confidencialidadUIS']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('9no', 'Dicha información es propiedad de EL CLIENTE:', ['class' => 'form-label']) !!}

                            <div class="p-2 rounded border">

                                <div class="row">

                                    <div class="col form-group">
                                        {!! Form::label('9no1', '1. Nombre', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        {!! Form::text('9no1', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo de la persona o empresa propietaria de la información', 'required']) !!}
                                        </div>
                                    </div>
    
                                </div>
    
                                <div class="row">
    
                                    <div class="col form-group">
                                        {!! Form::label('9no2', '2. Domicilio', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        {!! Form::textarea('9no2', null, ['class' => 'form-control', 'placeholder' => 'Calle número y datos interiores, Colonia, Ciudad, Abreviación de Estado, CP México', 'rows' => '2','required']) !!}
                                        </div>
                                    </div>
    
                                </div>
    
                                <div class="row">
    
                                    <div class="col form-group">
                                        {!! Form::label('9no3', '3. Teléfono', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        {!! Form::text('9no3', null, ['class' => 'form-control', 'placeholder' => 'Teléfono', 'rows' => '2','required']) !!}
                                        </div>
                                    </div>
    
                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCconfidencialidadUIS" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGconfidencialidadUIS" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Confidencialidad de UIS --}}

{{-- ======================================================================================================================================================================= --}}

                {{-- Cotizacion corta --}}
                <div style="display: none" id="body-10" name="body-cotizacionCorta">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cotizacionCorta']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('10no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('10no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('10no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('10no2', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('10no3', '3. Nombre completo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('10no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('10no4', '4. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                {!! Form::text('10no4', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('10no5', '5. Empresa', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('10no5', null, ['class' => 'form-control', 'placeholder' => 'Empresa', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('10no6', '6. Primer apellido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('10no6', null, ['class' => 'form-control', 'placeholder' => 'Primer apellido', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('10no7', '7. Estudio Fase', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('10no7', null, ['class' => 'form-control', 'placeholder' => 'Fase del estudio', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="p-2 rounded border">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div8">
                                        {!! Form::label('10no8', '8. Servicio', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                            {!! Form::text('10no8', null, ['class' => 'form-control', 'placeholder' => 'Nombre del servicio','required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group" id="div9">
                                        {!! Form::label('10no9', '9. Descripción', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('10no9', null, ['class' => 'form-control', 'placeholder' => 'Descripción del servicio', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">
                                    
                                    <div class="col form-group" id="div10">
                                        {!! Form::label('10no10', '10. Tiempo estimado', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            {!! Form::text('10no10', null, ['class' => 'form-control', 'placeholder' => 'Tiempo estimado', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div11">
                                        {!! Form::label('10no11', '11. Total', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::text('10no11', null, ['class' => 'form-control', 'placeholder' => 'Total', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div12">
                                        {!! Form::label('10no12', '12. Moneda', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                            {!! Form::text('10no12', null, ['class' => 'form-control', 'placeholder' => 'Moneda', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div13">
                                        {!! Form::label('10no13', '13. Condiciones de pago', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                            {!! Form::text('10no13', null, ['class' => 'form-control', 'placeholder' => 'Condiciones de pago', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcotizacionCorta" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcotizacionCorta" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Cotizacion corta --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Cotizacion extensa --}}
                <div style="display: none" id="body-11" name="body-cotizacionExtensa">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cotizacionExtensa']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('11no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('11no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('11no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('11no2', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('11no3', '3. Nombre completo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('11no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('11no4', '4. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                {!! Form::text('11no4', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('11no5', '5. Empresa', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('11no5', null, ['class' => 'form-control', 'placeholder' => 'Empresa', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('11no6', '6. Primer apellido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('11no6', null, ['class' => 'form-control', 'placeholder' => 'Primer apellido', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('11no7', '7. Estudio Fase', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('11no7', null, ['class' => 'form-control', 'placeholder' => 'Fase del estudio', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group">

                            <div class="p-2 rounded border border-secondary">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div8">
                                        {!! Form::label('11no8', '8. Total por sujeto', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            {!! Form::text('11no8', null, ['class' => 'form-control', 'placeholder' => 'Total por sujeto','required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group" id="div9">
                                        {!! Form::label('11no9', '9. Total de sujetos (Total por muestra de "XX" sujetos)', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::number('11no9', null, ['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Total sujetos', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">
                                    
                                    <div class="col form-group" id="div11">
                                        {!! Form::label('11no10', '10. Total por muestra de XX sujetos', ['class' => 'form-label combioNMuestra']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            {!! Form::text('11no10', null, ['class' => 'form-control', 'placeholder' => 'Total por muestra de XX sujetos', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="form-group">
                            <div class="p-2 rounded border border-secondary">

                                <div class="row">

                                    <div class="col form-group" id="div11">
                                        {!! Form::label('11no11', '11. Nombre del servicio', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                            {!! Form::text('11no11', null, ['class' => 'form-control', 'placeholder' => 'Nombre del servicio', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div12">
                                        {!! Form::label('11no12', '12. Descripción del servicio', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                            {!! Form::text('11no12', null, ['class' => 'form-control', 'placeholder' => 'Descripción del servicio', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div13">
                                        {!! Form::label('11no13', '13. Tiempo estimado', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                            {!! Form::text('11no13', null, ['class' => 'form-control', 'placeholder' => 'Tiempo estimado', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::label('11no', 'Cédula económica del proyecto', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-secondary">

                                
                                <div class="form-group" id="div14">
                                    {!! Form::label('14no', '14. Servicio', ['class' => 'form-label']) !!}
                                    <div id="wrapper_cotizacionExtdoc">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                            {!! Form::label('14no14', '14. Servicio', ['class' => 'form-label', 'hidden']) !!}
                                            {!! Form::text('11no14', null, [ 'id' => '11no14', 'class' => 'form-control', 'placeholder' => 'Servicio', 'required']) !!}
                                            {!! Form::label('11no15', '15. Total', ['class' => 'form-label', 'hidden']) !!}
                                            {!! Form::text('11no15', null, ['class' => 'form-control', 'placeholder' => 'Total', 'required']) !!}
                                            <button type="button" id="add_cambio_cotizacionExt" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>

                                    </div>
                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div16">
                                        {!! Form::label('11no16', '16. Moneda', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                            {!! Form::text('11no16', null, ['class' => 'form-control', 'placeholder' => 'Moneda', 'required']) !!}
                                        </div>
                                    </div>

                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div17">
                                        {!! Form::label('11no17', '17. Total', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                            {!! Form::text('11no17', null, ['class' => 'form-control', 'placeholder' => 'Total', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::label('11no', 'Condiciones', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-secondary">

                                <div class="row">

                                    <div class="col form-group" id="div18">
                                        {!! Form::label('11no18', '18. Tiempo total', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            {!! Form::text('11no18', null, ['class' => 'form-control', 'placeholder' => 'Tiempo total', 'required']) !!}
                                        </div>
                                    </div>


                                </div>
        
                                <div class="row">

                                    <div class="col form-group" id="div19">
                                        {!! Form::label('11no19', '19. Forma de pago', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                                            {!! Form::text('11no19', null, ['class' => 'form-control', 'placeholder' => 'Forma de pago', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcotizacionExtensa" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcotizacionExtensa" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Cotizacion extensa --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Depositos bancarios --}}
                <div style="display: none" id="body-14" name="body-depositoBancario">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_depositoBancario']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('14no1', '1. Account holder name / Nombre de la empresa', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('14no1', null,['class' => 'form-control', 'placeholder' => 'Account holder name / Nombre de la empresa', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('14no2', '2. Holder address / Domicilio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('14no2', null, ['class' => 'form-control', 'placeholder' => 'Holder address / Domicilio', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('14no3', '3. RFC', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                {!! Form::text('14no3', null, ['class' => 'form-control', 'placeholder' => 'RFC de la empresa', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('14no4', '4. Bank name / Banco', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                {!! Form::text('14no4', null, ['class' => 'form-control', 'placeholder' => 'Nombre del banco', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('14no5', '5. Bank address / Dirección del banco', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('14no5', null, ['class' => 'form-control', 'placeholder' => 'Dirección del banco', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('14no6', '6. City and bank code / Ciudad y código del banco', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('14no6', null, ['class' => 'form-control', 'placeholder' => 'Ciudad y código del banco', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('14no7', '7. Branch and account / Sucursal y cuenta', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('14no7', null, ['class' => 'form-control', 'placeholder' => 'Sucursal y cuenta', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('14no8', '8. CLABE Number for electronic transfer', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('14no8', null, ['class' => 'form-control', 'placeholder' => 'CLABE', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('14no9', '9. SWIFT number', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('14no9', null, ['class' => 'form-control', 'placeholder' => 'Swift', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('14no10', '10. Currency / moneda', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('14no10', null, ['class' => 'form-control', 'placeholder' => 'Moneda', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdepositoBancario" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdepositoBancario" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Depositos bancarios --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Aceptacion de residentes --}}
                <div style="display: none" id="body-31" name="body-aceptacionResidentes">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aceptacionResidentes']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('31no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::date('31no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('31no2', '2. Departamento de la institución vinculada', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-school"></i></span>
                                {!! Form::text('31no2', null, ['class' => 'form-control', 'placeholder' => 'Departamento de la institución vinculada', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('31no3', '3. Institución vinculada', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                {!! Form::text('31no3', null, ['class' => 'form-control', 'placeholder' => 'Institución vinculada', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('31no4', '4. Nombre completo del residente', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('31no4', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del residente', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('31no5', '5. Número de control', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('31no5', null, ['class' => 'form-control', 'placeholder' => 'Número de control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('31no6', '6. Nombre de la carrera', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-school"></i></span>
                                {!! Form::text('31no6', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la carrera', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('31no7', '7. Tiempo de duración', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::text('31no7', null, ['class' => 'form-control', 'placeholder' => 'Tiempo de duración en meses', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('31no8', '8. Área de la empresa', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                {!! Form::text('31no8', null, ['class' => 'form-control', 'placeholder' => 'Área de la empresa', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('31no9', '9. Hora de entrada', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                {!! Form::time('31no9', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('31no10', '10. Hora de salida', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                {!! Form::time('31no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('31no11', '11. Pago por beca', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::number('31no11', null, ['class' => 'form-control', 'placeholder' => 'Pago por beca con dos decimales (0.00)', 'step' => 'any', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('31no12', '12. Pago de enteros con letra por beca', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('31no12', null, ['class' => 'form-control', 'placeholder' => 'Pago de enteros con letra por beca', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div13">
                            {!! Form::label('31no13', '13. Pago de fracciones con números por beca', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('31no13', null, ['class' => 'form-control', 'placeholder' => 'Pago de enteros con números por beca', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div14">
                            {!! Form::label('31no14', '14. Objetivo general de la residencia', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('31no14', null, ['class' => 'form-control', 'placeholder' => 'Objetivo general de la residencia', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaceptacionResidentes" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaceptacionResidentes" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aceptacion de residentes --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- No conflictos --}}
                {{-- <div style="display: none" id="body-37" name="body-noConflictos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_noConflictos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('37no1', '1. Ciudad y estado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('37no1', null,['class' => 'form-control', 'placeholder' => 'Ciudad y estado', 'required']) !!}
                            </div>
                        </div> 
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCnoConflictos" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGnoConflictos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div> --}}
                {{-- END No conflictos --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Apego a documentos --}}
                <div style="display: none" id="body-38" name="body-apegoDocumentos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_apegoDocumentos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('38no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::date('38no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('38no2', '2. Nombre del empleado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('38no2', null, ['class' => 'form-control', 'placeholder' => 'Nombre del empleado', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCapegoDocumentos" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGapegoDocumentos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Apego a documentos --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Pago bancario personal --}}
                <div style="display: none" id="body-41" name="body-pagoPersonal">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pagoPersonal']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('41no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::date('41no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('41no2', '2. Nombre del empleado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('41no2', null, ['class' => 'form-control', 'placeholder' => 'Nombre del empleado', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpagoPersonal" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpagoPersonal" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Pago bancario personal --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Pago bancario Becarios --}}
                <div style="display: none" id="body-42" name="body-pagoBecarios">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pagoBecarios']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('42no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::date('42no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('42no2', '2. Institución vinculada ', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('42no2', null, ['class' => 'form-control', 'placeholder' => 'Institución vinculada (Residencias profecionales)', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('42no3', '3. Nombre del becario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('42no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre del becario', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpagoBecarios" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpagoBecarios" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Pago bancario Becarios --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Reuniones --}}
                <div style="display: none" id="body-44" name="body-reuniones">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reuniones']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('44no1', '1. Fecha de reunión', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('44no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('44no2', '2. Fecha de informe', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('44no2', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('44no3', '3. Motivo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-question"></i></span>
                                {!! Form::text('44no3', null, ['class' => 'form-control', 'placeholder' => 'Motivo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('44no4', '4. Proyecto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('44no4', null, ['class' => 'form-control', 'placeholder' => 'Proyecto', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('44no5', '5. Total de asistentes', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                {!! Form::text('44no5', null, ['class' => 'form-control', 'placeholder' => 'Total de asistentes', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('44no6', '6. Costo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('44no6', null, ['class' => 'form-control', 'placeholder' => 'Costo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('44no7', '7. Cumple integridad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clipboard-check"></i></span>
                                {!! Form::select('44no7', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('44no8', '8. Asegura el cumplimiento', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                {!! Form::text('44no8', null, ['class' => 'form-control', 'placeholder' => 'Asegura el cumplimiento', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div9">
                            {!! Form::label('44no9', '9. Comentarios', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                {!! Form::text('44no9', null, ['class' => 'form-control', 'placeholder' => 'Comentarios']) !!}
                            </div>
                        </div>

                        <div class="reunionesCampos">
                            <div class="form-group" id="div10">
                                {!! Form::label('44no', '10. Asistentes:', ['class' => 'form-label']) !!}
                                <div id="wrapper_reunionesdoc">
                                    {!! Form::label('44no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    {!! Form::text('44no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre', 'required']) !!}
                                    <button type="button" id="add_cambio_reuniones" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCreuniones" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGreuniones" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Reuniones --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Viaticos --}}
                <div style="display: none" id="body-45" name="body-viaticos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_viaticos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('45no1', '1. Fecha de actividad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('45no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('45no2', '2. Fecha de informe', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('45no2', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('45no3', '3. Actividad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-people-carry"></i></span>
                                {!! Form::text('45no3', null, ['class' => 'form-control', 'placeholder' => 'Actividad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('45no4', '4. Proyecto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('45no4', null, ['class' => 'form-control', 'placeholder' => 'Proyecto', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('45no5', '5. Total de asistentes', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                {!! Form::text('45no5', null, ['class' => 'form-control', 'placeholder' => 'Total de asistentes', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('45no6', '6. Costo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('45no6', null, ['class' => 'form-control', 'placeholder' => 'Costo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('45no7', '7. Con comprobante fiscal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-landmark"></i></span>
                                {!! Form::text('45no7', null, ['class' => 'form-control', 'placeholder' => 'Comprobante fiscal', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('45no8', '8. Cumple', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clipboard-check"></i></span>
                                {!! Form::select('45no8', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div9">
                            {!! Form::label('45no9', '9. Asegura el cumplimiento', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                {!! Form::text('45no9', null, ['class' => 'form-control', 'placeholder' => 'Asegura el cumplimiento', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div10">
                            {!! Form::label('45no10', '10. Comentarios', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                {!! Form::text('45no10', null, ['class' => 'form-control', 'placeholder' => 'Comentarios']) !!}
                            </div>
                        </div>

                        <div class="viaticosCampos">
                            <div class="form-group" id="div11">
                                {!! Form::label('45no', '11. Asistentes:', ['class' => 'form-label']) !!}
                                <div id="wrapper_viaticosdoc">
                                    {!! Form::label('45no11', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    {!! Form::text('45no11', null, ['class' => 'form-control','placeholder' => 'Escribir nombre', 'required']) !!}
                                    <button type="button" id="add_cambio_viaticos" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCviaticos" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGviaticos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Viaticos --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- regalos --}}
                <div style="display: none" id="body-46" name="body-regalos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_regalos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('46no1', '1. Fecha de regalo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('46no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('46no2', '2. Fecha de informe', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('46no2', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('46no3', '3. Donatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('46no3', null, ['class' => 'form-control', 'placeholder' => 'Donatario', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('46no4', '4. Destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('46no4', null, ['class' => 'form-control', 'placeholder' => 'Destinatario', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('46no5', '5. Circunstancia', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                {!! Form::text('46no5', null, ['class' => 'form-control', 'placeholder' => 'Circunstancia', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('46no6', '6. Regalo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-gift"></i></span>
                                {!! Form::text('46no6', null, ['class' => 'form-control', 'placeholder' => 'Regalo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('46no7', '7. Valor estimado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::select('46no7', [ '<1,000' => '<1,000', '>1,000' => '>1,000' ], null, ['class' => 'form-control', 'placeholder' => 'Valor estimado', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div8">
                            {!! Form::label('46no8', '8. Valor (pesos)', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('46no8', null, ['class' => 'form-control', 'placeholder' => 'Valor (pesos)', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('46no9', '9. Destino final', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('46no9', null, ['class' => 'form-control', 'placeholder' => 'Destino final', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('46no10', '10. Fecha de salida', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('46no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div11">
                            {!! Form::label('46no11', '11. Cumple integridad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clipboard-check"></i></span>
                                {!! Form::select('46no11', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('46no12', '12. Asegura el cumplimiento', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                {!! Form::text('46no12', null, ['class' => 'form-control', 'placeholder' => 'Asegura el cumplimiento', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div13">
                            {!! Form::label('46no13', '13. Comentarios', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-comments"></i></span>
                                {!! Form::text('46no13', null, ['class' => 'form-control', 'placeholder' => 'Comentarios']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCregalos" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGregalos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END regalos --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Pase de salida --}}
                <div style="display: none" id="body-47" name="body-paseSalida">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_paseSalida']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('47no1', '1. Nombre del empleado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('47no1', null,['class' => 'form-control','placeholder' => 'Nombre del empleado' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('47no2', '2. Nombre de quien da autorización', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('47no2', null,['class' => 'form-control','placeholder' => 'Nombre de quien da autorización' , 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpaseSalida" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpaseSalida" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Pase de salida --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Permiso --}}
                <div style="display: none" id="body-48" name="body-permiso">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_permiso']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('48no1', '1. Nombre', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('48no1', null,['class' => 'form-control','placeholder' => 'Nombre completo del contratado' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('48no2', '2. Área', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('48no2', null,['class' => 'form-control','placeholder' => 'Área de la empresa' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('48no3', '3. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('48no3', null,['class' => 'form-control','placeholder' => 'Puesto' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('48no4', '4. Días de permiso que solicita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('48no4', null,['class' => 'form-control','placeholder' => 'Número de días de permiso que solicita' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('48no5', '5. Periodo anual', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                {!! Form::text('48no5', null,['class' => 'form-control','placeholder' => 'Periodo anual' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('48no6', '6. Tipo de permiso', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                {!! Form::select('48no6', [ 'Con goce de sueldo' => 'Con goce de sueldo', 'Sin goce de sueldo' => 'Sin goce de sueldo' ], null,['class' => 'form-control','placeholder' => 'Tipo de permiso' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('48no7', '7. Número de días correspondientes al periodo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('48no7', null,['class' => 'form-control','placeholder' => 'Número de días de permiso disponibles en el periodo' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('48no8', '8. Número de días disfrutados', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('48no8', null,['class' => 'form-control','placeholder' => 'Número de días de permiso disfrutados en el periodo' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div9">
                            {!! Form::label('48no9', '9. Número de días que solicita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('48no9', null,['class' => 'form-control','placeholder' => 'Número de días de permiso que solicita' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div10">
                            {!! Form::label('48no10', '10. Número de días restantes por disfrutar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('48no10', null,['class' => 'form-control','placeholder' => 'Número de días de permiso por disfrutar en el periodo' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div11">
                            {!! Form::label('48no11', '11. Fecha de inicio de permiso', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('48no11', null,['class' => 'form-control','placeholder' => 'Fecha de inicio de permiso' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div12">
                            {!! Form::label('48no12', '12. Fecha en que debe regresar a laborar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('48no12', null,['class' => 'form-control','placeholder' => 'Fecha en que debe regresar a laborar' , 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('48no', 'Datos del empleado', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div13">
                                        {!! Form::label('48no13', '13. Nombre', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            {!! Form::text('48no13', null, ['class' => 'form-control', 'placeholder' => 'Nombre','required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group" id="div14">
                                        {!! Form::label('48no14', '14. Fecha', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('48no14', null, ['class' => 'form-control', 'placeholder' => 'Fecha', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('48no', 'Autorización', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div15">
                                        {!! Form::label('48no15', '15. Nombre', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            {!! Form::text('48no15', null, ['class' => 'form-control', 'placeholder' => 'Nombre','required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group" id="div16">
                                        {!! Form::label('48no16', '16. Fecha', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('48no16', null, ['class' => 'form-control', 'placeholder' => 'Fecha', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpermiso" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpermiso" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Permiso --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- vacaciones --}}
                <div style="display: none" id="body-49" name="body-vacaciones">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_vacaciones']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('49no1', '1. Nombre', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('49no1', null,['class' => 'form-control','placeholder' => 'Nombre completo del contratado' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('49no2', '2. Área', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('49no2', null,['class' => 'form-control','placeholder' => 'Área de la empresa' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('49no3', '3. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('49no3', null,['class' => 'form-control','placeholder' => 'Puesto' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('49no4', '4. Días de vacaciones que solicita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('49no4', null,['class' => 'form-control','placeholder' => 'Número de días de vacaciones que solicita' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('49no5', '5. Número de periodo anual de vacaciones', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                {!! Form::text('49no5', null,['class' => 'form-control','placeholder' => 'Número de periodo anual de vacaciones' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('49no6', '6. Número de días correspondientes al periodo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('49no6', null,['class' => 'form-control','placeholder' => 'Número de días de vacaciones en el periodo' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('49no7', '7. Número de días disfrutados en el periodo anual', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('49no7', null,['class' => 'form-control','placeholder' => 'Número de días de vacaciones disfrutados en el periodo' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('49no8', '8. Número de días que solicita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('49no8', null,['class' => 'form-control','placeholder' => 'Número de días de vacaciones que solicita' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div9">
                            {!! Form::label('49no9', '9. Número de días restantes por disfrutar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::text('49no9', null,['class' => 'form-control','placeholder' => 'Número de días de vacaciones por disfrutar en el periodo' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div10">
                            {!! Form::label('49no10', '10. Fecha de inicio de vacaciones', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('49no10', null,['class' => 'form-control','placeholder' => 'Fecha de inicio de vacaciones' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div11">
                            {!! Form::label('49no11', '11. Fecha en que debe regresar a laborar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('49no11', null,['class' => 'form-control','placeholder' => 'Fecha en que debe regresar a laborar' , 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('49no', 'Datos del empleado', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div12">
                                        {!! Form::label('49no12', '12. Nombre', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            {!! Form::text('49no12', null, ['class' => 'form-control', 'placeholder' => 'Nombre','required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group" id="div13">
                                        {!! Form::label('49no13', '13. Fecha', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('49no13', null, ['class' => 'form-control', 'placeholder' => 'Fecha', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('49no', 'Autorización', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div14">
                                        {!! Form::label('49no14', '14. Nombre', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            {!! Form::text('49no14', null, ['class' => 'form-control', 'placeholder' => 'Nombre','required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col form-group" id="div15">
                                        {!! Form::label('49no15', '15. Fecha', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('49no15', null, ['class' => 'form-control', 'placeholder' => 'Fecha', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCvacaciones" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGvacaciones" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END vacaciones --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Constancia de trabajo --}}
                <div style="display: none" id="body-50" name="body-constanciaTrabajo">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_constanciaTrabajo']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('50no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('50no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('50no2', '2. Nombre completo del empleado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('50no2', null,['class' => 'form-control','placeholder' => 'Nombre completo del empleado' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('50no3', '3. Labora o laboró', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::select('50no3', [ 'labora' => 'labora', 'laboró' => 'laboró' ], null,['class' => 'form-control','placeholder' => 'Seleccione una opción' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('50no4', '4. Fecha de ingreso', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::date('50no4', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('50no5', '5. Fecha de egreso', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::date('50no5', null,['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('50no6', '6. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                {!! Form::text('50no6', null,['class' => 'form-control','placeholder' => 'Puesto' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('50no7', '7. Percibe o percibió', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('50no7', null,['class' => 'form-control', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('50no8', '8. Salario mensual', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('50no8', null,['class' => 'form-control','placeholder' => '$ Cantidad salario mensual' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div9">
                            {!! Form::label('50no9', '9. Cantidad pesos', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('50no9', null,['class' => 'form-control','placeholder' => 'Cantidad pesos' , 'required']) !!}
                            </div>
                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCconstanciaTrabajo" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGconstanciaTrabajo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Constancia de trabajo --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Renuncia --}}
                <div style="display: none" id="body-55" name="body-renuncia">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renuncia']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('55no1', '1. Fecha (documento)', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('55no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('55no2', '2. Fecha (renuncia)', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::date('55no2', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('55no3', '3. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('55no3', null,['class' => 'form-control','placeholder' => 'Puesto desempeñado' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('55no4', '4. Nombre del empleado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('55no4', null,['class' => 'form-control', 'placeholder' => 'Nombre del empleado', 'required']) !!}
                            </div>
                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrenuncia" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrenuncia" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Renuncia --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Finiquito --}}
                <div style="display: none" id="body-56" name="body-finiquito">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_finiquito']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('56no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('56no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('56no2', '2. Finiquito', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::number('56no2', null,['class' => 'form-control', 'step' => '.01', 'placeholder' => 'Finiquito con números, con dos decimales' ,'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('56no3', '3. Finiquito de enteros con letra ', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('56no3', null,['class' => 'form-control','placeholder' => 'Finiquito de enteros con letra ' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('56no4', '4. Finiquito de fracciones con números ', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('56no4', null,['class' => 'form-control', 'placeholder' => 'Finiquito de fracciones con números ', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('56no5', '5. Fecha de firma de contrato', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('56no5', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('56no6', '6. Fecha efectiva de baja', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('56no6', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('56no7', '7. Salario con números, con dos decimales', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::number('56no7', null,['class' => 'form-control', 'step' => '.01', 'placeholder' => 'Salario con números, con dos decimales', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('56no8', '8. Salario de enteros con letra', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('56no8', null,['class' => 'form-control', 'placeholder' => 'Salario de enteros con letra', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div9">
                            {!! Form::label('56no9', '9. Salario de fracciones con números', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                {!! Form::text('56no9', null,['class' => 'form-control', 'placeholder' => 'Salario de fracciones con números', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('56no', 'Conceptos de percepciones:', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-secondary">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div10">
                                        {!! Form::label('56no10', '10. Pago proporcional de aguinaldo por el tiempo laborado en el año', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no10', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Pago proporcional de aguinaldo por el tiempo laborado en el año', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div11">
                                        {!! Form::label('56no11', '11. Número de años laborados', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            {!! Form::number('56no11', null,['class' => 'form-control', 'placeholder' => 'Número de años laborados', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div12">
                                        {!! Form::label('56no12', '12. Pago proporcional de vacaciones por el tiempo laborado en el año', ['class' => 'form-label cambioNAnio']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no12', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Pago proporcional de vacaciones por el tiempo laborado en el año', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div13">
                                        {!! Form::label('56no13', '13. Pago proporcional de prima vacacional por el tiempo laborado en el año', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no13', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Pago proporcional de prima vacacional por el tiempo laborado en el año', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div14">
                                        {!! Form::label('56no14', '14. Número de días laborados en la última semana', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                            {!! Form::number('56no14', null,['class' => 'form-control', 'placeholder' => 'Número de días laborados en la última semana', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div15">
                                        {!! Form::label('56no15', '15. Pago de días laborados en la semana', ['class' => 'form-label cambioNdias']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no15', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Pago de días laborados en la semana', 'required']) !!}
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div16">
                                        {!! Form::label('56no16', '16. Pago proporcional del 7° día', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no16', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Pago proporcional del 7° día', 'required']) !!}
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div17">
                                        {!! Form::label('56no17', '17. Suma', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no17', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Suma', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div18">
                                        {!! Form::label('56no18', '18. Suma de percepciones con números, con dos decimales', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no18', null,['class' => 'form-control', 'step' => '.01', 'placeholder' => 'Suma de percepciones con números, con dos decimales', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div19">
                                        {!! Form::label('56no19', '19. Suma de percepciones de enteros con letra', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::text('56no19', null,['class' => 'form-control', 'placeholder' => 'Suma de percepciones de enteros con letra', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div20">
                                        {!! Form::label('56no20', '20. Suma de percepciones de fracciones con números', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::text('56no20', null,['class' => 'form-control', 'placeholder' => 'Suma de percepciones de fracciones con números', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('56no', 'Deducciones:', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-secondary">

                                <div class="row">
                                    
                                    <div class="col form-group" id="div21">
                                        {!! Form::label('56no21', '21. I.S.P.T.', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no21', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'I.S.P.T.', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div22">
                                        {!! Form::label('56no22', '22. IMSS', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            {!! Form::number('56no22', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'IMSS', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div23">
                                        {!! Form::label('56no23', '23. Préstamo', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no23', null,['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Préstamo', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div24">
                                        {!! Form::label('56no24', '24. Suma', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::number('56no24', null,['class' => 'form-control', 'step' => 'number', 'placeholder' => 'Suma de deducciones', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div25">
                                        {!! Form::label('56no25', '25. Suma de deducciones con números, con dos decimales', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                            {!! Form::number('56no25', null,['class' => 'form-control', 'step' => '.01', 'placeholder' => 'Suma de deducciones con números, con dos decimales', 'required']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div26">
                                        {!! Form::label('56no26', '26. Suma de deducciones de enteros con letra', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::text('56no26', null,['class' => 'form-control', 'placeholder' => 'Suma de deducciones de enteros con letra', 'required']) !!}
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="row">
                    
                                    <div class="col form-group" id="div27">
                                        {!! Form::label('56no27', '27. Suma de deducciones de fracciones con números', ['class' => 'form-label']) !!}
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                            {!! Form::text('56no27', null,['class' => 'form-control', 'placeholder' => 'Suma de deducciones de fracciones con números', 'required']) !!}
                                        </div>
                                    </div>
                                
                                </div>

                            </div>

                            <br>

                            <div class="form-group" id="div28">
                                {!! Form::label('56no28', '28. Neto a pagar con números, con dos decimales', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    {!! Form::number('56no28', null,['class' => 'form-control', 'step' => '.01' ,'placeholder' => 'Neto a pagar con números, con dos decimales', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div29">
                                {!! Form::label('56no29', '29. Neto a pagar de enteros con letra', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    {!! Form::text('56no29', null,['class' => 'form-control', 'placeholder' => 'Neto a pagar de enteros con letra', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div30">
                                {!! Form::label('56no30', '30. Neto a pagar de fracciones con números', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                    {!! Form::text('56no30', null,['class' => 'form-control', 'placeholder' => 'Neto a pagar de fracciones con números', 'required']) !!}
                                </div>
                            </div>

                            <div class="form-group" id="div31">
                                {!! Form::label('56no31', '31. Nombre del empleado', ['class' => 'form-label']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    {!! Form::text('56no31', null,['class' => 'form-control', 'placeholder' => 'Nombre del empleado', 'required']) !!}
                                </div>
                            </div>

                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCfiniquito" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGfiniquito" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Finiquito --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Recomendacion --}}
                <div style="display: none" id="body-57" name="body-recomendacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_recomendacion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('57no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('57no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('57no2', '2. Nombre completo del empleado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                {!! Form::text('57no2', null,['class' => 'form-control', 'placeholder' => 'Nombre completo del empleado' ,'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('57no3', '3. Labora o laboró', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                {!! Form::select('57no3', [ 'labora' => 'labora', 'laboró' => 'laboró' ], null,['class' => 'form-control','placeholder' => 'Seleccione una opción' , 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('57no4', '4. Fecha de ingreso', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('57no4', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('57no5', '5. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                {!! Form::text('57no5', null,['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrecomendacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrecomendacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Recomendacion --}}

{{-- ====================================================================================================================================================================== --}}


        </div>
        <!-- END Modal -->


    </div>
    </div>