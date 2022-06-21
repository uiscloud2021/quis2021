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


<!-- Modal CREAR OCUPACION-->
<div class="modal fade" id="createOcupacionInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createOcupacionInModalLabel">Nueva ocupación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_ocupacionin']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_ocupacionin', null, ['id' => 'empresaid_ocupacionin']) !!}
        {!! Form::hidden('proyectoid_ocupacionin', null, ['id' => 'proyectoid_ocupacionin']) !!}
        {!! Form::hidden('integracionid_ocupacionin', null, ['id' => 'integracionid_ocupacionin']) !!}
        {!! Form::hidden('id_ocupacionin', null, ['id' => 'id_ocupacionin']) !!}
        
        <div class="form-group" id="divi11">
            {!! Form::label('i11', '11. Puesto actual', ['class' => 'form-label']) !!}
            {!! Form::text('i11', null, ['class' => 'form-control', 'id' => 'i11', 'placeholder' => 'Ingrese puesto']) !!}
        </div>

        <div class="form-group" id="divi12">
            {!! Form::label('i12', '12. Institución', ['class' => 'form-label']) !!}
            {!! Form::text('i12', null, ['class' => 'form-control', 'id' => 'i12', 'placeholder' => 'Ingrese institución']) !!}
        </div>

        <div class="form-group" id="divi13">
            {!! Form::label('i13', '13. Área', ['class' => 'form-label']) !!}
            {!! Form::text('i13', null, ['class' => 'form-control', 'id' => 'i13', 'placeholder' => 'Ingrese área']) !!}
        </div>

        <div class="form-group" id="divi14">
            {!! Form::label('i14', '14. Desde ', ['class' => 'form-label']) !!}
            {!! Form::text('i14', null, ['class' => 'form-control', 'id' => 'i14', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGOcupacionIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR HISTORIA-->
<div class="modal fade" id="createHistoriaInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createHistoriaInModalLabel">Nueva historia académica</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_historiain']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_historiain', null, ['id' => 'empresaid_historiain']) !!}
        {!! Form::hidden('proyectoid_historiain', null, ['id' => 'proyectoid_historiain']) !!}
        {!! Form::hidden('integracionid_historiain', null, ['id' => 'integracionid_historiain']) !!}
        {!! Form::hidden('id_historiain', null, ['id' => 'id_historiain']) !!}
        
        <div class="form-group" id="divi15">
            {!! Form::label('i15', '15. Institución', ['class' => 'form-label']) !!}
            {!! Form::text('i15', null, ['class' => 'form-control', 'id' => 'i15', 'placeholder' => 'Ingrese institución']) !!}
        </div>

        <div class="form-group" id="divi16">
            {!! Form::label('i16', '16. Grado', ['class' => 'form-label']) !!}
            {!! Form::text('i16', null, ['class' => 'form-control', 'id' => 'i16', 'placeholder' => 'Ingrese grado']) !!}
        </div>
        
        <div class="form-group" id="divi17">
            {!! Form::label('i17', '17. Fecha de titulación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i17', null, ['class' => 'form-control', 'id' => 'i17']) !!}
            </div>
        </div>

        <div class="form-group" id="divi18">
            {!! Form::label('i18', '18. Cédula profesional', ['class' => 'form-label']) !!}
            {!! Form::text('i18', null, ['class' => 'form-control', 'id' => 'i18', 'placeholder' => 'Ingrese cédula']) !!}
        </div>

        <div class="form-group" id="divi19">
            {!! Form::label('i19', '19. Escolaridad', ['class' => 'form-label']) !!}
            {!! Form::select('i19', ['Media superior' => 'Media superior', 'Técnica' => 'Técnica', 'Licenciatura' => 'Licenciatura', 'Especialidad' => 'Especialidad', 'Maestría' => 'Maestría', 'Doctorado' => 'Doctorado', 'Post Doctorado' => 'Post Doctorado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i19']) !!}
        </div>

        <div class="form-group" id="divi20">
            {!! Form::label('i20', '20. Título', ['class' => 'form-label']) !!}
            {!! Form::text('i20', null, ['class' => 'form-control', 'id' => 'i20', 'placeholder' => 'Ingrese título']) !!}
        </div>

        <div class="form-group" id="divi21">
            {!! Form::label('i21', '21. Título abreviado', ['class' => 'form-label']) !!}
            {!! Form::text('i21', null, ['class' => 'form-control', 'id' => 'i21', 'placeholder' => 'Ingrese título']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGHistoriaIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CARGO-->
<div class="modal fade" id="createCargoInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCargoInModalLabel">Nuevo cargo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cargoin']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_cargoin', null, ['id' => 'empresaid_cargoin']) !!}
        {!! Form::hidden('proyectoid_cargoin', null, ['id' => 'proyectoid_cargoin']) !!}
        {!! Form::hidden('integracionid_cargoin', null, ['id' => 'integracionid_cargoin']) !!}
        {!! Form::hidden('id_cargoin', null, ['id' => 'id_cargoin']) !!}
        
        <div class="form-group" id="divi26">
            {!! Form::label('i26', '26. Cargo', ['class' => 'form-label']) !!}
            {!! Form::text('i26', null, ['class' => 'form-control', 'id' => 'i26', 'placeholder' => 'Ingrese cargo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCargoIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR QUIS-->
<div class="modal fade" id="createQUISInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createQUISInModalLabel">Nueva capacitación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_quisin']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_quisin', null, ['id' => 'empresaid_quisin']) !!}
        {!! Form::hidden('proyectoid_quisin', null, ['id' => 'proyectoid_quisin']) !!}
        {!! Form::hidden('integracionid_quisin', null, ['id' => 'integracionid_quisin']) !!}
        {!! Form::hidden('id_quisin', null, ['id' => 'id_quisin']) !!}
        
        <div class="form-group" id="divi37">
            {!! Form::label('i37', '37. Fecha de capacitación en QUIS', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i37', null, ['class' => 'form-control', 'id' => 'i37']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGQUISIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CE-->
<div class="modal fade" id="createCEInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCEInModalLabel">Nueva capacitación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cein']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_cein', null, ['id' => 'empresaid_cein']) !!}
        {!! Form::hidden('proyectoid_cein', null, ['id' => 'proyectoid_cein']) !!}
        {!! Form::hidden('integracionid_cein', null, ['id' => 'integracionid_cein']) !!}
        {!! Form::hidden('id_cein', null, ['id' => 'id_cein']) !!}
        
        <div class="form-group" id="divi38">
            {!! Form::label('i38', '38. Fecha de capacitación en CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i38', null, ['class' => 'form-control', 'id' => 'i38']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCEIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PCCE-->
<div class="modal fade" id="createPCCEInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPCCEInModalLabel">Nueva capacitación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pccein']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_pccein', null, ['id' => 'empresaid_pccein']) !!}
        {!! Form::hidden('proyectoid_pccein', null, ['id' => 'proyectoid_pccein']) !!}
        {!! Form::hidden('integracionid_pccein', null, ['id' => 'integracionid_pccein']) !!}
        {!! Form::hidden('id_pccein', null, ['id' => 'id_pccein']) !!}
        
        <div class="form-group" id="divi39">
            {!! Form::label('i39', '39. Fecha de capacitación en PC-CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i39', null, ['class' => 'form-control', 'id' => 'i39']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPCCEIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR OTRA-->
<div class="modal fade" id="createOtraInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createOtraInModalLabel">Nueva capacitación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_otrain']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_otrain', null, ['id' => 'empresaid_otrain']) !!}
        {!! Form::hidden('proyectoid_otrain', null, ['id' => 'proyectoid_otrain']) !!}
        {!! Form::hidden('integracionid_otrain', null, ['id' => 'integracionid_otrain']) !!}
        {!! Form::hidden('id_otrain', null, ['id' => 'id_otrain']) !!}
        
        <div class="form-group" id="divi40">
            {!! Form::label('i40', '40. Nombre de otra capacitación', ['class' => 'form-label']) !!}
            {!! Form::text('i40', null, ['class' => 'form-control', 'id' => 'i40', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divi41">
            {!! Form::label('i41', '41. Fecha de otra capacitación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i41', null, ['class' => 'form-control', 'id' => 'i41']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGOtraIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR COMITE-->
<div class="modal fade" id="createComiteInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createComiteInModalLabel">Nuevo comité</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_comitein']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_comitein', null, ['id' => 'empresaid_comitein']) !!}
        {!! Form::hidden('proyectoid_comitein', null, ['id' => 'proyectoid_comitein']) !!}
        {!! Form::hidden('integracionid_comitein', null, ['id' => 'integracionid_comitein']) !!}
        {!! Form::hidden('id_comitein', null, ['id' => 'id_comitein']) !!}
        
        <div class="form-group" id="divi42">
            {!! Form::label('i42', '1. Nombre del comité', ['class' => 'form-label']) !!}
            {!! Form::select('i42', ['Comité de Ética en Investigación (CE)' => 'Comité de Ética en Investigación (CE)', 'Comité de Investigación (CI)' => 'Comité de Investigación (CI)'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i42', 'onchange' => 'CargarCEIn(this.value)']) !!}
        </div>

        <div class="form-group" id="divi43">
            {!! Form::label('i43', '2. Periodo', ['class' => 'form-label']) !!}
            {!! Form::text('i43', null, ['class' => 'form-control', 'id' => 'i43', 'placeholder' => 'Ingrese periodo']) !!}
        </div>

        <div class="form-group" id="divi44">
            {!! Form::label('i44', '3. Fecha de inicio', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i44', null, ['class' => 'form-control', 'id' => 'i44']) !!}
            </div>
        </div>

        <div class="form-group" id="divi45">
            {!! Form::label('i45', '4. Fecha de fin', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i45', null, ['class' => 'form-control', 'id' => 'i45']) !!}
            </div>
        </div>

        <div class="form-group" id="divi46">
            {!! Form::label('i46', '5. Fecha del Acta de instalación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i46', null, ['class' => 'form-control', 'id' => 'i46']) !!}
            </div>
        </div>

        <div class="form-group" id="divi47" style="display:none">
            {!! Form::label('i47', '6. Participan al menos 5 miembros con formación y género diverso', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i47', 'Si', null, ['class' => 'mr-1', 'id' => 'i47_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i47', 'No', null, ['class' => 'mr-1', 'id' => 'i47_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi48" style="display:none">
            {!! Form::label('i48', '7. Participa al menos 1 no científico', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i48', 'Si', null, ['class' => 'mr-1', 'id' => 'i48_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i48', 'No', null, ['class' => 'mr-1', 'id' => 'i48_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi49" style="display:none">
            {!! Form::label('i49', '8. Participa al menos 1 no afiliado a la UIS', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i49', 'Si', null, ['class' => 'mr-1', 'id' => 'i49_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i49', 'No', null, ['class' => 'mr-1', 'id' => 'i49_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi50" style="display:none">
            {!! Form::label('i50', '9. Participan al menos 2 con formación en metodología', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i50', 'Si', null, ['class' => 'mr-1', 'id' => 'i50_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i50', 'No', null, ['class' => 'mr-1', 'id' => 'i50_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi51" style="display:none">
            {!! Form::label('i51', '10. Participa al menos 1 con formación en estadística', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i51', 'Si', null, ['class' => 'mr-1', 'id' => 'i51_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i51', 'No', null, ['class' => 'mr-1', 'id' => 'i51_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi52">
            {!! Form::label('i52', '11. Presidente', ['class' => 'form-label']) !!}
            {!! Form::select('i52', $miembros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i52']) !!}
        </div>

        <div class="form-group" id="divi53">
            {!! Form::label('i53', '12. Secretario', ['class' => 'form-label']) !!}
            {!! Form::select('i53', $miembros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i53']) !!}
        </div>

        <div class="form-group" id="divi54">
            {!! Form::label('i54', '13. Fecha de firma de Delegación de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i54', null, ['class' => 'form-control', 'id' => 'i54']) !!}
            </div>
        </div>

        <div class="form-group" id="divi55">
            {!! Form::label('i55', '14. Miembro', ['class' => 'form-label']) !!}
            {!! Form::select('i55', $miembros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i55']) !!}
        </div>

        @for ($b = 56; $b <= 84; $b++)
          <div class="form-group" id="divi{{$b}}" style="display:none">
            {!! Form::label('i'.$b, '14. Miembro', ['class' => 'form-label']) !!}
            {!! Form::select('i'.$b, $miembros, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i'.$b]) !!}
          </div>
        @endfor
        <br/>
        <button type="button" onclick="AMiembroIn();" id="btn_miembroin" class="btn btn-info">Agregar miembro</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGComiteIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR REGISTRO-->
<div class="modal fade" id="createRegistroInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRegistroInModalLabel">Nuevo registro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_registroin']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_registroin', null, ['id' => 'empresaid_registroin']) !!}
        {!! Form::hidden('proyectoid_registroin', null, ['id' => 'proyectoid_registroin']) !!}
        {!! Form::hidden('integracionid_registroin', null, ['id' => 'integracionid_registroin']) !!}
        {!! Form::hidden('id_registroin', null, ['id' => 'id_registroin']) !!}
        
        <div class="form-group" id="divi85">
            {!! Form::label('i85', '1. Nombre del comité', ['class' => 'form-label']) !!}
            {!! Form::select('i85', ['Comité de Ética en Investigación (CE)' => 'Comité de Ética en Investigación (CE)', 'Comité de Investigación (CI)' => 'Comité de Investigación (CI)'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i85']) !!}
        </div>

        <div class="form-group" id="divi86">
            {!! Form::label('i86', '2. Periodo', ['class' => 'form-label']) !!}
            {!! Form::select('i86', $periodos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i86']) !!}
        </div>

        <div class="form-group" id="divi87">
            {!! Form::label('i87', '3. Fecha de registro ante COFEPRIS', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i87', null, ['class' => 'form-control', 'id' => 'i87']) !!}
            </div>
        </div>

        <div class="form-group" id="divi88">
            {!! Form::label('i88', '4. Número de registro ante COFEPRIS', ['class' => 'form-label']) !!}
            {!! Form::text('i88', null, ['class' => 'form-control', 'id' => 'i88', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="divi89">
            {!! Form::label('i89', '5. Vigencia del registro ante COFEPRIS', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i89', null, ['class' => 'form-control', 'id' => 'i89']) !!}
            </div>
        </div>

        <div class="form-group" id="divi90">
            {!! Form::label('i90', '6. Fecha de registro ante CONBIOÉTICA', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i90', null, ['class' => 'form-control', 'id' => 'i90']) !!}
            </div>
        </div>

        <div class="form-group" id="divi91">
            {!! Form::label('i91', '7. Número de registro ante CONBIOÉTICA', ['class' => 'form-label']) !!}
            {!! Form::text('i91', null, ['class' => 'form-control', 'id' => 'i91', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="divi92">
            {!! Form::label('i92', '8. Vigencia del registro ante CONBIOÉTICA', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i92', null, ['class' => 'form-control', 'id' => 'i92']) !!}
            </div>
        </div>

        <div class="form-group" id="divi93">
            {!! Form::label('i93', '9. Colocó una copia del Registro del CE ante CONBIOÉTICA en un lugar visible de la empresa', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i93', 'Si', null, ['class' => 'mr-1', 'id' => 'i93_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i93', 'No', null, ['class' => 'mr-1', 'id' => 'i93_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi94">
            {!! Form::label('i94', '10. Colocó un señalamiento con el Objeto y las funciones del CE en un lugar visible de la empresa', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i94', 'Si', null, ['class' => 'mr-1', 'id' => 'i94_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i94', 'No', null, ['class' => 'mr-1', 'id' => 'i94_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi95">
            {!! Form::label('i95', '11. Fecha de registro ante OHRP', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i95', null, ['class' => 'form-control', 'id' => 'i95']) !!}
            </div>
        </div>

        <div class="form-group" id="divi96">
            {!! Form::label('i96', '12. Número de registro ante OHRP', ['class' => 'form-label']) !!}
            {!! Form::text('i96', null, ['class' => 'form-control', 'id' => 'i96', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="divi97">
            {!! Form::label('i97', '13. Vigencia del registro ante OHRP', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i97', null, ['class' => 'form-control', 'id' => 'i97']) !!}
            </div>
        </div>

        <div class="form-group" id="divi98">
            {!! Form::label('i98', '14. Actualizó la información relacionada al comité en la página web de la empresa', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i98', 'Si', null, ['class' => 'mr-1', 'id' => 'i98_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i98', 'No', null, ['class' => 'mr-1', 'id' => 'i98_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRegistroIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR RENOVACION-->
<div class="modal fade" id="createRenovacionInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRenovacionInModalLabel">Nuevo renovación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionin']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_renovacionin', null, ['id' => 'empresaid_renovacionin']) !!}
        {!! Form::hidden('proyectoid_renovacionin', null, ['id' => 'proyectoid_renovacionin']) !!}
        {!! Form::hidden('integracionid_renovacionin', null, ['id' => 'integracionid_renovacionin']) !!}
        {!! Form::hidden('id_renovacionin', null, ['id' => 'id_renovacionin']) !!}
        
        <div class="form-group" id="divi99">
            {!! Form::label('i99', '15. Nombre del comité', ['class' => 'form-label']) !!}
            {!! Form::select('i99', ['Comité de Ética en Investigación (CE)' => 'Comité de Ética en Investigación (CE)', 'Comité de Investigación (CI)' => 'Comité de Investigación (CI)'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i99']) !!}
        </div>

        <div class="form-group" id="divi100">
            {!! Form::label('i100', '16. Fecha de renovación de registro', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i100', null, ['class' => 'form-control', 'id' => 'i100']) !!}
            </div>
        </div>

        <div class="form-group" id="divi101">
            {!! Form::label('i101', '17. Registro que se renueva', ['class' => 'form-label']) !!}
            {!! Form::select('i101', ['COFEPRIS' => 'COFEPRIS', 'CONBIOÉTICA' => 'CONBIOÉTICA', 'OHRP' => 'OHRP'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'i101']) !!}
        </div>

        <div class="form-group" id="divi102">
            {!! Form::label('i102', '18. Vigencia del registro', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i102', null, ['class' => 'form-control', 'id' => 'i102']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRenovacionIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR ACTUALIZACION-->
<div class="modal fade" id="createActualizacionInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createActualizacionInModalLabel">Nuevo actualización</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_actualizacionin']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_actualizacionin', null, ['id' => 'empresaid_actualizacionin']) !!}
        {!! Form::hidden('proyectoid_actualizacionin', null, ['id' => 'proyectoid_actualizacionin']) !!}
        {!! Form::hidden('integracionid_actualizacionin', null, ['id' => 'integracionid_actualizacionin']) !!}
        {!! Form::hidden('id_actualizacionin', null, ['id' => 'id_actualizacionin']) !!}
        
        <div class="form-group" id="divi103">
            {!! Form::label('i103', '1. Fecha de actualización regulatoria', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i103', null, ['class' => 'form-control', 'id' => 'i103']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('idoc', 'Nombre del documento revisado', ['class' => 'form-label']) !!}
        </div>

        <div class="form-group" id="divi104">
            {!! Form::label('i104', 'Guía Nacional para Comités de Ética en Investigación', ['class' => 'form-label']) !!}
            {!! Form::label('i104', '2. Fecha de la versión vigente', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i104', null, ['class' => 'form-control', 'id' => 'i104']) !!}
            </div>
        </div>

        <div class="form-group" id="divi105">
            {!! Form::label('i105', 'NOM-012-SSA3-2012 Investigación en seres humanos', ['class' => 'form-label']) !!}
            {!! Form::label('i105', '3. Fecha de la versión vigente', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i105', null, ['class' => 'form-control', 'id' => 'i105']) !!}
            </div>
        </div>

        <div class="form-group" id="divi106">
            {!! Form::label('i106', 'Declaración de Helsinki', ['class' => 'form-label']) !!}
            {!! Form::label('i106', '4. Fecha de la versión vigente', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i106', null, ['class' => 'form-control', 'id' => 'i106']) !!}
            </div>
        </div>

        <div class="form-group" id="divi107">
            {!! Form::label('i107', 'Reglamento de la Ley General de Salud en materia de investigación para la salud', ['class' => 'form-label']) !!}
            {!! Form::label('i107', '5. Fecha de la versión vigente', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i107', null, ['class' => 'form-control', 'id' => 'i107']) !!}
            </div>
        </div>

        <div class="form-group" id="divi108">
            {!! Form::label('i108', '6. Existen cambios relacionados al QUIS-CE', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i108', 'Si', null, ['class' => 'mr-1', 'id' => 'i108_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i108', 'No', null, ['class' => 'mr-1', 'id' => 'i108_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divi109">
            {!! Form::label('i109', '7. Fecha en que se realizan los cambios relacionados al QUIS-CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i109', null, ['class' => 'form-control', 'id' => 'i109']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGActualizacionIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR INFORME-->
<div class="modal fade" id="createInformeInModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createInformeInModalLabel">Nuevo informe</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_informein']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_informein', null, ['id' => 'empresaid_informein']) !!}
        {!! Form::hidden('proyectoid_informein', null, ['id' => 'proyectoid_informein']) !!}
        {!! Form::hidden('integracionid_informein', null, ['id' => 'integracionid_informein']) !!}
        {!! Form::hidden('id_informein', null, ['id' => 'id_informein']) !!}
        
        <div class="form-group" id="divi110">
            {!! Form::label('i110', '8. Fecha de informe anual', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('i110', null, ['class' => 'form-control', 'id' => 'i110']) !!}
            </div>
        </div>

        <div class="form-group" id="divi111">
            {!! Form::label('i111', '9. Entregó copia del informe anual a la CONBIOÉTICA', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('i111', 'Si', null, ['class' => 'mr-1', 'id' => 'i111_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('i111', 'No', null, ['class' => 'mr-1', 'id' => 'i111_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGInformeIn" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
