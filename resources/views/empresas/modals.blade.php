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
                </label><br/>
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
                </label><br/>
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
                </label><br/>
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
        
        <div class="form-group">
            {!! Form::label('nombre_legal', '22. Nombre del representante legal', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_legal', null, ['class' => 'form-control', 'id' => 'nombre_legal', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('inicio_legal', '23. Fecha de inicio de representante legal', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('inicio_legal', null, ['class' => 'form-control', 'id' => 'inicio_legal']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('tarjeta_legal', '24. Se llenó tarjeta de contacto del representante legal', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('tarjeta_legal', 'Si', null, ['class' => 'mr-1', 'id' => 'tarjetasi_legal']) !!}
                    Si
                </label><br/>
                <label>
                    {!! Form::radio('tarjeta_legal', 'No', null, ['class' => 'mr-1', 'id' => 'tarjetano_legal']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fiel_legal', '25. Archivó FIEL del representante legal en forma electrónica', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('fiel_legal', 'Si', null, ['class' => 'mr-1', 'id' => 'fielsi_legal']) !!}
                    Si
                </label><br/>
                <label>
                    {!! Form::radio('fiel_legal', 'No', null, ['class' => 'mr-1', 'id' => 'fielno_legal']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fin_legal', '26. Fecha de fin de representante legal', ['class' => 'form-label']) !!}
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
        
        <div class="form-group">
            {!! Form::label('nombre_documento', '27. Nombre del documento', ['class' => 'form-label']) !!}
            {!! Form::text('nombre_documento', null, ['class' => 'form-control', 'id' => 'nombre_documento', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('revision_documento', '28. Fecha de revisión de vigencia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('revision_documento', null, ['class' => 'form-control', 'id' => 'revision_documento']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('vigencia_documento', '29. Revisó la vigencia', ['class' => 'form-label']) !!}
            {!! Form::text('vigencia_documento', null, ['class' => 'form-control', 'id' => 'vigencia_documento', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vigente_documento', '30. El documento sigue vigente', ['class' => 'form-label']) !!}
            <div>
                <label>
                    {!! Form::radio('vigente_documento', 'Si', null, ['class' => 'mr-1', 'id' => 'vigentesi_documento']) !!}
                    Si
                </label><br/>
                <label>
                    {!! Form::radio('vigente_documento', 'No', null, ['class' => 'mr-1', 'id' => 'vigenteno_documento']) !!}
                    No
                </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('verifica_documento', '34. Fecha en que verifica armonización', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('verifica_documento', null, ['class' => 'form-control', 'id' => 'verifica_documento']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('verifico_documento', '35. Verificó', ['class' => 'form-label']) !!}
            {!! Form::text('verifico_documento', null, ['class' => 'form-control', 'id' => 'verifico_documento', 'placeholder' => 'Ingrese el nombre']) !!}
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
        
        <div class="form-group">
            {!! Form::label('actividad_responsabilidad', '36. Actividad regulada', ['class' => 'form-label']) !!}
            {!! Form::text('actividad_responsabilidad', null, ['class' => 'form-control', 'id' => 'actividad_responsabilidad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('autoridad_responsabilidad', '37. Autoridad que regula y vigila', ['class' => 'form-label']) !!}
            {!! Form::text('autoridad_responsabilidad', null, ['class' => 'form-control', 'id' => 'autoridad_responsabilidad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('evidencia_responsabilidad', '38. Evidencia de autorización', ['class' => 'form-label']) !!}
            {!! Form::text('evidencia_responsabilidad', null, ['class' => 'form-control', 'id' => 'evidencia_responsabilidad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('autorizacion_responsabilidad', '39. Fecha de autorización', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('autorizacion_responsabilidad', null, ['class' => 'form-control', 'id' => 'autorizacion_responsabilidad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('vigencia_responsabilidad', '40. Vigencia de autorización', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('vigencia_responsabilidad', null, ['class' => 'form-control', 'id' => 'vigencia_responsabilidad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('cumplir_responsabilidad', '41. Responsabilidad a cumplir', ['class' => 'form-label']) !!}
            {!! Form::text('cumplir_responsabilidad', null, ['class' => 'form-control', 'id' => 'cumplir_responsabilidad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cumplimiento_responsabilidad', '42. Fecha de cumplimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('cumplimiento_responsabilidad', null, ['class' => 'form-control', 'id' => 'cumplimiento_responsabilidad']) !!}
            </div> 
        </div>

        <div class="form-group">
            {!! Form::label('evidencia2_responsabilidad', '43. Evidencia de cumplimiento', ['class' => 'form-label']) !!}
            {!! Form::text('evidencia2_responsabilidad', null, ['class' => 'form-control', 'id' => 'evidencia2_responsabilidad', 'placeholder' => 'Ingrese el nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('vigencia2_responsabilidad', '44. Vigencia de cumplimiento', ['class' => 'form-label']) !!}
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