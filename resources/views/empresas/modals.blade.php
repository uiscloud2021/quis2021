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



<!-- Modal CREAR SOCIO-->
<div class="modal fade" id="createSocioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSocioModalLabel">Nuevo socio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_socio']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_socio', null, ['id' => 'empresaid_socio']) !!}
        {!! Form::hidden('id_socio', null, ['id' => 'id_socio']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_socio', '8. Nombre del socio', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_socio', null, ['class' => 'form-control', 'id' => 'nombre_socio', 'placeholder' => 'Ingrese el nombre del socio']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('participacion_socio', '9. Participación', ['class' => 'form-label']) !!}
            {!! Form::text('participacion_socio', null, ['class' => 'form-control', 'id' => 'participacion_socio', 'placeholder' => 'Ingrese la participación del socio']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tarjeta_socio', '10. Se llenó tarjeta de contacto del socio', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('tarjeta_socio', 'Si', null, ['class' => 'mr-1', 'id' => 'tarjetasi_socio']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('tarjeta_socio', 'No', null, ['class' => 'mr-1', 'id' => 'tarjetano_socio']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('inicio_socio', '11. Fecha de inicio', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('inicio_socio', null, ['class' => 'form-control', 'id' => 'inicio_socio']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('fin_socio', '12. Fecha de fin', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('fin_socio', null, ['class' => 'form-control', 'id' => 'fin_socio']) !!}
            </div> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSocio" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR DOMICILIOS-->
<div class="modal fade" id="createDomicilioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDomicilioModalLabel">Nuevo domicilio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_domicilio']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_domicilio', null, ['id' => 'empresaid_domicilio']) !!}
        {!! Form::hidden('id_domicilio', null, ['id' => 'id_domicilio']) !!}
        
        <div class="form-group">
            {!! Form::label('direccion_domicilio', '13. Domicilio', ['class' => 'form-label']) !!}
            {!! Form::textarea('direccion_domicilio', null, ['class' => 'form-control', 'id' => 'direccion_domicilio', 'placeholder' => 'Ingrese el domicilio']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fiscal_domicilio', '14. Es el domicilio fiscal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('fiscal_domicilio', 'Si', null, ['class' => 'mr-1', 'id' => 'fiscalsi_domicilio']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('fiscal_domicilio', 'No', null, ['class' => 'mr-1', 'id' => 'fiscalno_domicilio']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('tienec_domicilio', '15. Tiene un comprobante de domicilio fiscal con su razón social', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('tienec_domicilio', 'Si', null, ['class' => 'mr-1', 'id' => 'tienecsi_domicilio']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('tienec_domicilio', 'No', null, ['class' => 'mr-1', 'id' => 'tienecno_domicilio']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('comprobante_domicilio', '16. Nombre del comprobante', ['class' => 'form-label']) !!}
            {!! Form::text('comprobante_domicilio', null, ['class' => 'form-control', 'id' => 'comprobante_domicilio', 'placeholder' => 'Ingrese el nombre del comprobante']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGDomicilio" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR REPRESENTANTE LEGAL-->
<div class="modal fade" id="createLegalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLegalModalLabel">Nuevo representante legal</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_legal']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_legal', null, ['id' => 'empresaid_legal']) !!}
        {!! Form::hidden('id_legal', null, ['id' => 'id_legal']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_legal', '33. Nombre del representante legal', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_legal', null, ['class' => 'form-control', 'id' => 'nombre_legal', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('inicio_legal', '34. Fecha de inicio de representante legal', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('inicio_legal', null, ['class' => 'form-control', 'id' => 'inicio_legal']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('tarjeta_legal', '35. Se llenó tarjeta de contacto del representante legal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('tarjeta_legal', 'Si', null, ['class' => 'mr-1', 'id' => 'tarjetasi_legal']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('tarjeta_legal', 'No', null, ['class' => 'mr-1', 'id' => 'tarjetano_legal']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fiel_legal', '36. Archivó FIEL del representante legal en forma electrónica', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('fiel_legal', 'Si', null, ['class' => 'mr-1', 'id' => 'fielsi_legal']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('fiel_legal', 'No', null, ['class' => 'mr-1', 'id' => 'fielno_legal']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fin_legal', '37. Fecha de fin de representante legal', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('fin_legal', null, ['class' => 'form-control', 'id' => 'fin_legal']) !!}
            </div> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGLegal" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR DOCUMENTOS REGULATORIOS-->
<div class="modal fade" id="createDocumentoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDocumentoModalLabel">Nuevo documento regulatorio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_documento']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_documento', null, ['id' => 'empresaid_documento']) !!}
        {!! Form::hidden('id_documento', null, ['id' => 'id_documento']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_documento', '38. Nombre del documento', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_documento', null, ['class' => 'form-control', 'id' => 'nombre_documento', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('revision_documento', '39. Fecha de revisión de vigencia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('revision_documento', null, ['class' => 'form-control', 'id' => 'revision_documento']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('vigencia_documento', '40. Revisó la vigencia', ['class' => 'form-label']) !!}
            {!! Form::text('vigencia_documento', auth()->user()->name, ['class' => 'form-control', 'id' => 'vigencia_documento', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vigente_documento', '41. El documento sigue vigente', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('vigente_documento', 'Si', null, ['class' => 'mr-1', 'id' => 'vigentesi_documento']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('vigente_documento', 'No', null, ['class' => 'mr-1', 'id' => 'vigenteno_documento']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('baja_documento', '42. Se dio de baja el documento de la página web de la empresa', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('baja_documento', 'Si', null, ['class' => 'mr-1', 'id' => 'bajasi_documento']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('baja_documento', 'No', null, ['class' => 'mr-1', 'id' => 'bajano_documento']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('sustituye_documento', '43. Nombre del documento que lo sustituye', ['class' => 'form-label']) !!}
            {!! Form::text('sustituye_documento', null, ['class' => 'form-control', 'id' => 'sustituye_documento', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('subio_documento', '44. Se subió el documento a la página web de la empresa', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('subio_documento', 'Si', null, ['class' => 'mr-1', 'id' => 'subiosi_documento']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('subio_documento', 'No', null, ['class' => 'mr-1', 'id' => 'subiono_documento']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('verifica_documento', '45. Fecha en que verifica armonización', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('verifica_documento', null, ['class' => 'form-control', 'id' => 'verifica_documento']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('verifico_documento', '46. Verificó', ['class' => 'form-label']) !!}
            {!! Form::text('verifico_documento', auth()->user()->name, ['class' => 'form-control', 'id' => 'verifico_documento', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGDocumento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR RESPONSABILIDADES REGULATORIAS-->
<div class="modal fade" id="createResponsabilidadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createResponsabilidadModalLabel">Nueva responsabilidad regulatoria</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_responsabilidad']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_responsabilidad', null, ['id' => 'empresaid_responsabilidad']) !!}
        {!! Form::hidden('id_responsabilidad', null, ['id' => 'id_responsabilidad']) !!}
        
        <div class="form-group">
            {!! Form::label('actividad_responsabilidad', '47. Actividad regulada', ['class' => 'form-label']) !!}
            {!! Form::text('actividad_responsabilidad', null, ['class' => 'form-control', 'id' => 'actividad_responsabilidad', 'placeholder' => 'Actividad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('autoridad_responsabilidad', '48. Autoridad que regula y vigila', ['class' => 'form-label']) !!}
            {!! Form::text('autoridad_responsabilidad', null, ['class' => 'form-control', 'id' => 'autoridad_responsabilidad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('evidencia_responsabilidad', '49. Evidencia de autorización', ['class' => 'form-label']) !!}
            {!! Form::text('evidencia_responsabilidad', null, ['class' => 'form-control', 'id' => 'evidencia_responsabilidad', 'placeholder' => 'Evidencia']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('autorizacion_responsabilidad', '50. Fecha de autorización', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('autorizacion_responsabilidad', null, ['class' => 'form-control', 'id' => 'autorizacion_responsabilidad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('vigencia_responsabilidad', '51. Vigencia de autorización', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('vigencia_responsabilidad', null, ['class' => 'form-control', 'id' => 'vigencia_responsabilidad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('cumplir_responsabilidad', '52. Responsabilidades a cumplir', ['class' => 'form-label']) !!}
            {!! Form::textarea('cumplir_responsabilidad', null, ['class' => 'form-control', 'id' => 'cumplir_responsabilidad', 'placeholder' => 'Responsabilidades', 'rows' => '4', 'style' => 'resize:none']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cumplimiento_responsabilidad', '53. Fecha de cumplimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('cumplimiento_responsabilidad', null, ['class' => 'form-control', 'id' => 'cumplimiento_responsabilidad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('evidencia2_responsabilidad', '54. Evidencia de cumplimiento', ['class' => 'form-label']) !!}
            {!! Form::text('evidencia2_responsabilidad', null, ['class' => 'form-control', 'id' => 'evidencia2_responsabilidad', 'placeholder' => 'Evidencia']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vigencia2_responsabilidad', '55. Vigencia de cumplimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('vigencia2_responsabilidad', null, ['class' => 'form-control', 'id' => 'vigencia2_responsabilidad']) !!}
            </div> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGResponsabilidad" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR RESPRESENTANTE SANITARIO-->
<div class="modal fade" id="createSanitarioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSanitarioModalLabel">Nuevo representante sanitario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_sanitario']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_sanitario', null, ['id' => 'empresaid_sanitario']) !!}
        {!! Form::hidden('id_sanitario', null, ['id' => 'id_sanitario']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_sanitario', '58. Nombre del representante sanitario', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_sanitario', null, ['class' => 'form-control', 'id' => 'nombre_sanitario', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('contacto_sanitario', '59. Se llenó tarjeta de contacto del representante sanitario', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('contacto_sanitario', 'Si', null, ['class' => 'mr-1', 'id' => 'contactosi_sanitario']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('contacto_sanitario', 'No', null, ['class' => 'mr-1', 'id' => 'contactono_sanitario']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fisico_sanitario', '60. Se archivó copia de aviso de representante sanitario en expediente físico', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('fisico_sanitario', 'Si', null, ['class' => 'mr-1', 'id' => 'fisicosi_sanitario']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('fisico_sanitario', 'No', null, ['class' => 'mr-1', 'id' => 'fisicono_sanitario']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('electronico_sanitario', '61. Se archivó copia de aviso de representante sanitario en expediente electrónico', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('electronico_sanitario', 'Si', null, ['class' => 'mr-1', 'id' => 'electronicosi_sanitario']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('electronico_sanitario', 'No', null, ['class' => 'mr-1', 'id' => 'electronicono_sanitario']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('cedula_sanitario', '62. Cédula profesional del representante sanitario', ['class' => 'form-label']) !!}
            {!! Form::text('cedula_sanitario', null, ['class' => 'form-control', 'id' => 'cedula_sanitario', 'placeholder' => 'Ingrese la cédula']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('verificocedula_sanitario', '63. Se verificó la cédula profesional', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('verificocedula_sanitario', 'Si', null, ['class' => 'mr-1', 'id' => 'verificocedulasi_sanitario']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('verificocedula_sanitario', 'No', null, ['class' => 'mr-1', 'id' => 'verificocedulano_sanitario']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('copiacedula_sanitario', '64. Se archivó copia electrónica de verificación', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('copiacedula_sanitario', 'Si', null, ['class' => 'mr-1', 'id' => 'copiacedulasi_sanitario']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('copiacedula_sanitario', 'No', null, ['class' => 'mr-1', 'id' => 'copiacedulano_sanitario']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('inicio_sanitario', '65. Fecha de inicio de representante sanitario', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('inicio_sanitario', null, ['class' => 'form-control', 'id' => 'inicio_sanitario']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('fin_sanitario', '66. Fecha de fin de representante sanitario', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('fin_sanitario', null, ['class' => 'form-control', 'id' => 'fin_sanitario']) !!}
            </div> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSanitario" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR CUENTAS BANCARIAS-->
<div class="modal fade" id="createCuentaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCuentaModalLabel">Nueva cuenta bancaria</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cuenta']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_cuenta', null, ['id' => 'empresaid_cuenta']) !!}
        {!! Form::hidden('id_cuenta', null, ['id' => 'id_cuenta']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_cuenta', '67. Nombre del banco', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_cuenta', null, ['class' => 'form-control', 'id' => 'nombre_cuenta', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sucursal_cuenta', '68. Sucursal y cuenta', ['class' => 'form-label']) !!}
            {!! Form::text('sucursal_cuenta', null, ['class' => 'form-control', 'id' => 'sucursal_cuenta', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('direccion_cuenta', '69. Dirección del banco', ['class' => 'form-label']) !!}
            {!! Form::textarea('direccion_cuenta', null, ['class' => 'form-control', 'id' => 'direccion_cuenta', 'placeholder' => 'Dirección', 'rows' => '4', 'style' => 'resize:none']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('ciudad_cuenta', '70. Ciudad y código del banco', ['class' => 'form-label']) !!}
            {!! Form::text('ciudad_cuenta', null, ['class' => 'form-control', 'id' => 'ciudad_cuenta', 'placeholder' => 'Ciudad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('clabe_cuenta', '71. CLABE para transferencias electrónicas', ['class' => 'form-label']) !!}
            {!! Form::text('clabe_cuenta', null, ['class' => 'form-control', 'id' => 'clabe_cuenta', 'placeholder' => 'CLABE']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('swift_cuenta', '72. Número swift', ['class' => 'form-label']) !!}
            {!! Form::text('swift_cuenta', null, ['class' => 'form-control', 'id' => 'swift_cuenta', 'placeholder' => 'Swift']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('moneda_cuenta', '73. Moneda', ['class' => 'form-label']) !!}
            {!! Form::text('moneda_cuenta', null, ['class' => 'form-control', 'id' => 'moneda_cuenta', 'placeholder' => 'Moneda']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('activa_cuenta', '74. Activa', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('activa_cuenta', 'Si', null, ['class' => 'mr-1', 'id' => 'activasi_cuenta']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('activa_cuenta', 'No', null, ['class' => 'mr-1', 'id' => 'activano_cuenta']) !!}
                    No
                </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCuenta" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR PROPIEDAD INTELECTUAL-->
<div class="modal fade" id="createPropiedadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPropiedadModalLabel">Nueva propiedad</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_propiedad']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_propiedad', null, ['id' => 'empresaid_propiedad']) !!}
        {!! Form::hidden('id_propiedad', null, ['id' => 'id_propiedad']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_propiedad', '75. Nombre de la propiedad intelectual', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_propiedad', null, ['class' => 'form-control', 'id' => 'nombre_propiedad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('registro_propiedad', '76. Tipo de registro', ['class' => 'form-label']) !!}
            {!! Form::select('registro_propiedad', ['Derecho de autor' => 'Derecho de autor','Patente' => 'Patente','Diseño industrial' => 'Diseño industrial','Marca de fábrica' => 'Marca de fábrica','Marca de servicio' => 'Marca de servicio','Esquema de circuitos integrados' => 'Esquema de circuitos integrados','Nombre comercial' => 'Nombre comercial'], null, ['class' => 'form-control', 'id' => 'registro_propiedad', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('descripcion_propiedad', '77. Descripción de la propiedad', ['class' => 'form-label']) !!}
            {!! Form::textarea('descripcion_propiedad', null, ['class' => 'form-control', 'id' => 'descripcion_propiedad', 'placeholder' => 'Descripción', 'rows' => '4', 'style' => 'resize:none']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('utilidad_propiedad', '78. Utilidad o aplicación', ['class' => 'form-label']) !!}
            {!! Form::text('utilidad_propiedad', null, ['class' => 'form-control', 'id' => 'utilidad_propiedad', 'placeholder' => 'Utilidad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('inicio_propiedad', '79. Fecha de inicio de uso', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('inicio_propiedad', null, ['class' => 'form-control', 'id' => 'inicio_propiedad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('numero_propiedad', '80. Número de registro', ['class' => 'form-label']) !!}
            {!! Form::text('numero_propiedad', null, ['class' => 'form-control', 'id' => 'numero_propiedad', 'placeholder' => '# Registro']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fechareg_propiedad', '81. Fecha de registro', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('fechareg_propiedad', null, ['class' => 'form-control', 'id' => 'fechareg_propiedad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('vencimiento_propiedad', '82. Fecha vencimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('vencimiento_propiedad', null, ['class' => 'form-control', 'id' => 'vencimiento_propiedad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('autor_propiedad', '83. Autor', ['class' => 'form-label']) !!}
            {!! Form::text('autor_propiedad', null, ['class' => 'form-control', 'id' => 'autor_propiedad', 'placeholder' => 'Autor']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('porcentaje_propiedad', '84. Porcentaje', ['class' => 'form-label']) !!}
            {!! Form::text('porcentaje_propiedad', null, ['class' => 'form-control', 'id' => 'porcentaje_propiedad', 'placeholder' => '%']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('archivo_propiedad', '85. Se archivó registro', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('archivo_propiedad', 'Si', null, ['class' => 'mr-1', 'id' => 'archivosi_propiedad']) !!}
                    Si
                </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    {!! Form::radio('archivo_propiedad', 'No', null, ['class' => 'mr-1', 'id' => 'archivono_propiedad']) !!}
                    No
                </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPropiedad" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>



<!-- Modal CREAR VINCULACION-->
<div class="modal fade" id="createVinculacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVinculacionModalLabel">Nueva vinculación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_vinculacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_vinculacion', null, ['id' => 'empresaid_vinculacion']) !!}
        {!! Form::hidden('id_vinculacion', null, ['id' => 'id_vinculacion']) !!}
        
        <div class="form-group">
            {!! Form::label('nombre_vinculacion', '86. Nombre de la Institución que vincula', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_vinculacion', null, ['class' => 'form-control', 'id' => 'nombre_vinculacion', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('firma_vinculacion', '87. Fecha de firma de la vinculación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('firma_vinculacion', null, ['class' => 'form-control', 'id' => 'firma_vinculacion']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('vigencia_vinculacion', '88. Vigencia de la vinculación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('vigencia_vinculacion', null, ['class' => 'form-control', 'id' => 'vigencia_vinculacion']) !!}
            </div> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVinculacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>













<!-- Modal ELIMINAR ARCHIVO-->
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
        ¿Desea eliminar el archivo?
        {!! Form::open(['id' => 'form_delete', 'method' => 'DELETE']) !!}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" id="btnEliminar" data-bs-toggle="modal" data-bs-target="#confirmModal" name="btnEliminar" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal CREAR CARPETA-->
<div class="modal fade" id="createFolderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFolderModalLabel">Crear carpeta</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method' => 'POST', 'id'=>'formcreate_folder']) !!}
      <div class="modal-body">
        
        <div class="form-group">
            {!! Form::label('name_addc', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('name_addc', null, ['class' => 'form-control', 'id'=>'addfolder_name', 'placeholder' => 'Ingrese el nombre de la carpeta']) !!}
        </div>

        <div class="form-group">
            {!! Form::hidden('nivel_addc', null, ['class' => 'form-control', 'id'=>'nivelfolder_id', 'readonly']) !!}
            {!! Form::hidden('url_addc', null, ['class' => 'form-control', 'id'=>'addfolder_url', 'readonly']) !!}
            {!! Form::hidden('category_id_addc', null, ['class' => 'form-control', 'id'=>'categoryfolder_id', 'readonly']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnSubirFolder" class="btn btn-primary">Crear</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>






<!-- Modal EDITAR CARPETA-->
<div class="modal fade" id="editFolderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editFolderModalLabel">Editar carpeta</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['method' => 'POST', 'id'=>'formedit_folder']) !!}
      <div class="modal-body">
        <div class="form-group">
            {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'editfolder_id']) !!}
            
            {!! Form::label('name_editc', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('name_editc', null, ['class' => 'form-control', 'id'=>'editfolder_name', 'placeholder' => 'Ingrese el nombre de la carpeta']) !!}
        </div>

        <div class="form-group">
            {!! Form::hidden('nivel_editc', null, ['class' => 'form-control', 'id'=>'nivelfolderedit_id', 'readonly']) !!}
            {!! Form::hidden('category_id_editc', null, ['class' => 'form-control', 'id'=>'categoryfolderedit_id', 'readonly']) !!}
            
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnEditFolder" class="btn btn-primary">Actualizar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>