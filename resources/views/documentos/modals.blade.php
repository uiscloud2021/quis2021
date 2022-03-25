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
        
        <!-- content PRESENTACION -->
        <div class="modal-content" id="content_presentacion">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Nuevo Formato</h5>
                <button type="button" onclick="borrar_campos(); list_formatos();" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Datos ID -->
            {!! Form::hidden('documentoformato_id', null, ['id' => 'documentoformato_id']) !!}
            {!! Form::hidden('empresaid_presentacion', session('id_empresa'), ['id' => 'empresaid_presentacion']) !!}
            {!! Form::hidden('empresa_id', null, ['id' => 'empresa_id']) !!}
            {!! Form::hidden('menu_id', null, ['id' => 'menu_id']) !!}
            {!! Form::hidden('proyecto_id', null, ['id' => 'proyecto_id']) !!}
            {{-- {!! Form::hidden('user_id', null, ['id' => 'user_id']) !!} --}}
            {!! Form::hidden('formato_id', null, ['id' => 'formato_id']) !!}

            <div class="container-fluid" id="div0">
                {!! Form::label('no0', 'Proyecto (Código UIS)', ['class' => 'form-label']) !!}
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-folder"></i></span>
                    {!! Form::select('no0', ['' => ''],null, ['class' => 'form-control', 'id' => 'no0', 'placeholder' => 'Seleccione un proyecto...', 'required']) !!}
                </div>
            </div>

            {{-- Presentacion --}}
            <div style="display: none" id="body-presentacion">
            <div class="modal-body">
                {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_presentacion']) !!}

                <div class="form-group" id="div1">
                    {!! Form::label('1no1', '1. Lugar', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                        {!! Form::select('1no1', ['Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el lugar...', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div2">
                    {!! Form::label('1no2', '2. Fecha de presentacion', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        {!! Form::date('1no2', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div3">
                    {!! Form::label('1no3', '3. Nombre completo', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                        {!! Form::text('1no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div4">
                    {!! Form::label('1no4', '4. Especialidad', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                        {!! Form::text('1no4', null, ['class' => 'form-control', 'placeholder' => 'Especialidad', 'required']) !!}
                    </div>
                </div>

                <!--TODO: hacer que se seleccione automaticamente el ESTIMADO o ESTIMADA-->

                <div class="form-group" id="div5">
                    {!! Form::label('1no5', '5. Patología', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-briefcase-medical"></i></span>
                        {!! Form::text('1no5', null, ['class' => 'form-control', 'placeholder' => 'Patología', 'readonly']) !!}
                    </div>
                </div>

                <div class="form-group" id="div6">
                    {!! Form::label('1no6', '6. Tipo de colaboración', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::select('1no6', ['Investigador Principal' => 'Investigador Principal', 'Sub Investigador' => 'Sub Investigador', 'Coordinador de estudios' => 'Coordinador de estudios'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de colabora...', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div7">
                    {!! Form::label('1no7', '7. A cargo de ', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {{-- {!! Form::text('a_cargo', null, ['class' => 'form-control'rgo', 'placeholder' => 'Seleccione tipo de colabora...', 'disabled']) !!} --}}
                        {!! Form::select('1no7', ['Lic. Luz Eighty García, Coordinadora de Investigación Clínica' => 'Lic. Luz Eighty García, Coordinadora de Investigación Clínica', 'Química Ruth Zafra, Coordinadora de Investigación Clínica' => 'Química Ruth Zafra, Coordinadora de Investigación Clínica', 'Dra. Brenda Rábago, Coordinadora de Investigación Clínica' => 'Dra. Brenda Rábago, Coordinadora de Investigación Clínica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione la persona a cargo...', 'required']) !!}
                    </div>
                </div>
        
                {{-- <div class="form-group" id="div44">
                    {!! Form::label('no44', '44. Resultado de presentacion', ['class' => 'form-label']) !!}
                    {!! Form::textarea('no44', null, ['class' => 'form-control'', 'placeholder' => 'Ingrese el resultado']) !!}
                </div> --}}
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCpresentacion" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGpresentacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Presentacion --}}

            {{-- Constancia anual --}}
            <div style="display: none" id="body-constanciaAnual">
            <div class="modal-body">
                {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_constanciaAnual']) !!}

                <div class="form-group" id="div1">
                    {!! Form::label('2no1', '1. Título. Nombre completo', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        {!! Form::text('2no1', null, ['class' => 'form-control', 'placeholder' => 'Título. Nombre completo', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div2">
                    {!! Form::label('2no2', '2. Rol en la investigación', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                        {!! Form::text('2no2', null, ['class' => 'form-control','placeholder' => 'Rol en la investigación', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div3">
                    {!! Form::label('2no3', '3. Especialidad', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                        {!! Form::text('2no3', null, ['class' => 'form-control', 'placeholder' => 'Especialidad', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div4">
                    {!! Form::label('2no4', '4. Fecha de Inicio', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        {!! Form::date('2no4', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div5">
                    {!! Form::label('2no5', '5. Fecha de Fin', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        {!! Form::date('2no5', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div6">
                    {!! Form::label('2no6', '6. Código', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                        {!! Form::text('2no6', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                    </div>
                </div>

                <!--TODO: La constancia se genera sola o no?-->
                <div class="form-group" id="div7">
                    {!! Form::label('2no7', '7. Constancia No.', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                        {!! Form::text('2no7', null, ['class' => 'form-control', 'placeholder' => 'Constancia No.', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div8">
                    {!! Form::label('2no8', '8. Fecha', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        {!! Form::date('2no8', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCconstanciaAnual" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGconstanciaAnual" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END constancia anual --}}

            {{-- Publicidad --}}
            <div style="display: none" id="body-publicidad">
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_publicidad']) !!}
    
                    <div class="form-group" id="div1">
                        {!! Form::label('3no1', '1. Nombre de la patología', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-briefcase-medical"></i></span>
                            {!! Form::text('3no1', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la patología', 'required', 'readonly']) !!}
                        </div>
                    </div>

                    <!-- TODO: llenar con los datos de la empresa: numero de la empresa -->
                    <div class="form-group" id="div2">
                        {!! Form::label('3no2', '2. Teléfonos', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            {!! Form::text('3no2', null, ['class' => 'form-control', 'placeholder' => 'Teléfonos', 'required', 'readonly']) !!}
                        </div>
                    </div>
    
                    <div class="form-group" id="div3">
                        {!! Form::label('3no3', '3. Requisitos', ['class' => 'form-label']) !!}
                        <div id="wrapper_publicidad">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            {!! Form::text('3no3', null, ['class' => 'form-control','placeholder' => 'Requisitos', 'required']) !!}
                            <button type="button" id="add_requisito" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                        </div>
                        </div>
                    </div>
            
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCpublicidad" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGpublicidad" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                </div>
                {!! Form::close() !!}
                </div>
                {{-- END Publicidad --}}

                {{-- Codigo y titulo --}}
                <div style="display: none" id="body-codigoTitulo">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_codigoTitulo']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('4no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::select('4no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('4no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('4no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('4no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('4no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('4no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('4no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('4no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('4no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('4no6', '6. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('4no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('4no7', '7. Nombre del Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('4no7', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('4no8', '8. Nombre del Hospital', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                {!! Form::text('4no8', null, ['class' => 'form-control', 'placeholder' => 'Hospital urgencias', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcodigotitulo" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcodigotitulo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Codigo y titulo --}}

                {{-- Sometimiento --}}
                <div style="display: none" id="body-sometimiento">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_sometimiento']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('7no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('7no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('7no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('7no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('7no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('7no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('7no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('7no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('7no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('7no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('7no6', '6. Nombre del Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('7no6', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('7no7', '7. Documentos', ['class' => 'form-label']) !!}
                            <div id="wrapper_sometimiento">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('7no7', null, ['class' => 'form-control', 'placeholder' => 'Nombre, version y Fecha del documento', 'required']) !!}
                                <button type="button" id="add_documento" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCsometimiento" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGsometimiento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Sometimiento --}}

                {{-- Compromisos --}}
                <div style="display: none" id="body-compromisos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_compromisos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('8no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::select('8no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('8no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('8no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('8no3', '3. Compromiso', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('8no3', [ 'Investigador Principal' => 'Investigador Principal', 'Sub Investigador' => 'Sub Investigador', 'Coordinador de Estudios' => 'Coordinador de Estudios' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione tipo de compromiso', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('8no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('8no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('8no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('8no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('8no6', '6. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('8no6', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('8no7', '7. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('8no7', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('8no8', '8. Acepto participar como', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('8no8', null, ['class' => 'form-control', 'placeholder' => 'Participación', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('8no9', '9. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('8no9', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('8no10', '10. Nombre del Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('8no10', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('8no11', '11. Cédula', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                {!! Form::text('8no11', null, ['class' => 'form-control', 'placeholder' => 'Cédula', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('8no12', '12. Rol en la investigación', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                {!! Form::text('8no12', null, ['class' => 'form-control', 'placeholder' => 'Rol', 'readonly', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcompromisos" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcompromisos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Compromisos --}}

                {{-- Responsabilidades --}}
                <div style="display: none" id="body-responsabilidades">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_responsabilidades']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('9no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::select('9no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('9no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('9no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('9no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('9no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('9no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('9no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('9no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('9no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('9no6', '6. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('9no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('9no7', '7. Nombre del Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('9no7', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('9no8', '8. Personal', ['class' => 'form-label']) !!}
                            <div id="wrapper_responsabilidades">
                            <div class="p-2 rounded border border-5">

                                <div class="form-group">
                                    {!! Form::label('9no8', 'Nombre', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('9no8', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('9no9', 'Rol en el estudio', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                    {!! Form::text('9no9', null, ['class' => 'form-control', 'placeholder' => 'Rol en el estudio', 'required']) !!}
                                    </div>
                                </div>
                                <div class="container form-group">
                                    {!! Form::label('9no', 'Responsabilidades', ['class' => 'form-label']) !!}

                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 1, null,['class' => 'form-check-input']) !!}
                                            1 Conducir el estudio
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 2, null,['class' => 'form-check-input']) !!}
                                            2 Selección de pacientes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 3, null,['class' => 'form-check-input']) !!}
                                            3 Firma de ICF
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 4, null,['class' => 'form-check-input']) !!}
                                            4 Confirmar elegibilidad
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 5, null,['class' => 'form-check-input']) !!}
                                            5 Examen físico
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 6, null,['class' => 'form-check-input']) !!}
                                            6 Signos vitales
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 7, null,['class' => 'form-check-input']) !!}
                                            7 Aleatorización
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 8, null,['class' => 'form-check-input']) !!}
                                            8 Comunicación IVRS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 9, null,['class' => 'form-check-input']) !!}
                                            9 Prescripción de producto
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 10, null,['class' => 'form-check-input']) !!}
                                            10 Dispensar medicamento
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 11, null,['class' => 'form-check-input']) !!}
                                            11 Registro de medicamentos
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 12, null,['class' => 'form-check-input']) !!}
                                            12 Control de medicamento
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 13, null,['class' => 'form-check-input']) !!}
                                            13 Preparación y ministración de producto de investigación
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 14, null,['class' => 'form-check-input']) !!}
                                            14 Terapias de rescate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 15, null,['class' => 'form-check-input']) !!}
                                            15 Finalizar tratamiento
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 16, null,['class' => 'form-check-input']) !!}
                                            16 Evaluación de EA
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 17, null,['class' => 'form-check-input']) !!}
                                            17 Información a los sujetos
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 18, null,['class' => 'form-check-input']) !!}
                                            18 Entrega de materiales
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 19, null,['class' => 'form-check-input']) !!}
                                            19 Obtener muestras biológicas
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 20, null,['class' => 'form-check-input']) !!}
                                            20 Preparación de muestras
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 21, null,['class' => 'form-check-input']) !!}
                                            21 ECG
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 22, null,['class' => 'form-check-input']) !!}
                                            22 Recolectar datos
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 23, null,['class' => 'form-check-input']) !!}
                                            23 Captura de datos CRF
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 24, null,['class' => 'form-check-input']) !!}
                                            24 Actividades administrativas
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 25, null,['class' => 'form-check-input']) !!}
                                            25 Aplicación de escalas
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 26, null,['class' => 'form-check-input']) !!}
                                            26 Técnico radiólogo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 27, null,['class' => 'form-check-input']) !!}
                                            27 Dermatólogo
                                            </label>
                                        </div>
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 28, null,['class' => 'form-check-input']) !!}
                                            28 Técnico en espirometría
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm form-check">
                                            <label>
                                            {!! Form::checkbox('9no10[]', 29, null,['class' => 'form-check-input']) !!}
                                            29 Oftalmólogo
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                    <button type="button" id="add_personal" class="btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCresponsabilidades" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGresponsabilidades" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Responsabilidades --}}

                {{-- Autorizacion --}}
                <div style="display: none" id="body-autorizacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_autorizacion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('10no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::select('10no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('10no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('10no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('10no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('10no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('10no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('10no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('10no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('10no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('10no6', '6. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('10no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('10no7', '7. Nombre del Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('10no7', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('10no8', '8. Nombre del Hospital', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                {!! Form::text('10no8', null, ['class' => 'form-control', 'placeholder' => 'Hospital urgencias', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCautorizacion" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGautorizacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Autorizacion --}}

                {{-- Instalaciones --}}
                <div style="display: none" id="body-instalaciones">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_instalaciones']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('11no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {{-- {!! Form::text('11no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('11no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('11no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('11no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('11no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('11no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('11no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('11no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('11no5', '5. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('11no5', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('11no6', '6. Título Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('11no6', null, ['class' => 'form-control', 'placeholder' => 'Título investigador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('11no7', '7. Nombre del Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('11no7', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('11no8', '8. Cláusula de proveedores externos', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-contract"></i></span>
                                {!! Form::select('11no8', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('11no9', '9. Documentos convenios de atención', ['class' => 'form-label']) !!}
                            <div id="wrapper_instalaciones">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('11no9', null, ['class' => 'form-control', 'placeholder' => 'Servicio', 'required']) !!}
                                {!! Form::label('11no10', 'Proveedor', ['class' => 'form-label', 'hidden']) !!}
                                {!! Form::text('11no10', null, ['class' => 'form-control', 'placeholder' => 'Proveedor', 'required']) !!}
                                <button type="button" id="add_doc_instalaciones" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCinstalaciones" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGinstalaciones" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Instalaciones --}}

                {{-- Anticorrupcion --}}
                <div style="display: none" id="body-anticorrupcion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_anticorupcion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('12no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {{-- {!! Form::text('12no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('12no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('12no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('12no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('12no3', '3. Destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('12no3', null, ['class' => 'form-control', 'placeholder' => 'Dr.(a) Nombre completo del destinatario', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCanticorrupcion" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGanticorrupcion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Anticorrupcion --}}

                {{-- Destruccioen de materiales --}}
                <div style="display: none" id="body-destruccionmateriales">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_destruccionMateriales']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('27no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {{-- {!! Form::text('12no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('27no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('27no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('27no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('27no3', '3. Hora', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::time('27no3', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('27no4', '4. Número del día', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {{-- {!! Form::text('27no4', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('27no4', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31']
                                ,null, ['class' => 'form-control', 'placeholder' => 'Seleccione el día', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('27no5', '5. Nombre del mes', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {{-- {!! Form::text('27no5', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('27no5', [ 'Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione el mes', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('27no6', '6. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('27no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('27no7', '7. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('27no7', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('27no8', '8. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('27no8', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('27no', '9. Materiales destruidos', ['class' => 'form-label']) !!}
                            
                            <div class="row">
                                <div class="col-sm">
                                        {!! Form::label('27no', 'Tipo de kit', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col-sm">
                                        {!! Form::label('27no', 'Fecha de caducidad', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col-sm">
                                        {!! Form::label('27no', 'Cantidad', ['class' => 'form-label']) !!}
                                </div>
                            </div>

                            <div id="wrapper_destruccionmateriales">

                                <div class="input-group-prepend">
                                    
                                    {!! Form::label('27no9', '', ['class' => 'form-label', 'hidden']) !!}
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('27no9', null, ['class' => 'form-control', 'placeholder' => 'Material', 'required']) !!}

                                    {!! Form::label('27no10', '', ['class' => 'form-label', 'hidden']) !!}
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    {!! Form::date('27no10', null, ['class' => 'form-control', 'required']) !!}

                                    {!! Form::label('27no11', '', ['class' => 'form-label', 'hidden']) !!}
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::number('27no11', null, ['class' => 'form-control', 'placeholder' => 'Cantidad', 'required']) !!}

                                    <button type="button" id="add_materiales" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdestruccionMateriales" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdestruccionMateriales" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Destruccion de Materiales --}}

                {{-- Destruccioen de productos --}}
                <div style="display: none" id="body-destruccionproductos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_destruccionProductos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('28no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {{-- {!! Form::text('12no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('28no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('28no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('28no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('28no3', '3. Hora', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::time('28no3', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('28no4', '4. Número del día', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {{-- {!! Form::text('28no4', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('28no4', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31']
                                ,null, ['class' => 'form-control', 'placeholder' => 'Seleccione el día', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('28no5', '5. Nombre del mes', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {{-- {!! Form::text('28no5', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::select('28no5', [ 'Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione el mes', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('28no6', '6. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('28no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('28no7', '7. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('28no7', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly','required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('28no8', '8. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('28no8', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('28no', '9. Materiales destruidos', ['class' => 'form-label']) !!}
                            
                            <div class="row">
                                <div class="col">
                                        {!! Form::label('28no', 'Nombre genérico', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col">
                                        {!! Form::label('28no', 'Estado', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col">
                                        {!! Form::label('28no', 'Número de kit', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col-md-auto">
                                        {!! Form::label('28no', 'Cantidad de unidades en el kit', ['class' => 'form-label']) !!}
                                </div>
                            </div>

                            <div id="wrapper_destruccionproductos">

                                <div class="input-group-prepend">
                                    
                                    {!! Form::label('28no9', '', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('28no9', null, ['class' => 'form-control', 'placeholder' => 'Nombre genérico', 'required']) !!}

                                    {!! Form::label('28no10', '', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::select('28no10', [ 'Nuevo' => 'Nuevo', 'Devolución' => 'Devolución' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione el estado', 'required']) !!}

                                    {!! Form::label('28no11', '', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('28no11', null, ['class' => 'form-control', 'placeholder' => 'Número de kit', 'required']) !!}

                                    {!! Form::label('28no12', '', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('28no12', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de unidades en el kit', 'required']) !!}

                                    <button type="button" id="add_productos" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdestruccionProductos" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdestruccionProductos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Destruccion de Productos --}}

                {{-- Tarjeta de Bolsillo --}}
                <div style="display: none" id="body-tarjetabolsillo">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_tarjetaBolsillo']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('55no1', '1. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('55no1', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('55no2', '2. Patología', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-briefcase-medical"></i></span>
                                {!! Form::text('55no2', null, ['class' => 'form-control', 'placeholder' => 'Patología', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('55no3', '3. Teléfono', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                {!! Form::select('55no3', [ '437 2837 y 614 129 4020 ' => '437 2837 y 614 129 4020 ', '55 1451 1757 y 55 2127 1039' => '55 1451 1757 y 55 2127 1039' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un teléfono', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('55no4', '4. Móvil', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                {!! Form::text('55no4', null, ['class' => 'form-control', 'placeholder' => 'Móvil', 'readonly']) !!}
                                {{-- {!! Form::select('55no4', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCtarjetabolsillo" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGtarjetabolsillo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Tarjeta de Bolsillo --}}

                {{-- Carpeta documento fuente --}}
                <div style="display: none" id="body-documentofuente">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_documentoFuente']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('56no1', '1. Código de protocolo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('56no1', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('56no2', '2. Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('56no2', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('56no3', '3. Número de sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('56no3', null, ['class' => 'form-control', 'placeholder' => '# sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('56no4', '4. Iniciales del sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('56no4', null, ['class' => 'form-control', 'placeholder' => 'Iniciales del sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('56no5', '5. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                                {!! Form::text('56no5', null, ['class' => 'form-control', 'placeholder' => 'Dirección sitio clínico', 'readonly']) !!}
                                {{-- {!! Form::select('56no5', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdocumentofuente" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdocumentofuente" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Carpeta documento fuente --}}

                {{-- Carpeta Hoja inicial --}}
                <div style="display: none" id="body-hojainicial">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_hojaInicial']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('57no1', '1. Código de protocolo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('57no1', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('57no2', '2. Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no2', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('57no3', '3. Sub Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no3', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div4">
                            {!! Form::label('57no4', '4. Coordinador de estudios', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no4', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('57no5', '5. Número de sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('57no5', null, ['class' => 'form-control', 'placeholder' => '# sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('57no6', '6. Iniciales del sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no6', null, ['class' => 'form-control', 'placeholder' => 'Iniciales del sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('57no7', '7. Sexo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                {!! Form::select('57no7', [ 'Masculino' => 'Masculino', 'Femenino' => 'Femenino' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un campo', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('57no8', '8. Edad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::number('57no8', null, ['class' => 'form-control', 'placeholder' => 'Edad', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('57no9', '9. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                                {!! Form::text('57no9', null, ['class' => 'form-control', 'placeholder' => 'Dirección sitio clínico', 'readonly']) !!}
                                {{-- {!! Form::select('57no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnChojainicial" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGhojainicial" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Carpeta Hoja inicial --}}

                {{-- Contacto --}}
                <div style="display: none" id="body-contacto">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_contacto']) !!}
        
                        
                        <div class="form-group" id="div1">
                            {!! Form::label('58no1', '1. Número de sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('58no1', null, ['class' => 'form-control', 'placeholder' => '# sujeto', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div2">
                            {!! Form::label('58no2', '2. Iniciales del sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('58no2', null, ['class' => 'form-control', 'placeholder' => 'Iniciales del sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('58no3', '3. Código de protocolo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('58no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('58no', 'Contacto', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-5">

                                <div class="form-group" id="div4">
                                    {!! Form::label('58no4', '4. Nombre', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        {!! Form::text('58no4', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                                    </div>
                                </div>
                                
                                <div class="form-group" id="div5">
                                    {!! Form::label('58no5', '5. Sexo', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                        {!! Form::select('58no5', [ 'Masculino' => 'Masculino', 'Femenino' => 'Femenino' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un campo', 'required']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div6">
                                    {!! Form::label('58no6', '6. Fecha nacimiento', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        {!! Form::date('58no6', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::label('58no', 'Domicilio', ['class' => 'form-label']) !!}
                                    <div class="p-2 rounded border border-5">

                                        <div class="form-group" id="div7">
                                            {!! Form::label('58no7', '7. Calle y número', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                {!! Form::text('58no7', null, ['class' => 'form-control', 'placeholder' => 'Calle y número', 'required']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div8">
                                            {!! Form::label('58no8', '8. Colonia', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                                                {!! Form::text('58no8', null, ['class' => 'form-control', 'placeholder' => 'Colonia', 'required']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div9">
                                            {!! Form::label('58no9', '9. Ciudad y estado', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                {!! Form::text('58no9', null, ['class' => 'form-control', 'placeholder' => 'Ciudad y estado', 'required']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div10">
                                            {!! Form::label('58no10', '10. Código postal', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
                                                {!! Form::text('58no10', null, ['class' => 'form-control', 'placeholder' => 'Código postal', 'required']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div11">
                                            {!! Form::label('58no11', '11. Tel casa', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                {!! Form::text('58no11', null, ['class' => 'form-control', 'placeholder' => 'Tel casa']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div12">
                                            {!! Form::label('58no12', '12. Tel móvil', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                {!! Form::text('58no12', null, ['class' => 'form-control', 'placeholder' => 'Tel móvil']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div13">
                                            {!! Form::label('58no13', '13. Tel trabajo', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                {!! Form::text('58no13', null, ['class' => 'form-control', 'placeholder' => 'Tel trabajo']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>
                
                                        <div class="form-group" id="div14">
                                            {!! Form::label('58no14', '14. Correo electrónico', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                {!! Form::email('58no14', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required']) !!}
                                                {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('58no', 'Persona de contacto 1', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-5">

                                <div class="form-group" id="div15">
                                    {!! Form::label('58no15', '15. Nombre', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        {!! Form::text('58no15', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                                    </div>
                                </div>

                                <div class="form-group" id="div16">
                                    {!! Form::label('58no16', '16. Domicilio', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        {!! Form::text('58no16', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>

                                <div class="form-group" id="div17">
                                    {!! Form::label('58no17', '17. Parentesco', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        {!! Form::text('58no17', null, ['class' => 'form-control', 'placeholder' => 'Parentesco', 'required']) !!}
                                    </div>
                                </div>

                                <div class="form-group" id="div18">
                                    {!! Form::label('58no18', '18. Tel casa', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        {!! Form::text('58no18', null, ['class' => 'form-control', 'placeholder' => 'Tel casa']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div19">
                                    {!! Form::label('58no19', '19. Tel móvil', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        {!! Form::text('58no19', null, ['class' => 'form-control', 'placeholder' => 'Tel móvil']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div20">
                                    {!! Form::label('58no20', '20. Tel trabajo', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        {!! Form::text('58no20', null, ['class' => 'form-control', 'placeholder' => 'Tel trabajo']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('58no', 'Persona de contacto 2', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-5">

                                <div class="form-group" id="div21">
                                    {!! Form::label('58no21', '21. Nombre', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        {!! Form::text('58no21', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                                    </div>
                                </div>

                                <div class="form-group" id="div22">
                                    {!! Form::label('58no22', '22. Domicilio', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                                        {!! Form::text('58no22', null, ['class' => 'form-control', 'placeholder' => 'Domicilio']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>

                                <div class="form-group" id="div23">
                                    {!! Form::label('58no23', '23. Parentesco', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        {!! Form::text('58no23', null, ['class' => 'form-control', 'placeholder' => 'Parentesco']) !!}
                                    </div>
                                </div>

                                <div class="form-group" id="div24">
                                    {!! Form::label('58no24', '24. Tel casa', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        {!! Form::text('58no24', null, ['class' => 'form-control', 'placeholder' => 'Tel casa']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div25">
                                    {!! Form::label('58no25', '25. Tel móvil', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        {!! Form::text('58no25', null, ['class' => 'form-control', 'placeholder' => 'Tel móvil']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div26">
                                    {!! Form::label('58no26', '26. Tel trabajo', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        {!! Form::text('58no26', null, ['class' => 'form-control', 'placeholder' => 'Tel trabajo']) !!}
                                        {{-- {!! Form::select('58no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcontacto" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcontacto" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Contacto --}}

                {{-- Señalador de visita --}}
                <div style="display: none" id="body-señaladorvisita">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_señaladorVisita']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('63no1', '1. Nombre de la visita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('63no1', null, ['class' => 'form-control', 'placeholder' => 'Visita', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('63no2', '2. Fecha de la visita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::date('63no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('63no3', '3. Código del protocolo', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('63no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('63no4', '4. Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no4', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('63no5', '5. Sub Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no5', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div6">
                            {!! Form::label('63no6', '6. Coordinador de estudios', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no6', null, ['class' => 'form-control', 'placeholder' => 'Investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('63no7', '7. Número de sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('63no7', null, ['class' => 'form-control', 'placeholder' => '# sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('63no8', '8. Iniciales del sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no8', null, ['class' => 'form-control', 'placeholder' => 'Iniciales del sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('63no9', '9. Dirección sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map"></i></span>
                                {!! Form::text('63no9', null, ['class' => 'form-control', 'placeholder' => 'Dirección sitio clínico', 'readonly']) !!}
                                {{-- {!! Form::select('63no9', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una dirección', 'required']) !!} --}}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCseñaladorvisita" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGseñaladorvisita" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Señalador de visita --}}

                {{-- Recibo ICF --}}
                <!-- TODO: Preguntar por nombre de sujeto y firma del sujeto -->
                <div style="display: none" id="body-reciboicf">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reciboICF']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('72no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {{-- {!! Form::text('72no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!} --}}
                                {!! Form::text('72no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('72no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('72no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('72no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('72no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('72no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('72no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('72no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('72no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('72no', 'Datos del documento', ['class' => 'form-label']) !!}
                            <div class="p-2 rounded border border-5">

                                <div class="form-group" id="div6">
                                    {!! Form::label('72no6', '6. Nombre del documento', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file"></i></span>
                                        {!! Form::text('72no6', null, ['class' => 'form-control', 'placeholder' => 'Nombre del documento', 'required']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div7">
                                    {!! Form::label('72no7', '7. Versión', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        {!! Form::text('72no7', null, ['class' => 'form-control', 'placeholder' => 'Versión', 'required']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group" id="div8">
                                    {!! Form::label('72no8', '8. Fecha de versión', ['class' => 'form-label']) !!}
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        {!! Form::date('72no8', null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCreciboicf" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGreciboicf" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Recibo ICF --}}

                {{-- Solicitud de resumen --}}
                <div style="display: none" id="body-solicitudresumen">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_solicitudResumen']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('76no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('76no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly']) !!}
                                {{-- {!! Form::select('76no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('76no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('76no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('76no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('76no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('76no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('76no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('76no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('76no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCsolicitudresumen" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGsolicitudresumen" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Solicitud de resumen --}}

                {{-- Privacidad de sujetos --}}
                <div style="display: none" id="body-privicidadsujetos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_privacidadSujetos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('77no1', '1. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('77no1', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('77no2', '2. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('77no2', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('77no3', '3. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no3', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('77no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('77no5', '5. Sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no5', null, ['class' => 'form-control', 'placeholder' => 'Sitio clínico', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('77no6', '6. Dirección', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCprivacidadsujetos" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGprivacidadsujetos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Privacidad de sujetos --}}

                {{-- Privacidad y datos --}}
                <div style="display: none" id="body-privacidaddatos">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_privacidadDatos']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('78no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('78no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly']) !!}
                                {{-- {!! Form::select('78no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('78no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('78no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('78no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('78no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('78no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('78no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('78no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('78no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCprivacidaddatos" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGprivacidaddatos" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Privacidad y datos --}}

                {{-- Orden de compra --}}
                <div style="display: none" id="body-ordencompra">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_ordenCompra']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('79no1', '1. Lugar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('79no1', null, ['class' => 'form-control', 'placeholder' => 'Lugar', 'readonly']) !!}
                                {{-- {!! Form::select('79no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('79no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('79no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('79no3', '3. Nombre del proveedor', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('79no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre del proveedor', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('79no4', '4. Número de documento', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('79no4', null, ['class' => 'form-control', 'placeholder' => 'UIS-18-XXXXX', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('79no5', '5. Nombre del sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('79no5', null, ['class' => 'form-control', 'placeholder' => 'Nombre del sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('79no6', '6. Nombre de la persona que solicita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('79no6', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la persona que solicita', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('79no7', '7. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('79no7', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('79no8', '8. Estudios', ['class' => 'form-label']) !!}
                            <div id="wrapper_ordenestudio">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('79no8', null, ['class' => 'form-control','placeholder' => 'Nombre del estudio', 'required']) !!}
                                <button type="button" id="add_estudio" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCordencompra" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGordencompra" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Orden de compra --}}

                {{-- Envío de muestras --}}
                <div style="display: none" id="body-enviomuestras">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_envioMuestras']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('80no1', '1. Lugar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('80no1', null, ['class' => 'form-control', 'placeholder' => 'Lugar', 'readonly']) !!}
                                {{-- {!! Form::select('80no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('80no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('80no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('80no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('80no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('80no5', '5. # Sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no5', null, ['class' => 'form-control', 'placeholder' => '# Sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('80no6', '6. # Visita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no6', null, ['class' => 'form-control', 'placeholder' => '# Visita', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('80no7', '7. Fecha de recoleccón', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('80no7', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('80no8', '8. Requisitos de almacén', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                                {!! Form::select('80no8', [ 'Temperatura ambienete' => 'Temperatura ambienete', 'Refrigerado' => 'Refrigerado', 'Congelado' => 'Congelado' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('80no9', '9. Hubo desviaciones de temperatura durante el almacén de la muestra', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-temperature-high"></i></span>
                                {!! Form::select('80no9', [ 'Si' => 'Si', 'No' => 'No'],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('80no10', '10. Courier', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no10', null, ['class' => 'form-control', 'placeholder' => 'Courier', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('80no11', '11. Número de guía', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                {!! Form::text('80no11', null, ['class' => 'form-control', 'placeholder' => 'Número de guía', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('80no12', '12. Fecha de envío', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('80no12', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div13">
                            {!! Form::label('80no13', '13. Hora', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                {!! Form::time('80no13', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div14">
                            {!! Form::label('80no14', '14. Temperatura de salida', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-temperature-low"></i></span>
                                {!! Form::text('80no14', null, ['class' => 'form-control', 'placeholder' => 'Temperatura de salida', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div15">
                            {!! Form::label('80no15', '15. Nombre de quien elabora la nota', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no15', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div16">
                            {!! Form::label('80no16', '16. Iniciales', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no16', null, ['class' => 'form-control', 'placeholder' => 'Iniciales', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenviomuestras" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenviomuestras" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Envío de muestras --}}

                {{-- Orden de compra hospital --}}
                <div style="display: none" id="body-ordencomprahospital">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_ordenCompraHospital']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('81no1', '1. Lugar', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('81no1', null, ['class' => 'form-control', 'placeholder' => 'Lugar', 'readonly']) !!}
                                {{-- {!! Form::select('81no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('81no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('81no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('81no3', '3. Nombre del proveedor', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('81no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre del proveedor', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('81no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('81no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('81no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('81no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('81no6', '6. Nombre del sujeto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('81no6', null, ['class' => 'form-control', 'placeholder' => 'Nombre del sujeto', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('81no7', '7. Nombre de la persona que solicita', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('81no7', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la persona que solicita', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('81no8', '8. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('81no8', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>

                        <div class="ordencompraHospitalCampos">
                            <div class="form-group" id="div9">
                                {!! Form::label('81no', '9. La atención que se solicita incluye los siguientes servicios:', ['class' => 'form-label']) !!}
                                <div id="wrapper_ordenservicio">
                                    {!! Form::label('81no9', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hand-holding"></i></span>
                                    {!! Form::text('81no9', null, ['class' => 'form-control','placeholder' => 'Nombre del servicio', 'required']) !!}
                                    <button type="button" id="add_servicio" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>

                            <div class="form-group" id="div10">
                                {!! Form::label('81no', '10. La atención que se solicita tiene las siguientes restricciones:', ['class' => 'form-label']) !!}
                                <div id="wrapper_ordenrestriccion">
                                    {!! Form::label('81no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-ban"></i></span>
                                    {!! Form::text('81no10', null, [ 'class' => 'ordencomprahospitalRestriccion form-control','placeholder' => 'Restricción', 'required']) !!}
                                    <button type="button" id="add_restriccion" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCordencomprahospital" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGordencomprahospital" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Orden de compra hospital --}}

                {{-- Aviso EAS --}}
                <div style="display: none" id="body-avisoeas">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoEAS']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('82no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('82no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('82no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('82no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('82no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('82no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('82no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('82no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('82no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('82no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('82no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('82no6', '6. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('82no6', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('82no', '7. NOTIFICO el siguiente Evento Adverso Serio:', ['class' => 'form-label']) !!}
                            
                            <div class="row">
                                <div class="col-sm">
                                        {!! Form::label('82no', 'No. de sujeto', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col-sm">
                                        {!! Form::label('82no', 'Fecha reporte', ['class' => 'form-label']) !!}
                                </div>
                                <div class="col-sm">
                                        {!! Form::label('82no', 'Descripción', ['class' => 'form-label']) !!}
                                </div>
                            </div>

                            <div id="wrapper_avisoeas">

                                <div class="avisoeasinpust input-group-prepend">
                                    
                                    <div class="col">
                                        <div class="input-group-prepend">
                                        {!! Form::label('82no7', '', ['class' => 'form-label', 'hidden']) !!}
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                        {!! Form::text('82no7', null, ['class' => 'form-control', 'placeholder' => '# Sujeto', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="input-group-prepend">
                                        {!! Form::label('82no8', '', ['class' => 'form-label', 'hidden']) !!}
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        {!! Form::date('82no8', null, ['class' => 'form-control', 'required']) !!}
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="input-group-prepend">
                                        {!! Form::label('82no9', '', ['class' => 'form-label', 'hidden']) !!}
                                        <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                        {!! Form::textarea('82no9', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => '3','required']) !!}
                                        </div>
                                    </div>

                                    <button type="button" id="add_evento_adverso" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisoeas" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisoeas" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso EAS --}}

                {{-- Aviso SUSAR --}}
                <div style="display: none" id="body-avisosusar">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoSUSAR']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('83no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('83no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('83no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('83no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('83no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('83no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('83no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('83no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('83no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('83no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('83no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('83no6', '6. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('83no6', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('83no', '7. Reportes internacionales de Sospechas de Reacción Adversa Inesperada', ['class' => 'form-label']) !!}

                            <div id="wrapper_avisosusar">

                                <div class="avisosusarinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('83no7', '# Reporte', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('83no7', null, ['class' => 'form-control', 'placeholder' => '# Reporte', 'required']) !!}
                                            </div>
                                        </div>
    
                                        <div class="col form-group">
                                            {!! Form::label('83no8', 'Fecha reporte', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('83no8', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
    
                                        <div class="col form-group">
                                            {!! Form::label('83no9', 'Protocolo', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('83no9', null, ['class' => 'form-control', 'placeholder' => 'Protocolo', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('83no10', 'País', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                            {!! Form::text('83no10', null, ['class' => 'form-control', 'placeholder' => 'País', 'required']) !!}
                                            </div>
                                        </div>
    
                                        <div class="col form-group">
                                            {!! Form::label('83no11', 'Tipo reporte', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('83no11', null, ['class' => 'form-control', 'placeholder' => 'Tipo reporte', 'required']) !!}
                                            </div>
                                        </div>
    
                                        <div class="col form-group">
                                            {!! Form::label('83no12', 'Descripción', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::textarea('83no12', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => '2','required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="button" id="add_reporte_susar" class="btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisosusar" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisosusar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso SUSAR --}}

                {{-- Somete desviación --}}
                <div style="display: none" id="body-sometedesviacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_someteDesviacion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('84no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('84no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('84no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('84no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('84no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('84no3', '3. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('84no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('84no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('84no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('84no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('84no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('84no6', '6. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('84no6', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('84no7', '7. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('84no7', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('84no', '8. SOMETO a ese comité las siguientes desviaciones', ['class' => 'form-label']) !!}

                            <div id="wrapper_sometedesviacion">

                                <div class="sometedesviacioninpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('84no8', '# Sujeto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('84no8', null, ['class' => 'form-control', 'placeholder' => '# Sujeto', 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col form-group">
                                            {!! Form::label('84no9', '# Visita', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('84no9', null, ['class' => 'form-control', 'placeholder' => '# Visita', 'required']) !!}
                                            </div>
                                        </div>
    
                                        <div class="col form-group">
                                            {!! Form::label('84no10', 'Fecha', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('84no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
    
                                        <div class="col form-group">
                                            {!! Form::label('84no11', 'Descripción', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::textarea('84no11', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => '2','required']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col form-group">
                                            {!! Form::label('84no12', 'Acciones tomadas', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::textarea('84no12', null, ['class' => 'form-control', 'placeholder' => 'Acciones tomadas', 'rows' => '2','required']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="button" id="add_somete_desviacion" class="btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCsometedesviacion" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGsometedesviacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Somete desviación --}}

                {{-- Aviso al CE --}}
                <div style="display: none" id="body-avisoce">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoCE']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('85no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('85no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('85no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('85no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('85no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('85no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('85no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('85no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('85no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('85no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('85no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('85no6', '6. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('85no6', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('85no7', '7. Asuntos', ['class' => 'form-label']) !!}
                            <div id="wrapper_avisoce">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('85no7', null, ['class' => 'form-control','placeholder' => 'Asunto', 'required']) !!}
                                <button type="button" id="add_asunto_aviso" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisoce" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisoce" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso al CE --}}

                {{-- Fe de erratas --}}
                <div style="display: none" id="body-fedeerratas">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_feDeErratas']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('86no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('86no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('86no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('86no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('86no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('86no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('86no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('86no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('86no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('86no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('86no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('86no6', '6. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('86no6', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('86no7', '7. Fecha del documento expedido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('86no7', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('86no8', '8. Describir los errores', ['class' => 'form-label']) !!}
                            <div id="wrapper_fedeerratas">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('86no8', null, ['class' => 'form-control','placeholder' => 'Error', 'required']) !!}
                                <button type="button" id="add_fe_de_erratas" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                            </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCfedeerratas" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGfedeerratas" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Fe de erratas --}}

                {{-- Renovacion anual --}}
                <div style="display: none" id="body-renovacionanual">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionAnual']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('87no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('87no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('87no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('87no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('87no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('87no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('87no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('87no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('87no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('87no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('87no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('87no6', '6. Sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clinic-medical"></i></span>
                                {!! Form::text('87no6', null, ['class' => 'form-control', 'placeholder' => 'Dirección sitio clínico', 'readonly','required']) !!}
                                {{-- {!! Form::select('87no6', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.'],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un sitio clínico', 'required']) !!} --}}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('87no', '7. Fechas de aprobación', ['class' => 'form-label']) !!}

                            <div id="wrapper_renovacionanual">

                                <div class="renovacionanualinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no7', 'Comité de Ética en Investigación', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <!-- TODO: ver de donde se toma la fecha o si el usuario ingresara la fecha -->
                                            {!! Form::date('87no7', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no8', 'Comité de Investigación', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('87no8', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no9', 'COFEPRIS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <!-- TODO: ver si se queda como date o como caja de texto -->
                                            {{-- {!! Form::date('87no9', null, ['class' => 'form-control', 'required']) !!} --}}
                                            {!! Form::text('87no9', null, ['class' => 'form-control', 'placeholder' => 'Pendiente o fecha, ejemplo: 24-Mayo-2022 (Año-Mes-Día)', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('87no', '10. Informe correspondiente', ['class' => 'form-label']) !!}

                            <div id="wrapper_renovacionanual">

                                <div class="renovacionanualinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no10', 'Estado del proyecto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::select('87no10', [ 'Espera visita de inicio' => 'Espera visita de inicio', 'En conducción' => 'En conducción', 'Cerrado' => 'Cerrado' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estado del proyecto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no11', 'Fecha de visita de inicio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                                            {!! Form::date('87no11', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no12', 'Sujetos que firmaron ICF', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('87no12', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no13', 'Sujetos activos o en seguimiento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('87no13', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no14', 'Total de informes iniciales de EAS en el sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('87no14', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('87no15', 'Total de desviaciones o violaciones en el sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('87no15', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div16">
                            {!! Form::label('87no16', '16. Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('87no16', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrenovacionanual" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrenovacionanual" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Renovación anual --}}

                {{-- Informte técnico --}}
                <div style="display: none" id="body-informetecnico">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_informeTecnico']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('88no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('88no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('88no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('88no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('88no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('88no3', '3. Nombre del Presidente del Comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('88no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Presidente del Comité', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('88no4', '4. Asunto: informe técnico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('88no4', [ 'Mensual' => 'Mensual', 'Trimestral' => 'Trimestral', 'Semestral' => 'Semestral', 'Anual' => 'Anual', 'Final' => 'Final' ], null, ['class' => 'form-control', 'placeholder' => 'Selecciona un periodo', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('88no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('88no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('88no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('88no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('88no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('88no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('88no8', '8. Sitio clínico', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clinic-medical"></i></span>
                                {!! Form::text('88no8', null, ['class' => 'form-control', 'placeholder' => 'Dirección sitio clínico', 'readonly','required']) !!}
                                {{-- {!! Form::select('88no8', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.'],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un sitio clínico', 'required']) !!} --}}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('88no', '9. Fechas de aprobación', ['class' => 'form-label']) !!}

                            <div id="wrapper_renovacionanual">

                                <div class="renovacionanualinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no9', 'Comité de Ética en Investigación', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <!-- TODO: ver de donde se toma la fecha o si el usuario ingresara la fecha -->
                                            {!! Form::date('88no9', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no10', 'Comité de Investigación', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('88no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no11', 'COFEPRIS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <!-- TODO: ver si se queda como date o como caja de texto -->
                                            {{-- {!! Form::date('88no11', null, ['class' => 'form-control', 'required']) !!} --}}
                                            {!! Form::text('88no11', null, ['class' => 'form-control', 'placeholder' => 'Pendiente o fecha, ejemplo: 24-Mayo-2022 (Año-Mes-Día)', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('88no', '12. Informe correspondiente', ['class' => 'form-label']) !!}

                            <div id="wrapper_renovacionanual">

                                <div class="renovacionanualinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no12', 'Estado del proyecto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::select('88no12', [ 'Espera visita de inicio' => 'Espera visita de inicio', 'En conducción' => 'En conducción', 'Cerrado' => 'Cerrado' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estado del proyecto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no13', 'Fecha de visita de inicio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                                            {!! Form::date('88no13', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no14', 'Sujetos que firmaron ICF', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('88no14', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no15', 'Sujetos activos o en seguimiento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('88no15', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no16', 'Total de informes iniciales de EAS en el sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('88no16', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('88no17', 'Total de desviaciones o violaciones en el sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('88no17', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div18">
                            {!! Form::label('88no18', '18. Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('88no18', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCinformetecnico" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGinformetecnico" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Informe técnico --}}

                {{-- Aviso de cierre --}}
                <div style="display: none" id="body-avisocierre">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoCierre']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('89no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('89no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('89no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('89no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('89no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('89no3', '3. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('89no3', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('89no4', '4. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('89no4', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('89no5', '5. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('89no5', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('89no', '6. Resumen final de las actividades realizadas', ['class' => 'form-label']) !!}

                            <div id="wrapper_avisocierre">

                                <div class="avisocierreinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no6', 'Fecha de visita de inicio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('89no6', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no7', 'Fecha de reclutamiento del 1er sujeto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('89no7', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no8', 'Sujetos que firmaron ICF', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('89no8', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no9', 'Sujetos aleatorizados', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('89no9', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no10', 'Fallas de selección', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('89no10', null, ['class' => 'form-control', 'placeholder' => '# Fallas', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no11', 'Retiros', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('89no11', null, ['class' => 'form-control', 'placeholder' => '# Retiros', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no12', 'Sujetos que finalizaron tratamiento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('89no12', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no13', 'Sujetos activos o en seguimiento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('89no13', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no14', 'Eventos adversos serios en el Sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('89no14', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no15', 'Desviaciones o violaciones', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('89no15', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('89no16', 'Fecha de visita de cierre', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('89no16', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div17">
                            {!! Form::label('89no17', '17. Investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('89no17', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisocierre" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisocierre" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso de cierre --}}

                {{-- Cambio de domicilio --}}
                <div style="display: none" id="body-cambiodomicilio">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cambioDomicilio']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('91no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('91no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                                {{-- {!! Form::select('91no1', [ 'Chihuahua, Chih.' => 'Chihuahua, Chih.', 'Ciudad de México' => 'Ciudad de México', 'Zapopan, Jal.' => 'Zapopan, Jal.' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una ciudad', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('91no2', '2. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('91no2', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('91no3', '3. Nombre del destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre del destinatario', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('91no4', '4. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no4', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('91no5', '5. Empresa', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no5', null, ['class' => 'form-control', 'placeholder' => 'Empresa', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('91no6', '6. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no6', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div7">
                            {!! Form::label('91no7', '7. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('91no7', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('91no8', '8. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('91no8', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('91no9', '9. Título del destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no9', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado del destinatario', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('91no10', '10. Apellido del destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no10', null, ['class' => 'form-control', 'placeholder' => 'Primer apellido del destinatario', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('91no11', '11. Nuevo domicilio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::textarea('91no11', null, ['class' => 'form-control', 'rows' => '4','placeholder' => 'Escribir nuevo domicilio', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('91no12', '12. Nombre de quien notifica', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no12', null, ['class' => 'form-control', 'placeholder' => 'Dr/Dra Nombre completo de quien notifica', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div13">
                            {!! Form::label('91no13', '13. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('91no13', null, ['class' => 'form-control', 'placeholder' => 'Puesto de quien notifica', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcambiodomicilio" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcambiodomicilio" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Cambio de domicilio --}}


        </div>
        <!-- END Modal -->


    </div>
    </div>