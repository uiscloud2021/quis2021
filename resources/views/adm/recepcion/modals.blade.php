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



<!-- Modal CREAR MENSAJE-->
<div class="modal fade" id="createMensajeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createMensajeModalLabel">Nuevo mensaje</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_mensaje']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_mensaje', null, ['id' => 'empresaid_mensaje']) !!}
        {!! Form::hidden('id_mensaje', null, ['id' => 'id_mensaje']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha del mensaje', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Destinatario', ['class' => 'form-label']) !!}
            {!! Form::text('no2', null, ['class' => 'form-control', 'id' => 'no2', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Remitente', ['class' => 'form-label']) !!}
            {!! Form::text('no3', null, ['class' => 'form-control', 'id' => 'no3', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Empresa', ['class' => 'form-label']) !!}
            {!! Form::text('no4', null, ['class' => 'form-control', 'id' => 'no4', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Teléfono', ['class' => 'form-label']) !!}
            {!! Form::text('no5', null, ['class' => 'form-control', 'id' => 'no5', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no6', '6. Mensaje', ['class' => 'form-label']) !!}
            {!! Form::textarea('no6', null, ['class' => 'form-control', 'id' => 'no6', 'placeholder' => 'Ingrese mensaje']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Requiere seguimiento', ['class' => 'form-label']) !!}
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGMensaje" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal PAQUETERIA-->
<div class="modal fade" id="createPaqueteriaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPaqueteriaModalLabel">Nuevo envío</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_paqueteria']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_paqueteria', null, ['id' => 'empresaid_paqueteria']) !!}
        {!! Form::hidden('id_paqueteria', null, ['id' => 'id_paqueteria']) !!}
        
        <div class="form-group">
            {!! Form::label('no8', '8. Fecha de salida', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no8', null, ['class' => 'form-control', 'id' => 'no8']) !!}
            </div>
        </div>

        <div class="form-group" >
            {!! Form::label('no9', '9. Nombre de la empresa', ['class' => 'form-label']) !!}
            {!! Form::text('no9', null, ['class' => 'form-control', 'id' => 'no9', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no10', '10. Teléfono', ['class' => 'form-label']) !!}
            {!! Form::text('no10', null, ['class' => 'form-control', 'id' => 'no10', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no11', '11. Número de guía', ['class' => 'form-label']) !!}
            {!! Form::text('no11', null, ['class' => 'form-control', 'id' => 'no11', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no12', '12. Destinatario', ['class' => 'form-label']) !!}
            {!! Form::text('no12', null, ['class' => 'form-control', 'id' => 'no12', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no13', '13. Contenido', ['class' => 'form-label']) !!}
            {!! Form::textarea('no13', null, ['class' => 'form-control', 'id' => 'no13', 'placeholder' => 'Ingrese contenido']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Fecha en que se verificó la entrega', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no14', null, ['class' => 'form-control', 'id' => 'no14']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPaqueteria" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>







<!-- Modal CREAR CAJA CHICA-->
<div class="modal fade" id="createCajaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCajaModalLabel">Nuevo movimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_caja']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_caja', null, ['id' => 'empresaid_caja']) !!}
        {!! Form::hidden('id_caja', null, ['id' => 'id_caja']) !!}
        
        <div class="form-group">
            {!! Form::label('no15', '15. Fecha de movimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no15', null, ['class' => 'form-control', 'id' => 'no15']) !!}
            </div>
        </div>

        <div class="form-group" >
            {!! Form::label('no16', '16. Tipo de movimiento', ['class' => 'form-label']) !!}
            {!! Form::select('no16', ['Ingreso' => 'Ingreso', 'Egreso' => 'Egreso'], null, ['class' => 'form-control', 'id' => 'no16', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no17', '17. Concepto', ['class' => 'form-label']) !!}
            {!! Form::text('no17', null, ['class' => 'form-control', 'id' => 'no17', 'placeholder' => 'Ingrese concepto']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no18', '18. Persona', ['class' => 'form-label']) !!}
            {!! Form::text('no18', null, ['class' => 'form-control', 'id' => 'no18', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no19', '19. Categoría', ['class' => 'form-label']) !!}
            {!! Form::text('no19', null, ['class' => 'form-control', 'id' => 'no19', 'placeholder' => 'Ingrese categoría']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no20', '20. Saldo', ['class' => 'form-label']) !!}
            {!! Form::number('no20', null, ['class' => 'form-control', 'id' => 'no20', 'placeholder' => 'Ingrese saldo', 'step' => '0.01']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCaja" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PROVEEDORES-->
<div class="modal fade" id="createProveedorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProveedorModalLabel">Nuevo proveedor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_proveedor']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_proveedor', null, ['id' => 'empresaid_proveedor']) !!}
        {!! Form::hidden('id_proveedor', null, ['id' => 'id_proveedor']) !!}
        
        <div class="form-group">
            {!! Form::label('no21', '21. Nombre de la empresa proveedora', ['class' => 'form-label']) !!}
            {!! Form::text('no21', null, ['class' => 'form-control', 'id' => 'no21', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no22', '22. Teléfono', ['class' => 'form-label']) !!}
            {!! Form::text('no22', null, ['class' => 'form-control', 'id' => 'no22', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no23', '23. Página web', ['class' => 'form-label']) !!}
            {!! Form::text('no23', null, ['class' => 'form-control', 'id' => 'no23', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no24', '24. Usuario', ['class' => 'form-label']) !!}
            {!! Form::text('no24', null, ['class' => 'form-control', 'id' => 'no24', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no25', '25. Contraseña', ['class' => 'form-label']) !!}
            {!! Form::text('no25', null, ['class' => 'form-control', 'id' => 'no25', 'placeholder' => 'Ingrese contraseña']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no26', '26. Otra clave', ['class' => 'form-label']) !!}
            {!! Form::text('no26', null, ['class' => 'form-control', 'id' => 'no26', 'placeholder' => 'Ingrese clave']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGProveedor" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR FACTURACION-->
<div class="modal fade" id="createFacturacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFacturacionModalLabel">Nueva factura</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_facturacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_facturacion', null, ['id' => 'empresaid_facturacion']) !!}
        {!! Form::hidden('id_facturacion', null, ['id' => 'id_facturacion']) !!}
        
        <div class="form-group">
            {!! Form::label('no27', '27. Nombre del cliente', ['class' => 'form-label']) !!}
            {!! Form::text('no27', null, ['class' => 'form-control', 'id' => 'no27', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no28', '28. RFC', ['class' => 'form-label']) !!}
            {!! Form::text('no28', null, ['class' => 'form-control', 'id' => 'no28', 'placeholder' => 'Ingrese RFC']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no29', '29. Teléfono', ['class' => 'form-label']) !!}
            {!! Form::text('no29', null, ['class' => 'form-control', 'id' => 'no29', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no30', '30. Correo', ['class' => 'form-label']) !!}
            {!! Form::text('no30', null, ['class' => 'form-control', 'id' => 'no30', 'placeholder' => 'Ingrese correo']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no31', '31. Domicilio', ['class' => 'form-label']) !!}
            {!! Form::textarea('no31', null, ['class' => 'form-control', 'id' => 'no31', 'placeholder' => 'Ingrese domicilio']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFacturacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>