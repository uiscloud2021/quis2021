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



<!-- Modal CREAR FARMACISTA-->
<div class="modal fade" id="createFarmacistaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFarmacistaModalLabel">Nuevo farmacista</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_farmacista']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_farmacista', null, ['id' => 'empresaid_farmacista']) !!}
        {!! Form::hidden('carpetaid_farmacista', null, ['id' => 'carpetaid_farmacista']) !!}
        {!! Form::hidden('id_farmacista', null, ['id' => 'id_farmacista']) !!}
        
        <div class="form-group">
            {!! Form::label('no5', '5. Nombre del Farmacista', ['class' => 'form-label']) !!}
            {!! Form::text('no5', null, ['class' => 'form-control', 'id' => 'no5', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Fecha de inicio de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no6', null, ['class' => 'form-control', 'id' => 'no6']) !!}
            </div>
        </div>

        <div class="form-group" id="div7">
            {!! Form::label('no7', 'Integrar la Carpeta de control de la Farmacia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no7', 'Si', null, ['class' => 'mr-1', 'id' => 'no7_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no7', 'No', null, ['class' => 'mr-1', 'id' => 'no7_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div8">
            {!! Form::label('no8', '8. Verificar el cumplimiento normativo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no8', 'Si', null, ['class' => 'mr-1', 'id' => 'no8_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no8', 'No', null, ['class' => 'mr-1', 'id' => 'no8_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div9">
            {!! Form::label('no9', '9. Realizar el control diario de temperatura', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no9', 'Si', null, ['class' => 'mr-1', 'id' => 'no9_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no9', 'No', null, ['class' => 'mr-1', 'id' => 'no9_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div10">
            {!! Form::label('no10', '10. Recibir, controlar y dispensar el producto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no10', 'Si', null, ['class' => 'mr-1', 'id' => 'no10_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no10', 'No', null, ['class' => 'mr-1', 'id' => 'no10_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div11">
            {!! Form::label('no11', '11. Realizar auditorías', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no11', 'Si', null, ['class' => 'mr-1', 'id' => 'no11_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no11', 'No', null, ['class' => 'mr-1', 'id' => 'no11_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div12">
            {!! Form::label('no12', '12. Atender visitas de verificación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no12', 'Si', null, ['class' => 'mr-1', 'id' => 'no12_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no12', 'No', null, ['class' => 'mr-1', 'id' => 'no12_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div13">
            {!! Form::label('no13', '13. Firma del Farmacista', ['class' => 'form-label']) !!}
            {!! Form::text('no13', null, ['class' => 'form-control', 'id' => 'no13', 'placeholder' => 'Ingrese firma']) !!}
        </div>

        <div class="form-group" id="div14">
            {!! Form::label('no14', '14. Fecha de firma de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no14', null, ['class' => 'form-control', 'id' => 'no14']) !!}
            </div>
        </div>

        <div class="form-group" id="div15">
            {!! Form::label('no15', '15. Fecha de capacitación', ['class' => 'form-label']) !!}
            {!! Form::textarea('no15', null, ['class' => 'form-control', 'id' => 'no15', 'placeholder' => 'Ingrese fechas enumeradas (dd-mmm-aaaa)']) !!}
        </div>

        <div class="form-group" id="div16">
            {!! Form::label('no16', '16. Fecha de fin de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no16', null, ['class' => 'form-control', 'id' => 'no16']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFarmacista" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CONTROL-->
<div class="modal fade" id="createControlModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createControlModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_control']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_control', null, ['id' => 'empresaid_control']) !!}
        {!! Form::hidden('carpetaid_control', null, ['id' => 'carpetaid_control']) !!}
        {!! Form::hidden('id_control', null, ['id' => 'id_control']) !!}
        
        <div class="form-group">
            {!! Form::label('no17', '17. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no17', null, ['class' => 'form-control', 'id' => 'no17']) !!}
            </div>
        </div>

        <div class="form-group" id="div18">
            {!! Form::label('no18', '18. Se identifica con FC Carpeta Farmacia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no18', 'Si', null, ['class' => 'mr-1', 'id' => 'no18_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no18', 'No', null, ['class' => 'mr-1', 'id' => 'no18_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div19">
            {!! Form::label('no19', '19. Almacena medicamentos controlados o productos de origen biológico', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no19', 'Si', null, ['class' => 'mr-1', 'id' => 'no19_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no19', 'No', null, ['class' => 'mr-1', 'id' => 'no19_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div20">
            {!! Form::label('no20', '20. FC Responsabilidades Farmacia, lleno y firmado por Responsable Sanitario y Farmacistas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no20', 'Si', null, ['class' => 'mr-1', 'id' => 'no20_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no20', 'No', null, ['class' => 'mr-1', 'id' => 'no20_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div21">
            {!! Form::label('no21', '21. Facturas o documentos que amparen la posesión legal de los medicamentos o insumos almacenados', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no21', 'Si', null, ['class' => 'mr-1', 'id' => 'no21_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no21', 'No', null, ['class' => 'mr-1', 'id' => 'no21_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div22">
            {!! Form::label('no22', '22. Órdenes de visitas de verificación sanitaria recibidas, con su acta correspondiente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no22', 'Si', null, ['class' => 'mr-1', 'id' => 'no22_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no22', 'No', null, ['class' => 'mr-1', 'id' => 'no22_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div23">
            {!! Form::label('no23', '23. Avisos de previsiones para farmacias, de compra-venta de estupefacientes y de medicamentos que requieren receta o permiso especial, con fecha y firma del Responsable Sanitario', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no23', 'Si', null, ['class' => 'mr-1', 'id' => 'no23_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no23', 'No', null, ['class' => 'mr-1', 'id' => 'no23_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGControl" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>







<!-- Modal CREAR TRAMITE-->
<div class="modal fade" id="createTramiteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTramiteModalLabel">Nuevo trámite</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_tramite']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_tramite', null, ['id' => 'empresaid_tramite']) !!}
        {!! Form::hidden('carpetaid_tramite', null, ['id' => 'carpetaid_tramite']) !!}
        {!! Form::hidden('id_tramite', null, ['id' => 'id_tramite']) !!}
        
        <div class="form-group">
            {!! Form::label('no24', '24. Nombre del trámite', ['class' => 'form-label']) !!}
            {!! Form::text('no24', null, ['class' => 'form-control', 'id' => 'no24', 'placeholder' => 'Ingrese trámite']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no25', '25. Fecha de entrada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no25', null, ['class' => 'form-control', 'id' => 'no25']) !!}
            </div>
        </div>

        <div class="form-group" id="div26">
            {!! Form::label('no26', '26. Requiere respuesta', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no26', 'Si', null, ['class' => 'mr-1', 'id' => 'no26_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no26', 'No', null, ['class' => 'mr-1', 'id' => 'no26_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no27', '27. Fecha de respuesta', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no27', null, ['class' => 'form-control', 'id' => 'no27']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGTramite" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR VERIFICACION-->
<div class="modal fade" id="createVerificacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVerificacionModalLabel">Nueva verificación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_verificacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_verificacion', null, ['id' => 'empresaid_verificacion']) !!}
        {!! Form::hidden('carpetaid_verificacion', null, ['id' => 'carpetaid_verificacion']) !!}
        {!! Form::hidden('id_verificacion', null, ['id' => 'id_verificacion']) !!}
        
        <div class="form-group">
            {!! Form::label('no28', '28. Fecha en que se recibe una visita de verificación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no28', null, ['class' => 'form-control', 'id' => 'no28']) !!}
            </div>
        </div>

        <div class="form-group" id="div29">
            {!! Form::label('no29', '29. Observaciones recibidas', ['class' => 'form-label']) !!}
            {!! Form::textarea('no29', null, ['class' => 'form-control', 'id' => 'no29', 'placeholder' => 'Ingrese observaciones enumeradas']) !!}
        </div>

        <div class="form-group" id="div30">
            {!! Form::label('no30', '30. Fechas en que se resuelven la observaciones recibidas', ['class' => 'form-label']) !!}
            {!! Form::textarea('no30', null, ['class' => 'form-control', 'id' => 'no30', 'placeholder' => 'Ingrese fechas enumeradas dependiendo de observaciones (dd-mmm-aaaa)']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVerificacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>