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

            {{-- Control --}}
            <div style="display: none" id="body-1" name="body-invitacion">
            <div class="modal-body">
                {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_invitacion']) !!}

                {{-- <div class="form-group" id="div1">
                    {!! Form::label('1no1', '1. Lugar', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map"></i></span>
                        {!! Form::text('1no1', null, ['class' => 'form-control', 'placeholder' => 'Lugar', 'readonly']) !!}
                    </div>
                </div> --}}

                <div class="form-group" id="div1">
                    {!! Form::label('1no1', '1. Fecha invitación', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        {!! Form::date('1no1', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div2">
                    {!! Form::label('1no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                        {!! Form::text('1no2', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado del destinatario (Dr., Dra., Ing., etc...)', 'required']) !!}
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
                    {!! Form::label('1no4', '4. Invitación al', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        {!! Form::select('1no4', [ 'Comité de Ética en Investigación (CEI)' => 'Comité de Ética en Investigación (CEI)', 'Comité de Investigación (CI)' => 'Comité de Investigación (CI)' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                    </div>
                </div>
                
                <div class="form-group" id="div5">
                    {!! Form::label('1no5', '5. Primer apellido', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('1no5', null, ['class' => 'form-control', 'placeholder' => 'Primer apellido', 'required']) !!}
                    </div>
                </div>

                <!--TODO: queda pendiente los demas datos que se van a automatizar-->

                <div class="form-group" id="div6">
                    {!! Form::label('1no6', '6. Integración', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('1no6', null, ['class' => 'form-control', 'placeholder' => 'Comité de Ética en Investigación (CEI)', 'readonly']) !!}
                    </div>
                </div>

                <div class="form-group" id="div7">
                    {!! Form::label('1no7', '7. Aspectos a evaluar', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        {!! Form::text('1no7', null, ['class' => 'form-control', 'placeholder' => 'Aspecto a evaluar', 'readonly']) !!}
                        {{-- {!! Form::select('1no7', ['Lic. Luz Eighty García, Coordinadora de Investigación Clínica' => 'Lic. Luz Eighty García, Coordinadora de Investigación Clínica', 'Química Ruth Zafra, Coordinadora de Investigación Clínica' => 'Química Ruth Zafra, Coordinadora de Investigación Clínica', 'Dra. Brenda Rábago, Coordinadora de Investigación Clínica' => 'Dra. Brenda Rábago, Coordinadora de Investigación Clínica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione la persona a cargo...', 'required']) !!} --}}
                    </div>
                </div>
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCinvitacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGinvitacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Invitacion --}}

{{-- ======================================================================================================================================================================= --}}

            {{-- Confidencialidad --}}
            <div style="display: none" id="body-2" name="body-confidencialidad">
            <div class="modal-body">
                {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_confidencialidad']) !!}

                <div class="form-group" id="div1">
                    {!! Form::label('2no1', '1. Confidencialidad del ', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file"></i></span>
                        {!! Form::select('2no1', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de confidencialidad', 'required']) !!}
                    </div>
                </div>

                <div class="form-group" id="div2">
                    {!! Form::label('2no2', '2. Como miembro o consultor del ', ['class' => 'form-label']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                        {!! Form::select('2no2', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione el tipo de miembro o consultor del ', 'required']) !!}
                    </div>
                </div>
        
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCconfidencialidad" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGconfidencialidad" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
            </div>
            {!! Form::close() !!}
            </div>
            {{-- END Confidencialidad --}}

{{-- ======================================================================================================================================================================= --}}

            {{-- Designacion --}}
            <div style="display: none" id="body-5" name="body-designacion">
                <div class="modal-body">
                    {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_designacion']) !!}
    
                    <div class="form-group" id="div1">
                        {!! Form::label('5no1', '1. Fecha', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('5no1', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div2">
                        {!! Form::label('5no2', '2. Título abreviado del miembro', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                            {!! Form::text('5no2', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado (Dr., Dra., etc...)', 'required']) !!}
                        </div>
                    </div>
                    
                    <!-- TODO: ver de donde se obtienen los miembros del comite para cambiar el select -->
                    <div class="form-group" id="div3">
                        {!! Form::label('5no3', '3. Nombre completo del miembro', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('5no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del miembro', 'required']) !!}
                            {{-- {!! Form::select('5no3', $miembrosComite,null, ['class' => 'form-control', 'placeholder' => 'Seleccione un miembro', 'required']) !!} --}}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div4">
                        {!! Form::label('5no4', '4. Designación Vocal del Comité de', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            {!! Form::select('5no4', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div5">
                        {!! Form::label('5no5', '5. Primer apellido', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::text('5no5', null, ['class' => 'form-control', 'placeholder' => 'Primer apellido del miembro', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div6">
                        {!! Form::label('5no6', '6. Tipo de comite integrado', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            {!! Form::select('5no6', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div7">
                        {!! Form::label('5no7', '7. Aspectos a evaluar', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            {!! Form::select('5no7', [ 'éticos y legales' => 'éticos y legales', 'metodológicos' => 'metodológicos' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el o los aspectos', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="div8">
                        {!! Form::label('5no8', '8. Por la presente me permito designarlo como Vocal del', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            {!! Form::select('5no8', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div9">
                        {!! Form::label('5no9', '9. Miembro del Comité de Ética en Investigación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::select('5no9', [ 'Si' => 'Si', 'No' => 'No' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div10">
                        {!! Form::label('5no10', '10. Miembro del Comité de Investigación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::select('5no10', [ 'Si' => 'Si', 'No' => 'No' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group" id="div11">
                        {!! Form::label('5no11', '11. Representante de los usuarios de servicios de salud', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            {!! Form::select('5no11', [ 'Si' => 'Si', 'No' => 'No' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                        </div>
                    </div>
            
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCdesignacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGdesignacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                </div>
                {!! Form::close() !!}
                </div>
                {{-- END Designacion --}}

{{-- ======================================================================================================================================================================== --}}

                {{-- Instalacion --}}
                <div style="display: none" id="body-6" name="body-instalacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_instalacion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('6no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('6no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div2">
                            {!! Form::label('6no2', '2. Acta de instalación del ', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                {!! Form::select('6no2', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div3">
                            {!! Form::label('6no3', '3. Comité que se integro', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                {!! Form::select('6no3', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div4">
                            {!! Form::label('6no4', '4. Hora de instalación del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                {!! Form::time('6no4', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('6no5', '5. Día de instalación del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                {!! Form::select('6no5', [ '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31']
                                ,null, ['class' => 'form-control', 'placeholder' => 'Seleccione el día', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('6no6', '6. Mes de instalación del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {{-- {!! Form::selectMonth('6no6', ['class' => 'form-control', 'required']) !!} --}}
                                {!! Form::select('6no6', [ 'Enero' => 'Enero', 'Febrero' => 'Febrero', 'Marzo' => 'Marzo', 'Abril' => 'Abril', 'Mayo' => 'Mayo', 'Junio' => 'Junio', 'Julio' => 'Julio', 'Agosto' => 'Agosto', 'Septiembre' => 'Septiembre', 'Octubre' => 'Octubre', 'Noviembre' => 'Noviembre', 'Diciembre' => 'Diciembre' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione el mes', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('6no7', '7. Año de instalación del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::selectYear('6no7', 1990, 2090, ['class' => 'form-control', 'placeholder' => 'Seleccione un año','required']) !!}
                            </div>
                        </div>
                                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCinstalacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGinstalacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Instalacion --}}

{{-- ======================================================================================================================================================================= --}}

                {{-- Constancia de miembro --}}
                <div style="display: none" id="body-9" name="body-constanciaMiembro">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_constanciaMiembro']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('9no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('9no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('9no2', '2. Título abreviado del miembro del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('9no2', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('9no3', '3. Nombre completo del miembro', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('9no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
                                {{-- {!! Form::select('9no3', $miembrosComite,null, ['class' => 'form-control', 'placeholder' => 'Seleccione un miembro', 'required']) !!} --}}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('9no4', '4. Vocal del comite de: ', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                {!! Form::select('9no4', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un comité', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('9no5', '5. Fecha del nombramiento emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('9no5', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('9no6', '6. Asuntos', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('9no6', null, ['class' => 'form-control', 'placeholder' => 'Asuntos', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div7">
                            {!! Form::label('9no7', '7. Las funciones son reguladas por', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('9no7', null, ['class' => 'form-control', 'placeholder' => 'Asociación', 'readonly']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCconstanciaMiembro" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGconstanciaMiembro" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Constancia de miembro --}}

{{-- ======================================================================================================================================================================= --}}

                {{-- No voto --}}
                <div style="display: none" id="body-15" name="body-noVoto">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_noVoto']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('15no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('15no1', null,['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('15no2', '2. Asunto: No voto ', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::select('15no2', [ 'CEI' => 'CEI', 'CI' => 'CI' ],null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('15no3', '3. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('15no3', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('15no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('15no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('15no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('15no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('15no6', '6. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('15no6', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('15no7', '7. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('15no7', null, ['class' => 'form-control', 'placeholder' => 'Escriba una dirección', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div8">
                            {!! Form::label('15no8', '8. Fecha de la reunión', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('15no8', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('15no9', '9. Nombre completo del miembro del Comité excluido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('15no9', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del miembro del Comité excluido', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('15no10', '10. Atentamente', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('15no10', [ 'Dra. María Elena Martínez Tapia' => 'Dra. María Elena Martínez Tapia', 'Dr. Juan Carlos Cantú' => 'Dr. Juan Carlos Cantú' ], null, ['class' => 'form-control', 'placeholder' => 'Atentamente', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('15no11', '11. Presidente del comité de', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                {!! Form::select('15no11', [ 'Comité de Ética en Investigación' => 'Comité de Ética en Investigación', 'Comité de Investigación' => 'Comité de Investigación' ], null, ['class' => 'form-control', 'placeholder' => 'Presidente de comité', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCnovoto" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGnovoto" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END No voto --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- No aprobado --}}
                <div style="display: none" id="body-17" name="body-noAprobado">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_noAprobado']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('17no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('17no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('17no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('17no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('17no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('17no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('17no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('17no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('17no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('17no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('17no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('17no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('17no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('17no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('17no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('17no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('17no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('17no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="noAprobadoCampos">
                            <div class="form-group" id="div10">
                                {!! Form::label('17no', '10. Los documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobadodoc">
                                    {!! Form::label('17no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('17no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha del documento', 'required']) !!}
                                    <button type="button" id="add_docrevisado_noaprob" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>

                            <div class="form-group" id="div11">
                                {!! Form::label('17no', '11. Los argumentos de rechazo fueron', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobadoarg">
                                    {!! Form::label('17no11', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                    {!! Form::text('17no11', null, [ 'id' => '17no11', 'name' => '17no11' ,'class' => 'noaprobadoArgumento form-control','placeholder' => 'Escribir argumento', 'required']) !!}
                                    <button type="button" id="add_argu_noaprob" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCnoaprobado" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGnoaprobado" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END No aprobado --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Pendiente de aprobacion --}}
                <div style="display: none" id="body-18" name="body-pendienteAprobacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pendienteAprobacion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('18no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('18no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('18no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('18no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('18no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('18no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('18no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('18no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('18no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('18no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('18no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('18no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('18no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('18no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('18no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('18no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('18no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('18no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="pendienteAprobadoCampos">
                            <div class="form-group" id="div10">
                                {!! Form::label('18no', '10. Para emitir el dictamen aprobatorio, es necesario realizar los siguientes cambios:', ['class' => 'form-label']) !!}
                                <div id="wrapper_pendienteaprobadodoc">
                                    {!! Form::label('18no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('18no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha del documento, así como los cambios solicitados', 'required']) !!}
                                    <button type="button" id="add_cambio_pendienteaprob" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpendienteAprobacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpendienteAprobacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Pendiente de aprobacion --}}

{{-- ====================================================================================================================================================================== --}}

                {{-- Pendiente de aprobacion CEI --}}
                <div style="display: none" id="body-19" name="body-pendienteAprobacionCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pendienteAprobacionCEI']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('19no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('19no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('19no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('19no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('19no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('19no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('19no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('19no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('19no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('19no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('19no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('19no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('19no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('19no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('19no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('19no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('19no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('19no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="pendienteAprobadoCamposCEI">
                            <div class="form-group" id="div10">
                                {!! Form::label('19no', '10. Para emitir el dictamen aprobatorio, es necesario realizar los siguientes cambios:', ['class' => 'form-label']) !!}
                                <div id="wrapper_pendienteaprobadodocCEI">
                                    {!! Form::label('19no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('19no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha del documento, así como los cambios solicitados', 'required']) !!}
                                    <button type="button" id="add_cambio_pendienteaprobCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpendienteAprobacionCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpendienteAprobacionCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Pendiente de aprobacion CEI --}}

{{-- ======================================================================================================================================================================= --}}

                {{-- Pendiente de aprobacion CI --}}
                <div style="display: none" id="body-20" name="body-pendienteAprobacionCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pendienteAprobacionCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('20no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('20no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('20no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('20no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('20no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('20no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('20no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('20no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('20no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('20no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('20no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('20no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('20no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('20no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('20no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('20no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('20no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('20no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="pendienteAprobadoCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('20no', '10. Para emitir el dictamen aprobatorio, es necesario realizar los siguientes cambios:', ['class' => 'form-label']) !!}
                                <div id="wrapper_pendienteaprobadodocCI">
                                    {!! Form::label('20no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('20no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha del documento, así como los cambios solicitados', 'required']) !!}
                                    <button type="button" id="add_cambio_pendienteaprobCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCpendienteAprobacionCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGpendienteAprobacionCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Pendiente de aprobacion CI --}}


{{-- ==================================================================================================================================================================== --}}

                {{-- Aprobacion Inicial --}}
                <div style="display: none" id="body-21" name="body-aprobacionInicial">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionInicial']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('21no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('21no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('21no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('21no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('21no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('21no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('21no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('21no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('21no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('21no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('21no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('21no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('21no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('21no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('21no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('21no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('21no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('21no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('21no10', '10. dictamen emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('21no10', [ 'Aprobado' => 'Aprobado', 'Aprobado para migración' => 'Aprobado para migración' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dictamen', 'required']) !!}
                            </div>
                        </div>

                        <div class="aprobacioninicialCampos">
                            <div class="form-group" id="div11">
                                {!! Form::label('21no', '11. El material y/o documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobacioninicialdoc">
                                    {!! Form::label('21no11', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('21no11', null, ['class' => 'form-control','placeholder' => 'Describir con nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aprobinicial" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionInicial" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionInicial" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion Inicial --}}

{{-- ==================================================================================================================================================================== --}}


                {{-- Aprobacion Inicial CEI --}}
                <div style="display: none" id="body-22" name="body-aprobacionInicialCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionInicialCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('22no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('22no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('22no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('22no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('22no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('22no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('22no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('22no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('22no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('22no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('22no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('22no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('22no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('22no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('22no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('22no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('22no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('22no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('22no10', '10. dictamen emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('22no10', [ 'Aprobado' => 'Aprobado', 'Aprobado para migración' => 'Aprobado para migración' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dictamen', 'required']) !!}
                            </div>
                        </div>

                        <div class="aprobacioninicialCamposCEI">
                            <div class="form-group" id="div11">
                                {!! Form::label('22no', '11. El material y/o documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobacioninicialdocCEI">
                                    {!! Form::label('22no11', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('22no11', null, ['class' => 'form-control','placeholder' => 'Describir con nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aprobinicialCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionInicialCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionInicialCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion Inicial CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aprobacion Inicial CI --}}
                <div style="display: none" id="body-23" name="body-aprobacionInicialCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionInicialCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('23no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('23no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('23no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('23no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('23no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('23no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('23no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('23no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('23no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('23no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('23no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('23no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('23no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('23no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('23no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('23no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('23no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('23no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        {{-- <div class="form-group" id="div10">
                            {!! Form::label('23no10', '10. dictamen emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('23no10', [ 'Aprobado' => 'Aprobado', 'Aprobado para migración' => 'Aprobado para migración' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dictamen', 'required']) !!}
                            </div>
                        </div> --}}

                        <div class="aprobacioninicialCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('23no', '10. El material y/o documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobacioninicialdocCI">
                                    {!! Form::label('23no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('23no10', null, ['class' => 'form-control','placeholder' => 'Describir con nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aprobinicialCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionInicialCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionInicialCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion Inicial CI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aceptacion de responsabilidades --}}
                <div style="display: none" id="body-24" name="body-aceptacionResponsabilidades">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aceptacionResponsabilidades']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('24no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('24no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('24no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('24no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('24no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('24no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('24no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('24no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('24no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('24no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('24no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('24no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('24no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('24no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('24no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('24no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('24no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('24no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('24no10', '10. dictamen emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('24no10', [ 'Aprobado' => 'Aprobado', 'Aprobada la migración' => 'Aprobada la migración' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dictamen', 'required']) !!}
                            </div>
                        </div>

                        <div class="aceptacionResponsabilidadesCampos">
                            <div class="form-group" id="div11">
                                {!! Form::label('24no', '11. El material y/o documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aceptacionResponsabilidadesdoc">
                                    {!! Form::label('24no11', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('24no11', null, ['class' => 'form-control','placeholder' => 'Describir con nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aceptResp" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaceptacionResponsabilidades" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaceptacionResponsabilidades" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aceptacion de responsabilidades --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aceptacion de responsabilidades CEI --}}
                <div style="display: none" id="body-25" name="body-aceptacionResponsabilidadesCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aceptacionResponsabilidadesCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('25no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('25no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('25no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('25no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('25no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('25no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('25no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('25no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('25no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('25no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('25no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('25no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('25no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('25no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('25no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('25no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('25no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('25no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('25no10', '10. dictamen emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('25no10', [ 'Aprobado' => 'Aprobado', 'Aprobada la migración' => 'Aprobada la migración' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dictamen', 'required']) !!}
                            </div>
                        </div>

                        <div class="aceptacionResponsabilidadesCamposCEI">
                            <div class="form-group" id="div11">
                                {!! Form::label('25no', '11. El material y/o documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aceptacionResponsabilidadesdocCEI">
                                    {!! Form::label('25no11', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('25no11', null, ['class' => 'form-control','placeholder' => 'Describir con nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aceptRespCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaceptacionResponsabilidadesCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaceptacionResponsabilidadesCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aceptacion de responsabilidades CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aceptacion de responsabilidades CI --}}
                <div style="display: none" id="body-26" name="body-aceptacionResponsabilidadesCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aceptacionResponsabilidadesCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('26no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('26no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('26no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('26no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('26no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('26no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('26no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('26no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('26no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('26no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('26no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('26no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('26no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('26no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('26no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('26no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('26no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('26no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        {{-- <div class="form-group" id="div10">
                            {!! Form::label('26no10', '10. dictamen emitido', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::select('26no10', [ 'Aprobado' => 'Aprobado', 'Aprobada la migración' => 'Aprobada la migración' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione el dictamen', 'required']) !!}
                            </div>
                        </div> --}}

                        <div class="aceptacionResponsabilidadesCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('26no', '10. El material y/o documentos revisados fueron:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aceptacionResponsabilidadesdocCI">
                                    {!! Form::label('26no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('26no10', null, ['class' => 'form-control','placeholder' => 'Describir con nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aceptRespCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaceptacionResponsabilidadesCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaceptacionResponsabilidadesCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aceptacion de responsabilidades CI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Adherencia GCP-ICH --}}
                <div style="display: none" id="body-27" name="body-adherenciaGCP">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_adherenciaGCP']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('27no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('27no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('27no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('27no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('27no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('27no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('27no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('27no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCadherenciaGCP" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGadherenciaGCP" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Adherencia GCP-ICH --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Adherencia GCP-ICH CEI --}}
                <div style="display: none" id="body-28" name="body-adherenciaGCPCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_adherenciaGCPCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('28no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('28no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('28no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('28no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('28no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('28no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('28no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('28no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCadherenciaGCPCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGadherenciaGCPCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Adherencia GCP-ICH CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Adherencia GCP-ICH CI --}}
                <div style="display: none" id="body-29" name="body-adherenciaGCPCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_adherenciaGCPCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('29no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('29no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('29no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('29no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('29no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('29no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('29no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('29no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCadherenciaGCPCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGadherenciaGCPCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Adherencia GCP-ICH CI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Lista de miembros --}}
                <div style="display: none" id="body-30" name="body-listaMiembros">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_listaMiembros']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('30no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('30no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('30no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('30no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('30no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('30no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('30no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('30no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('30no5', '5. Fecha de la reunión a la que asistieron los miembros del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('30no5', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnClistaMiembros" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGlistaMiembros" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Lista de miembros --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Lista de miembros CEI --}}
                <div style="display: none" id="body-31" name="body-listaMiembrosCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_listaMiembrosCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('31no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('31no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('31no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('31no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('31no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('31no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('31no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('31no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('31no5', '5. Fecha de la reunión a la que asistieron los miembros del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('31no5', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnClistaMiembrosCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGlistaMiembrosCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Lista de miembros CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Lista de miembros CI --}}
                <div style="display: none" id="body-32" name="body-listaMiembrosCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_listaMiembrosCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('32no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('32no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('32no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('32no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('32no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('32no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('32no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('32no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('32no5', '5. Fecha de la reunión a la que asistieron los miembros del comité', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('32no5', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnClistaMiembrosCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGlistaMiembrosCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Lista de miembros CI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Confidencialidad y No conflicto --}}
                <div style="display: none" id="body-34" name="body-confiNoConfli">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_confiNoConfli']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('34no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('34no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('34no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('34no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('34no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('34no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('34no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('34no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCconfiNoConfli" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGconfiNoConfli" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Confidencialidad y No conflicto --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Confidencialidad y No conflicto CEI --}}
                <div style="display: none" id="body-35" name="body-confiNoConfliCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_confiNoConfliCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('35no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('35no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('35no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('35no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('35no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('35no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('35no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('35no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCconfiNoConfliCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGconfiNoConfliCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Confidencialidad y No conflicto CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Confidencialidad y No conflicto CI --}}
                <div style="display: none" id="body-36" name="body-confiNoConfliCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_confiNoConfliCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('36no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('36no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('36no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('36no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('36no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('36no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('36no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('36no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCconfiNoConfliCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGconfiNoConfliCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Confidencialidad y No conflicto CI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Informacion sobre auditorias --}}
                <div style="display: none" id="body-37" name="body-infoAuditorias">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_infoAuditorias']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('37no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('37no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('37no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('37no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('37no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('37no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('37no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('37no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCinfoAuditorias" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGinfoAuditorias" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Informacion sobre auditorias --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Informacion sobre auditorias CEI --}}
                <div style="display: none" id="body-38" name="body-infoAuditoriasCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_infoAuditoriasCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('38no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('38no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('38no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('38no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('38no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('38no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('38no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('38no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCinfoAuditoriasCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGinfoAuditoriasCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Informacion sobre auditorias CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Informacion sobre auditorias CI --}}
                <div style="display: none" id="body-39" name="body-infoAuditoriasCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_infoAuditoriasCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('39no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('39no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('39no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('39no2', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('39no3', '3. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('39no3', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('39no4', '4. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('39no4', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCinfoAuditoriasCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGinfoAuditoriasCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Informacion sobre auditorias CI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aprobacion de enmienda --}}
                <div style="display: none" id="body-43" name="body-aprobacionEnmienda">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionEnmienda']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('43no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('43no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('43no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('43no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('43no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('43no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('43no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('43no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('43no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('43no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('43no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('43no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('43no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('43no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('43no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('43no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('43no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('43no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="aprobacionEnmiendaCampos">
                            <div class="form-group" id="div10">
                                {!! Form::label('43no', '10. Hacemos de su conocimiento que este comité revisó y aprobó la siguiente Enmienda:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobacionEnmiendadoc">
                                    {!! Form::label('43no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('43no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha.', 'required']) !!}
                                    <button type="button" id="add_doc_aprobEnmienda" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionEnmienda" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionEnmienda" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion de enmienda --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aprobacion de enmienda CEI --}}
                <div style="display: none" id="body-44" name="body-aprobacionEnmiendaCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionEnmiendaCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('44no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('44no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('44no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('44no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('44no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('44no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('44no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('44no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('44no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('44no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('44no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('44no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('44no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('44no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('44no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('44no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('44no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('44no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="aprobacionEnmiendaCamposCEI">
                            <div class="form-group" id="div10">
                                {!! Form::label('44no', '10. Hacemos de su conocimiento que este comité revisó y aprobó la siguiente Enmienda:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobacionEnmiendadocCEI">
                                    {!! Form::label('44no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('44no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha.', 'required']) !!}
                                    <button type="button" id="add_doc_aprobEnmiendaCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionEnmiendaCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionEnmiendaCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion de enmienda CEI --}}


{{-- =================================================================================================================================================================== --}}


                {{-- Aprobacion de enmienda CI --}}
                <div style="display: none" id="body-45" name="body-aprobacionEnmiendaCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionEnmiendaCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('45no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('45no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('45no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('45no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('45no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('45no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('45no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('45no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('45no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('45no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('45no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('45no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('45no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('45no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('45no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('45no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('45no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('45no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="aprobacionEnmiendaCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('45no', '10. Hacemos de su conocimiento que este comité revisó y aprobó la siguiente Enmienda:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobacionEnmiendadocCI">
                                    {!! Form::label('45no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('45no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha.', 'required']) !!}
                                    <button type="button" id="add_doc_aprobEnmiendaCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionEnmiendaCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionEnmiendaCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion de enmienda CI --}}


{{-- =================================================================================================================================================================== --}}

                  
                {{-- Revision de desviacion --}}
                <div style="display: none" id="body-46" name="body-revisionDesviacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_revisionDesviacion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('46no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('46no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('46no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('46no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('46no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('46no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('46no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('46no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('46no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('46no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('46no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('46no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('46no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('46no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('46no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('46no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('46no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('46no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('46no10', '10. Hacemos de su conocimiento que estos comités revisaron el reporte entregado el:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('46no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div11">
                            {!! Form::label('46no11', '11. Estos comités calificaron el evento descrito como una:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::select('46no11', [ 'Desviación' => 'Desviación', 'Violación' => 'Violación' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('46no', '12. Reporte de desviación', ['class' => 'form-label']) !!}

                            <div id="wrapper_revisiondesviacion">

                                <div class="revisiondesviacioninpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('46no12', '# Sujeto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('46no12', null, ['class' => 'form-control', 'placeholder' => '# Sujeto', 'required']) !!}
                                            </div>
                                        </div>

                                        <div class="col form-group">
                                            {!! Form::label('46no13', '# Visita', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('46no13', null, ['class' => 'form-control', 'placeholder' => '# Visita', 'required']) !!}
                                            </div>
                                        </div>
    
                                        <div class="col form-group">
                                            {!! Form::label('46no14', 'Fecha', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('46no14', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
    
                                        <div class="col form-group">
                                            {!! Form::label('46no15', 'Descripción', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::textarea('46no15', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => '2','required']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col form-group">
                                            {!! Form::label('46no16', 'Acciones tomadas', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::textarea('46no16', null, ['class' => 'form-control', 'placeholder' => 'Acciones tomadas', 'rows' => '2','required']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="button" id="add_revision_desviacion" class="add_button btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrevisionDesviacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrevisionDesviacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Revision de desviacion --}}


{{-- ====================================================================================================================================================================== --}}

                  
                {{-- Revision de desviacion CEI --}}
                <div style="display: none" id="body-47" name="body-revisionDesviacionCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_revisionDesviacionCEI']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('47no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('47no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('47no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('47no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('47no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('47no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('47no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('47no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('47no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('47no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('47no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('47no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('47no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('47no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('47no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('47no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('47no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('47no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('47no10', '10. Hacemos de su conocimiento que estos comités revisaron el reporte entregado el:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('47no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div11">
                            {!! Form::label('47no11', '11. Estos comités calificaron el evento descrito como una:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::select('47no11', [ 'Desviación' => 'Desviación', 'Violación' => 'Violación' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrevisionDesviacionCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrevisionDesviacionCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Revision de desviacion CEI --}}


{{-- ====================================================================================================================================================================== --}}

                  
                {{-- Revision de desviacion CI --}}
                <div style="display: none" id="body-48" name="body-revisionDesviacionCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_revisionDesviacionCI']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('48no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('48no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('48no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('48no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('48no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('48no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('48no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('48no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('48no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('48no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('48no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('48no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('48no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('48no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('48no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('48no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('48no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('48no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('48no10', '10. Hacemos de su conocimiento que estos comités revisaron el reporte entregado el:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('48no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div11">
                            {!! Form::label('48no11', '11. Estos comités calificaron el evento descrito como una:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::select('48no11', [ 'Desviación' => 'Desviación', 'Violación' => 'Violación' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrevisionDesviacionCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrevisionDesviacionCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Revision de desviacion CI --}}


{{-- ====================================================================================================================================================================== --}}



                {{-- Enterado --}}
                <div style="display: none" id="body-49" name="body-enterado">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enterado']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('49no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('49no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('49no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('49no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('49no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('49no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('49no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('49no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('49no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('49no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('49no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('49no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('49no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('49no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('49no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('49no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('49no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('49no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="enteradoCampos">
                            <div class="form-group" id="div10">
                                {!! Form::label('49no', '10. Hacemos de su conocimiento que estos comités se dan por enterados de lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_enteradodoc">
                                    {!! Form::label('49no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('49no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_enterado" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenterado" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenterado" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado CEI --}}
                <div style="display: none" id="body-50" name="body-enteradoCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('50no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('50no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('50no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('50no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('50no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('50no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('50no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('50no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('50no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('50no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('50no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('50no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('50no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('50no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('50no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('50no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('50no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('50no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="enteradoCamposCEI">
                            <div class="form-group" id="div10">
                                {!! Form::label('50no', '10. Hacemos de su conocimiento que estos comités se dan por enterados de lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_enteradodocCEI">
                                    {!! Form::label('50no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('50no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_enteradoCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado CEI --}}


{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado CI --}}
                <div style="display: none" id="body-51" name="body-enteradoCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('51no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('51no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('51no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('51no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('51no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('51no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('51no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('51no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('51no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('51no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('51no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('51no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('51no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('51no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('51no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('51no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('51no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('51no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="enteradoCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('51no', '10. Hacemos de su conocimiento que estos comités se dan por enterados de lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_enteradodocCI">
                                    {!! Form::label('51no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('51no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_enteradoCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado CI --}}


{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado EA --}}
                <div style="display: none" id="body-52" name="body-enteradoEA">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoEA']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('52no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('52no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('52no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('52no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('52no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('52no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('52no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('52no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('52no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('52no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('52no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('52no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('52no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('52no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('52no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('52no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('52no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('52no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('52no', '10. Hacemos de su conocimiento que estos comités se dan por enterados del siguiente Evento Adverso No Serio:', ['class' => 'form-label']) !!}

                            <div id="wrapper_enteradoEA">

                                <div class="enteradoEAinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('52no10', 'Sujeto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('52no10', null, ['class' => 'form-control', 'placeholder' => 'Sujeto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('52no11', 'Diagnónstico', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('52no11', null, ['class' => 'form-control', 'placeholder' => 'Diagnónstico', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="row">
                                        <div class="col text-center">
                                            <button type="button" id="add_enterado_ea" class="add_button btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>
                                    </div> --}}

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoEA" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoEA" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado EA --}}


{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado EA CEI --}}
                <div style="display: none" id="body-53" name="body-enteradoEACEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoEACEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('53no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('53no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('53no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('53no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('53no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('53no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('53no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('53no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('53no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('53no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('53no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('53no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('53no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('53no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('53no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('53no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('53no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('53no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('53no', '10. Hago de su conocimiento que este comité se da por enterados de lo siguiente:', ['class' => 'form-label']) !!}

                            <div id="wrapper_enteradoEACEI">

                                <div class="enteradoEAinpustCEI p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('53no10', 'Sujeto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('53no10', null, ['class' => 'form-control', 'placeholder' => 'Sujeto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('53no11', 'Diagnónstico', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('53no11', null, ['class' => 'form-control', 'placeholder' => 'Diagnónstico', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="row">
                                        <div class="col text-center">
                                            <button type="button" id="add_enterado_eaCEI" class="add_button btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>
                                    </div> --}}

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoEACEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoEACEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado EA CEI --}}

                

{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado EA CI --}}
                <div style="display: none" id="body-54" name="body-enteradoEACI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoEACI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('54no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('54no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('54no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('54no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('54no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('54no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('54no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('54no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('54no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('54no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('54no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('54no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('54no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('54no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('54no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('54no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('54no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('54no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('54no', '10. Hago de su conocimiento que este comité se da por enterados de lo siguiente:', ['class' => 'form-label']) !!}

                            <div id="wrapper_enteradoEACI">

                                <div class="enteradoEAinpustCI p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('54no10', 'Sujeto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('54no10', null, ['class' => 'form-control', 'placeholder' => 'Sujeto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('54no11', 'Diagnónstico', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('54no11', null, ['class' => 'form-control', 'placeholder' => 'Diagnónstico', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="row">
                                        <div class="col text-center">
                                            <button type="button" id="add_enterado_eaCI" class="add_button btn btn-block btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                        </div>
                                    </div> --}}

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoEACI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoEACI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado EA CI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado EAS --}}
                <div style="display: none" id="body-55" name="body-enteradoEAS">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoEAS']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('55no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('55no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('55no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('55no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('55no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('55no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('55no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('55no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('55no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('55no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('55no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('55no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('55no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('55no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('55no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('55no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('55no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('55no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('55no', '10. Hacemos de su conocimiento que estos comités se dan por enterados del Evento Adverso Serio', ['class' => 'form-label']) !!}

                            <div id="wrapper_enteradoEAS">

                                <div class="enteradoEASinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('55no10', 'Reportado el día:', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::date('55no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('55no11', 'Sucedido al sujeto:', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('55no11', null, ['class' => 'form-control', 'placeholder' => 'Sujeto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('55no12', 'Relacionado a', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('55no12', null, ['class' => 'form-control', 'placeholder' => 'Nombre del evento', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TODO: ver que onda con el documento en la parte que cambia el parrafo -->

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoEAS" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoEAS" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado EAS --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado EAS CEI --}}
                <div style="display: none" id="body-56" name="body-enteradoEASCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoEASCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('56no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('56no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('56no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('56no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('56no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('56no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('56no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('56no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('56no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('56no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('56no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('56no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('56no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('56no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('56no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('56no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('56no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('56no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('56no', '10. Hago de su conocimiento que este comité se da por enterados del Evento Adverso Serio', ['class' => 'form-label']) !!}

                            <div id="wrapper_enteradoEASCEI">

                                <div class="enteradoEASinpustCEI p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('56no10', 'Reportado el día:', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::date('56no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('56no11', 'Sucedido al sujeto:', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('56no11', null, ['class' => 'form-control', 'placeholder' => 'Sujeto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('56no12', 'Relacionado a', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('56no12', null, ['class' => 'form-control', 'placeholder' => 'Nombre del evento', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TODO: ver que onda con el documento en la parte que cambia el parrafo -->

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoEASCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoEASCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado EAS CEI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Enterado EAS CI --}}
                <div style="display: none" id="body-57" name="body-enteradoEASCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enteradoEASCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('57no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('57no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('57no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('57no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('57no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('57no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('57no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('57no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('57no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('57no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('57no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('57no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('57no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('57no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('57no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('57no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('57no', '10. Hago de su conocimiento que este comité se da por enterado del Evento Adverso Serio', ['class' => 'form-label']) !!}

                            <div id="wrapper_enteradoEASCI">

                                <div class="enteradoEASinpustCI p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('57no10', 'Reportado el día:', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::date('57no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('57no11', 'Sucedido al sujeto:', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('57no11', null, ['class' => 'form-control', 'placeholder' => 'Sujeto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('57no12', 'Relacionado a', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('57no12', null, ['class' => 'form-control', 'placeholder' => 'Nombre del evento', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- TODO: ver que onda con el documento en la parte que cambia el parrafo -->

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCenteradoEASCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGenteradoEASCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Enterado EAS CI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Aprobacion subsecuente --}}
                <div style="display: none" id="body-58" name="body-aprobacionSubsecuente">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionSubsecuente']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('58no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('58no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('58no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('58no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('58no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('58no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('58no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('58no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('58no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('58no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('58no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('58no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('58no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('58no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('58no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('58no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('58no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('58no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="aprobacionsubsecuenteCampos">
                            <div class="form-group" id="div10">
                                {!! Form::label('58no', '10. Hacemos de su conocimiento que estos comités revisaron y aprobaron lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobadosubsecuentedoc">
                                    {!! Form::label('58no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('58no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aprobacionSubsecuente" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionSubsecuente" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionSubsecuente" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion subsecuente --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Aprobacion subsecuente CEI --}}
                <div style="display: none" id="body-59" name="body-aprobacionSubsecuenteCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionSubsecuenteCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('59no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('59no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('59no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('59no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('59no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('59no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('59no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('59no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('59no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('59no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('59no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('59no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('59no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('59no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('59no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('59no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('59no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('59no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="aprobacionsubsecuenteCamposCEI">
                            <div class="form-group" id="div10">
                                {!! Form::label('59no', '10. Hago de su conocimiento que este comité revisó y aprobó lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobadosubsecuentedocCEI">
                                    {!! Form::label('59no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('59no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aprobacionSubsecuenteCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionSubsecuenteCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionSubsecuenteCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion subsecuente CEI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Aprobacion subsecuente CI --}}
                <div style="display: none" id="body-60" name="body-aprobacionSubsecuenteCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aprobacionSubsecuenteCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('60no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('60no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('60no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('60no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('60no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('60no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('60no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('60no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('60no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('60no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('60no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('60no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('60no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('60no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('60no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('60no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('60no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('60no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="aprobacionsubsecuenteCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('60no', '10. Hago de su conocimiento que este comité revisó y aprobó lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_aprobadosubsecuentedocCI">
                                    {!! Form::label('60no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('60no10', null, ['class' => 'form-control','placeholder' => 'Escribir nombre, versión y fecha', 'required']) !!}
                                    <button type="button" id="add_doc_aprobacionSubsecuenteCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCaprobacionSubsecuenteCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGaprobacionSubsecuenteCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aprobacion subsecuente CI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Renovacion anual --}}
                <div style="display: none" id="body-61" name="body-renovacionAnual">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionAnual']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('61no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('61no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('61no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('61no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('61no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('61no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('61no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('61no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('61no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('61no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('61no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('61no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('61no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('61no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('61no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('61no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('61no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('61no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrenovacionAnual" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrenovacionAnual" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Renovacion anual --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Renovacion anual CEI --}}
                <div style="display: none" id="body-62" name="body-renovacionAnualCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionAnualCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('62no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('62no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('62no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('62no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('62no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('62no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('62no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('62no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('62no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('62no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('62no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('62no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('62no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('62no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('62no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('62no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('62no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('62no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrenovacionAnualCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrenovacionAnualCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Renovacion anual CEI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Renovacion anual CI --}}
                <div style="display: none" id="body-63" name="body-renovacionAnualCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionAnualCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('63no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('63no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('63no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('63no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('63no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group" id="div4">
                            {!! Form::label('63no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('63no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div> --}}

                        <div class="form-group" id="div4">
                            {!! Form::label('63no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('63no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('63no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('63no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('63no6', '6. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no6', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div7">
                            {!! Form::label('63no7', '7. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('63no7', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div8">
                            {!! Form::label('63no8', '8. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('63no8', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCrenovacionAnualCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGrenovacionAnualCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Renovacion anual CI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Fe de erratas --}}
                <div style="display: none" id="body-64" name="body-fedeErratas">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fedeErratas']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('64no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('64no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('64no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('64no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('64no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('64no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('64no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('64no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('64no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('64no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('64no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('64no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('64no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('64no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('64no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('64no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('64no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('64no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('64no', '10. Hacemos de su conocimiento', ['class' => 'form-label']) !!}

                            <div id="wrapper_fedeErratas">

                                <div class="fedeErratasinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('64no10', 'En el documento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('64no10', null, ['class' => 'form-control', 'placeholder' => 'Nombre del documento', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('64no11', 'Emitido el', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::date('64no11', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="fedeErratasinpust2 p-2 rounded border border-primary">
                                        {!! Form::label('64no', 'Existe el siguiente error:', ['class' => 'form-label']) !!}

                                        <div class="row">
                                            <div class="col form-group">
                                                {!! Form::label('64no12', 'Dice:', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('64no12', null, ['class' => 'form-control', 'placeholder' => 'Escribir los datos incorrectos', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                {!! Form::label('64no13', 'Debe decir: ', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('64no13', null, ['class' => 'form-control', 'placeholder' => 'ECribir los datos correctos', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCfedeErratas" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGfedeErratas" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Fe de erratas --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Fe de erratas CEI --}}
                <div style="display: none" id="body-65" name="body-fedeErratasCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fedeErratasCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('65no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('65no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('65no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('65no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('65no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('65no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('65no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('65no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('65no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('65no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('65no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('65no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('65no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('65no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('65no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('65no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('65no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('65no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('65no', '10. Hago de su conocimiento', ['class' => 'form-label']) !!}

                            <div id="wrapper_fedeErratasCEI">

                                <div class="fedeErratasinpustCEI p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('65no10', 'En el documento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('65no10', null, ['class' => 'form-control', 'placeholder' => 'Nombre del documento', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('65no11', 'Emitido el', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::date('65no11', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="fedeErratasinpust2CEI p-2 rounded border border-primary">
                                        {!! Form::label('65no', 'Existe el siguiente error:', ['class' => 'form-label']) !!}

                                        <div class="row">
                                            <div class="col form-group">
                                                {!! Form::label('65no12', 'Dice:', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('65no12', null, ['class' => 'form-control', 'placeholder' => 'Escribir los datos incorrectos', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                {!! Form::label('65no13', 'Debe decir: ', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('65no13', null, ['class' => 'form-control', 'placeholder' => 'ECribir los datos correctos', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCfedeErratasCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGfedeErratasCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Fe de erratas CEI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Fe de erratas CI --}}
                <div style="display: none" id="body-66" name="body-fedeErratasCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fedeErratasCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('66no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('66no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('66no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('66no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('66no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('66no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group" id="div4">
                            {!! Form::label('66no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('66no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div> --}}

                        <div class="form-group" id="div4">
                            {!! Form::label('66no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('66no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('66no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('66no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('66no6', '6. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('66no6', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div7">
                            {!! Form::label('66no7', '7. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('66no7', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div8">
                            {!! Form::label('66no8', '8. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('66no8', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('66no', '9. Hago de su conocimiento', ['class' => 'form-label']) !!}

                            <div id="wrapper_fedeErratasCI">

                                <div class="fedeErratasinpustCI p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('66no9', 'En el documento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('66no9', null, ['class' => 'form-control', 'placeholder' => 'Nombre del documento', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('66no10', 'Emitido el', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::date('66no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="fedeErratasinpust2CI p-2 rounded border border-primary">
                                        {!! Form::label('66no', 'Existe el siguiente error:', ['class' => 'form-label']) !!}

                                        <div class="row">
                                            <div class="col form-group">
                                                {!! Form::label('66no11', 'Dice:', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('66no11', null, ['class' => 'form-control', 'placeholder' => 'Escribir los datos incorrectos', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col form-group">
                                                {!! Form::label('66no12', 'Debe decir: ', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('66no12', null, ['class' => 'form-control', 'placeholder' => 'ECribir los datos correctos', 'required']) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCfedeErratasCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGfedeErratasCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Fe de erratas CI --}}



{{-- =================================================================================================================================================================== --}}  



                {{-- Recibo de informe --}}
                <div style="display: none" id="body-67" name="body-reciboInforme">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reciboInforme']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('67no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('67no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('67no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('67no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('67no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('67no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('67no4', '4. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('67no4', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('67no5', '5. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('67no5', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('67no6', '6. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('67no6', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div7">
                            {!! Form::label('67no7', '7. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('67no7', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div8">
                            {!! Form::label('67no8', '8. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('67no8', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('67no', '9. Hago de su conocimiento que este comité recibió el siguiente informe:', ['class' => 'form-label']) !!}

                            <div id="wrapper_reciboInforme">

                                <div class="reciboInformeinpust p-2 rounded border">

                                    {!! Form::label('67no', 'Periodo que se informa:', ['class' => 'form-label']) !!}
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no9', 'Desde', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('67no9', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no10', 'Hasta', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('67no10', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('67no', '11. Informe correspondiente', ['class' => 'form-label']) !!}

                            <div id="wrapper_reciboInforme">

                                <div class="reciboInformeinpust p-2 rounded border">
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no11', 'Estado del proyecto', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::select('67no11', [ 'Espera visita de inicio' => 'Espera visita de inicio', 'En conducción' => 'En conducción', 'Cerrado' => 'Cerrado' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione estado del proyecto', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no12', 'Sujetos que firmaron ICF', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('67no12', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no13', 'Sujetos activos o en seguimiento', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            {!! Form::text('67no13', null, ['class' => 'form-control', 'placeholder' => '# Sujetos', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no14', 'Total de informes iniciales de EAS en el sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('67no14', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('67no15', 'Total de desviaciones o violaciones en el sitio', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('67no15', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCreciboInforme" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGreciboInforme" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Recibo de informe --}}



{{-- ===================================================================================================================================================================== --}}



                {{-- Aviso al Investigador CEI --}}
                <div style="display: none" id="body-68" name="body-avisoInvestigadorCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoInvestigadorCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('68no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('68no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('68no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('68no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('68no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('68no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('68no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('68no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('68no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('68no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('68no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('68no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('68no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('68no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('68no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('68no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('68no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('68no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="avisoinvestigadorCamposCEI">
                            <div class="form-group" id="div10">
                                {!! Form::label('68no', '10. Informo a usted lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_avisoinvestigadordocCEI">
                                    {!! Form::label('68no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('68no10', null, ['class' => 'form-control','placeholder' => 'Describir', 'required']) !!}
                                    <button type="button" id="add_doc_avisoInvestigadorCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisoInvestigadorCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisoInvestigadorCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso al Investigador CEI --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Aviso al Investigador CI --}}
                <div style="display: none" id="body-69" name="body-avisoInvestigadorCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoInvestigadorCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('69no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('69no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('69no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('69no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('69no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('69no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('69no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('69no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('69no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('69no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('69no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('69no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('69no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('69no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('69no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('69no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('69no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('69no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="avisoinvestigadorCamposCI">
                            <div class="form-group" id="div10">
                                {!! Form::label('69no', '10. Informo a usted lo siguiente:', ['class' => 'form-label']) !!}
                                <div id="wrapper_avisoinvestigadordocCI">
                                    {!! Form::label('69no10', '', ['class' => 'form-label', 'hidden']) !!}
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                    {!! Form::text('69no10', null, ['class' => 'form-control','placeholder' => 'Describir', 'required']) !!}
                                    <button type="button" id="add_doc_avisoInvestigadorCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisoInvestigadorCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisoInvestigadorCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso al Investigador CI --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Aviso se auditoria  --}}
                <div style="display: none" id="body-70" name="body-avisoAuditoria">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoAuditoria']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('70no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('70no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('70no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('70no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('70no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('70no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('70no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('70no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('70no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('70no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('70no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('70no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('70no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('70no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('70no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('70no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('70no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('70no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('70no', '10. Para cumplir este procedimiento usted deberá:', ['class' => 'form-label']) !!}

                            <div id="wrapper_avisoauditoria">

                                <div class="avisoauditoriainpust p-2 rounded border">

                                    <ul>
                                        <li>Notificar este Aviso al Patrocinador o su representante.</li>
                                        <li>
                                            Entregar a través de https://uis.com.mx/auditorias.php, los siguientes documentos:

                                            <ol>
                                                <li>Autorización INICIAL de COFEPRIS.</li>
                                                <li>Hoja de firmas del protocolo.</li>
                                                <li>Hoja de Delegación de responsabilidades.</li>
                                                <li>Lista de enrolamiento.</li>
                                                <li>ICF, nota de consentimiento y nota médica de la primera visita de los primeros DIEZ sujetos enrolados, acompañados del Resumen médico previo, cuando exista.</li>
                                            </ol> 
                                        </li>
                                        <li>
                                            <div class="col form-group">
                                                {!! Form::label('70no10', 'La fecha límite para entregar los documentos mencionados es: ', ['class' => 'form-label']) !!}
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                    {!! Form::date('70no10', null, ['class' => 'form-control', 'required']) !!}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>  
                                
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisoAuditoria" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisoAuditoria" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso se auditoria  --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Dicatamen  --}}
                <div style="display: none" id="body-71" name="body-dictamen">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_dictamen']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('71no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('71no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('71no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('71no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('71no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('71no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('71no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('71no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('71no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('71no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('71no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('71no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('71no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('71no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('71no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('71no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('71no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('71no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('71no10', '10. Informamos a usted el resultado de la Auditoría al proyecto realizada el día', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('71no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group" id="div11">
                            {!! Form::label('71no', 'Documentos auditados:', ['class' => 'form-label']) !!}

                            <div id="wrapper_dictamen">

                                <div class="dictameninpust p-2 rounded border">

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('71no11', '11. Carpeta regulatoria', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('71no11', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('71no12', '12. Documentos fuente', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('71no12', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('71no13', '13. Número', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                {!! Form::text('71no13', null, ['class' => 'form-control', 'placeholder' => 'Número documento fuente', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('71no14', '14. Verificación telefónica', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('71no14', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group" id="div11">
                            {!! Form::label('71no11', '11. Como resultado de la Auditoría, este Comité concluye que:', ['class' => 'form-label']) !!}

                            <div id="wrapper_dictamen">

                                <div class="dictameninpust p-2 rounded border">

                                    <div class="row">
                                        <div class="col form-group">
                                            {{-- {!! Form::label('71no11', '', ['class' => 'form-label']) !!} --}}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('71no11', [ 'No se encontraron transgresiones éticas durante el desarrollo de la investigación' => 'No se encontraron transgresiones éticas durante el desarrollo de la investigación', 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.' => 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdictamen" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdictamen" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Dicatamen  --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Dictamen CEI  --}}
                <div style="display: none" id="body-72" name="body-dictamenCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_dictamenCEI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('72no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('72no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('72no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('72no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('72no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('72no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('72no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('72no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('72no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('72no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('72no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('72no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('72no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('72no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('72no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('72no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('72no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('72no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('72no10', '10. Informamos a usted el resultado de la Auditoría al proyecto realizada el día', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('72no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group" id="div11">
                            {!! Form::label('72no', 'Documentos auditados:', ['class' => 'form-label']) !!}

                            <div id="wrapper_dictamenCEI">

                                <div class="dictameninpustCEI p-2 rounded border">

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('72no11', '11. Carpeta regulatoria', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('72no11', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('72no12', '12. Documentos fuente', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('72no12', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('72no13', '13. Número', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                {!! Form::text('72no13', null, ['class' => 'form-control', 'placeholder' => 'Número documento fuente', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('72no14', '14. Verificación telefónica', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('72no14', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group" id="div11">
                            {!! Form::label('72no11', '11. Como resultado de la Auditoría, este Comité concluye que:', ['class' => 'form-label']) !!}

                            <div id="wrapper_dictamenCEI">

                                <div class="dictameninpustCEI p-2 rounded border">

                                    <div class="row">
                                        <div class="col form-group">
                                            {{-- {!! Form::label('72no11', '', ['class' => 'form-label']) !!} --}}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('72no11', [ 'No se encontraron transgresiones éticas durante el desarrollo de la investigación' => 'No se encontraron transgresiones éticas durante el desarrollo de la investigación', 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.' => 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdictamenCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdictamenCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Dictamen CEI  --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Dictamen CI  --}}
                <div style="display: none" id="body-73" name="body-dictamenCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_dictamenCI']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('73no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('73no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('73no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('73no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('73no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('73no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('73no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('73no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('73no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('73no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('73no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('73no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('73no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('73no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('73no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('73no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('73no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('73no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('73no10', '10. Informamos a usted el resultado de la Auditoría al proyecto realizada el día', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('73no10', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group" id="div11">
                            {!! Form::label('73no', 'Documentos auditados:', ['class' => 'form-label']) !!}

                            <div id="wrapper_dictamenCI">

                                <div class="dictameninpustCI p-2 rounded border">

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('73no11', '11. Carpeta regulatoria', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('73no11', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('73no12', '12. Documentos fuente', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('73no12', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('73no13', '13. Número', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                {!! Form::text('73no13', null, ['class' => 'form-control', 'placeholder' => 'Número documento fuente', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('73no14', '14. Verificación telefónica', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('73no14', [ 'Si' => 'Si', 'No' => 'No' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group" id="div11">
                            {!! Form::label('73no11', '11. Como resultado de la Auditoría, este Comité concluye que:', ['class' => 'form-label']) !!}

                            <div id="wrapper_dictamenCI">

                                <div class="dictameninpustCI p-2 rounded border">

                                    <div class="row">
                                        <div class="col form-group">
                                            {{-- {!! Form::label('73no11', '', ['class' => 'form-label']) !!} --}}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                {!! Form::select('73no11', [ 'No se encontraron transgresiones éticas durante el desarrollo de la investigación' => 'No se encontraron transgresiones éticas durante el desarrollo de la investigación', 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.' => 'Si se encontraron transgresiones éticas durante el desarrollo de la investigación.' ], null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCdictamenCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGdictamenCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Dictamen CI  --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Aviso de cancelacion  --}}
                <div style="display: none" id="body-74" name="body-avisoCancelacion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_avisoCancelacion']) !!}

                        <div class="form-group" id="div1">
                            {!! Form::label('74no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('74no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('74no2', '2. Título abreviado', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('74no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('74no3', '3. Nombre completo del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('74no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del investigador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div4">
                            {!! Form::label('74no4', '4. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file"></i></span>
                                {!! Form::text('74no4', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div5">
                            {!! Form::label('74no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('74no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('74no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('74no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('74no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('74no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div8">
                            {!! Form::label('74no8', '8. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('74no8', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div9">
                            {!! Form::label('74no9', '9. Apellido paterno del investigador principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('74no9', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del investigador principal', 'readonly']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCavisoCancelacion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGavisoCancelacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Aviso de cancelacion  --}}



{{-- =================================================================================================================================================================== --}} 



                {{-- Migracion --}}
                <div style="display: none" id="body-75" name="body-migracion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_migracion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('75no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('75no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <!-- TODO: Checar de donde se obtienen los datos del presidente de CE -->
                        <div class="form-group" id="div2">
                            {!! Form::label('75no2', '2. Título abreviado del presidente de CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('75no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('75no3', '3. Nombre completo del Presidente de CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('75no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del Presidente de CE', 'required']) !!}
                            </div>
                        </div>
                        
                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div4">
                            {!! Form::label('75no4', '4. Presidente del:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('75no4', null, ['class' => 'form-control', 'placeholder' => 'Presidente del (Nombre completo del comité)', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div5">
                            {!! Form::label('75no5', '5. Institución', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('75no5', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Institución', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('75no6', '6. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('75no6', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('75no7', '7. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('75no7', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('75no8', '8. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('75no8', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div9">
                            {!! Form::label('75no9', '9. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('75no9', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('75no10', '10. Investigador Principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('75no10', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del Investigador Principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div11">
                            {!! Form::label('75no11', '11. Apellido paterno del Presidente del CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('75no11', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del Presidente del CE', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('75no', '12. Con la presente, y con fines de migrar a ese Comité el estudio antes mencionado, informamos a usted su estado actual:', ['class' => 'form-label']) !!}

                            <div id="wrapper_migracion">

                                <div class="migracioninpust p-2 rounded border">

                                    {{-- {!! Form::label('75no', 'Fecha de aprobación inicial', ['class' => 'form-label']) !!} --}}
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('75no12', 'Fecha de aprobación inicial', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('75no12', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('75no13', 'Número de renovaciones anuales', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('75no13', null, ['class' => 'form-control', 'placeholder' => '# Renovaciones anuales', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('75no14', 'Desviaciones', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('75no14', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('75no15', 'SUSAR', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('75no15', null, ['class' => 'form-control', 'placeholder' => '# SUSAR', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('75no16', 'Número de reportes iniciales de EAS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('75no16', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('75no17', 'Número de reportes de seguimiento de EAS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('75no17', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="migracionCampos row">
                                        <div class="col form-group" id="div18">
                                            {!! Form::label('75no', 'Documentos sometidos y aprobados por este Comité:', ['class' => 'form-label']) !!}
                                            <div id="wrapper_migraciondoc">
                                                {!! Form::label('75no18', '', ['class' => 'form-label', 'hidden']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('75no18', null, ['class' => 'form-control','placeholder' => 'Documento', 'required']) !!}
                                                <button type="button" id="add_doc_migracion" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCmigracion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGmigracion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Migracion --}}



{{-- ===================================================================================================================================================================== --}}



                {{-- Migracion CEI --}}
                <div style="display: none" id="body-76" name="body-migracionCEI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_migracionCEI']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('76no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('76no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <!-- TODO: Checar de donde se obtienen los datos del presidente de CE -->
                        <div class="form-group" id="div2">
                            {!! Form::label('76no2', '2. Título abreviado del presidente de CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('76no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('76no3', '3. Nombre completo del Presidente de CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('76no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del Presidente de CE', 'required']) !!}
                            </div>
                        </div>
                        
                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div4">
                            {!! Form::label('76no4', '4. Presidente del:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('76no4', null, ['class' => 'form-control', 'placeholder' => 'Presidente del (Nombre completo del comité)', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div5">
                            {!! Form::label('76no5', '5. Institución', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('76no5', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Institución', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('76no6', '6. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('76no6', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('76no7', '7. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('76no7', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('76no8', '8. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('76no8', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div9">
                            {!! Form::label('76no9', '9. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('76no9', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('76no10', '10. Investigador Principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('76no10', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del Investigador Principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div11">
                            {!! Form::label('76no11', '11. Apellido paterno del Presidente del CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('76no11', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del Presidente del CE', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('76no', '12. Con la presente, y con fines de migrar a ese Comité el estudio antes mencionado, informamos a usted su estado actual:', ['class' => 'form-label']) !!}

                            <div id="wrapper_migracionCEI">

                                <div class="migracioninpustCEI p-2 rounded border">

                                    {{-- {!! Form::label('76no', 'Fecha de aprobación inicial', ['class' => 'form-label']) !!} --}}
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('76no12', 'Fecha de aprobación inicial', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('76no12', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('76no13', 'Número de renovaciones anuales', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('76no13', null, ['class' => 'form-control', 'placeholder' => '# Renovaciones anuales', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('76no14', 'Desviaciones', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('76no14', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('76no15', 'SUSAR', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('76no15', null, ['class' => 'form-control', 'placeholder' => '# SUSAR', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('76no16', 'Número de reportes iniciales de EAS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('76no16', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('76no17', 'Número de reportes de seguimiento de EAS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('76no17', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="migracionCamposCEI row">
                                        <div class="col form-group" id="div18">
                                            {!! Form::label('76no', 'Documentos sometidos y aprobados por este Comité:', ['class' => 'form-label']) !!}
                                            <div id="wrapper_migraciondocCEI">
                                                {!! Form::label('76no18', '', ['class' => 'form-label', 'hidden']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('76no18', null, ['class' => 'form-control','placeholder' => 'Documento', 'required']) !!}
                                                <button type="button" id="add_doc_migracionCEI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCmigracionCEI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGmigracionCEI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Migracion CEI --}}



{{-- ===================================================================================================================================================================== --}}



                {{-- Migracion CI --}}
                <div style="display: none" id="body-77" name="body-migracionCI">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_migracionCI']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('77no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('77no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <!-- TODO: Checar de donde se obtienen los datos del presidente de CE -->
                        <div class="form-group" id="div2">
                            {!! Form::label('77no2', '2. Título abreviado del presidente de CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                {!! Form::text('77no2', null, ['class' => 'form-control', 'placeholder' => 'Título del investigador principal','required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('77no3', '3. Nombre completo del Presidente de CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del Presidente de CE', 'required']) !!}
                            </div>
                        </div>
                        
                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div4">
                            {!! Form::label('77no4', '4. Presidente del:', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('77no4', null, ['class' => 'form-control', 'placeholder' => 'Presidente del (Nombre completo del comité)', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div5">
                            {!! Form::label('77no5', '5. Institución', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                {!! Form::text('77no5', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Institución', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div6">
                            {!! Form::label('77no6', '6. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('77no6', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('77no7', '7. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('77no7', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('77no8', '8. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no8', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        
                        </div>

                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div9">
                            {!! Form::label('77no9', '9. Domicilio sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                {!! Form::text('77no9', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div10">
                            {!! Form::label('77no10', '10. Investigador Principal', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no10', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo del Investigador Principal', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group" id="div11">
                            {!! Form::label('77no11', '11. Apellido paterno del Presidente del CE', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('77no11', null, ['class' => 'form-control', 'placeholder' => 'Apellido paterno del Presidente del CE', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('77no', '12. Con la presente, y con fines de migrar a ese Comité el estudio antes mencionado, informamos a usted su estado actual:', ['class' => 'form-label']) !!}

                            <div id="wrapper_migracionCI">

                                <div class="migracioninpustCI p-2 rounded border">

                                    {{-- {!! Form::label('77no', 'Fecha de aprobación inicial', ['class' => 'form-label']) !!} --}}
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('77no12', 'Fecha de aprobación inicial', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            {!! Form::date('77no12', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('77no13', 'Número de renovaciones anuales', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('77no13', null, ['class' => 'form-control', 'placeholder' => '# Renovaciones anuales', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('77no14', 'Desviaciones', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                            {!! Form::text('77no14', null, ['class' => 'form-control', 'placeholder' => '# Desviaciones', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('77no15', 'SUSAR', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('77no15', null, ['class' => 'form-control', 'placeholder' => '# SUSAR', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('77no16', 'Número de reportes iniciales de EAS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('77no16', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col form-group">
                                            {!! Form::label('77no17', 'Número de reportes de seguimiento de EAS', ['class' => 'form-label']) !!}
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                            {!! Form::text('77no17', null, ['class' => 'form-control', 'placeholder' => '# EAS', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="migracionCamposCI row">
                                        <div class="col form-group" id="div18">
                                            {!! Form::label('77no', 'Documentos sometidos y aprobados por este Comité:', ['class' => 'form-label']) !!}
                                            <div id="wrapper_migraciondocCI">
                                                {!! Form::label('77no18', '', ['class' => 'form-label', 'hidden']) !!}
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                                {!! Form::text('77no18', null, ['class' => 'form-control','placeholder' => 'Documento', 'required']) !!}
                                                <button type="button" id="add_doc_migracionCI" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCmigracionCI" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGmigracionCI" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Migracion CI --}}



{{-- ===================================================================================================================================================================== --}}



                {{-- contenido del paquete --}}
                <div style="display: none" id="body-78" name="body-contenidoPaquete">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_contenidoPaquete']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('78no1', '1. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('78no1', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('78no2', '2. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('78no2', null, ['class' => 'form-control', 'placeholder' => 'Título','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('78no3', '3. Investigador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('78no3', null, ['class' => 'form-control', 'placeholder' => 'Investigador', 'readonly']) !!}
                            </div>
                        </div>
                        
                        <!-- TODO: ver que onda con todos los campos de este tipo, si se auto-completa o se llena manualmente -->
                        <div class="form-group" id="div4">
                            {!! Form::label('78no4', '4. Nombre del sitio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('78no4', null, ['class' => 'form-control', 'placeholder' => 'Nombre del sitio', 'required']) !!}
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCcontenidoPaquete" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGcontenidoPaquete" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END contenido del paquete --}}



{{-- ===================================================================================================================================================================== --}}



                {{-- Archivo de concentracion --}}
                <div style="display: none" id="body-79" name="body-archivoConcentracion">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_archivoConcentracion']) !!}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('79no1', '1. Código UIS', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                {!! Form::text('79no1', null, ['class' => 'form-control', 'placeholder' => 'Código UIS', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div2">
                            {!! Form::label('79no2', '2. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('79no2', null, ['class' => 'form-control', 'placeholder' => 'Código','readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div3">
                            {!! Form::label('79no3', '3. Depurar en', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::date('79no3', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCarchivoConcentracion" onclick="borrar_campos();" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGarchivoConcentracion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- END Archivo de concentracion --}}



{{-- ===================================================================================================================================================================== --}}



                {{-- Cambio de domicilio --}}
                <div style="display: none" id="body-80" name="body-cambiodomicilio">
                    <div class="modal-body">
                        {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cambioDomicilio']) !!}
        
                        {{-- <div class="form-group" id="div1">
                            {!! Form::label('80no1', '1. Ciudad', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                {!! Form::text('80no1', null, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'readonly','required']) !!}
                            </div>
                        </div> --}}
        
                        <div class="form-group" id="div1">
                            {!! Form::label('80no1', '1. Fecha', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                {!! Form::date('80no1', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div2">
                            {!! Form::label('80no2', '2. Nombre del destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no2', null, ['class' => 'form-control', 'placeholder' => 'Nombre del destinatario', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div3">
                            {!! Form::label('80no3', '3. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no3', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div4">
                            {!! Form::label('80no4', '4. Empresa', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no4', null, ['class' => 'form-control', 'placeholder' => 'Empresa', 'required']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div5">
                            {!! Form::label('80no5', '5. Código', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no5', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) !!}
                            </div>
                        </div>
        
                        <div class="form-group" id="div6">
                            {!! Form::label('80no6', '6. Título', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-pen-square"></i></span>
                                {!! Form::text('80no6', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div7">
                            {!! Form::label('80no7', '7. Patrocinador', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                {!! Form::text('80no7', null, ['class' => 'form-control', 'placeholder' => 'Patrocinador', 'readonly']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div8">
                            {!! Form::label('80no8', '8. Título del destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"></i></i></span>
                                {!! Form::text('80no8', null, ['class' => 'form-control', 'placeholder' => 'Título abreviado del destinatario (Dr, Dra, Ing. etc.)', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div9">
                            {!! Form::label('80no9', '9. Apellido del destinatario', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no9', null, ['class' => 'form-control', 'placeholder' => 'Primer apellido del destinatario', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div10">
                            {!! Form::label('80no10', '10. Nuevo domicilio', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::textarea('80no10', null, ['class' => 'form-control', 'rows' => '4','placeholder' => 'Escribir nuevo domicilio', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div11">
                            {!! Form::label('80no11', '11. Nombre de quien notifica', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no11', null, ['class' => 'form-control', 'placeholder' => 'Dr/Dra Nombre completo de quien notifica', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="div12">
                            {!! Form::label('80no12', '12. Puesto', ['class' => 'form-label']) !!}
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                {!! Form::text('80no12', null, ['class' => 'form-control', 'placeholder' => 'Puesto de quien notifica', 'required']) !!}
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