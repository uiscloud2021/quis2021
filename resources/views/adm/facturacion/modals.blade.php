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



<!-- Modal CREAR COBRO-->
<div class="modal fade" id="createCobroModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCobroModalLabel">Nuevo cobro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cobro']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_cobro', null, ['id' => 'empresaid_cobro']) !!}
        {!! Form::hidden('proyectoid_cobro', null, ['id' => 'proyectoid_cobro']) !!}
        {!! Form::hidden('id_cobro', null, ['id' => 'id_cobro']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de monitoreo', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Número de cobro', ['class' => 'form-label']) !!}
            {!! Form::number('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0', 'id' => 'no2']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Conceptos que se facturan', ['class' => 'form-label']) !!}
            {!! Form::select('no3', ['Gestión' => 'Gestión', 'Revisión inicial' => 'Revisión inicial', 'Enmiendas' => 'Enmiendas', 'Renovación anual' => 'Renovación anual', 'Conducción' => 'Conducción', 'Coordinación' => 'Coordinación', 'Farmacovigilancia' => 'Farmacovigilancia', 'Capacitación' => 'Capacitación', 'Consultoría' => 'Consultoría', 'Diseño' => 'Diseño', 'Desarrollo' => 'Desarrollo', 'Incubación' => 'Incubación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no3']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Especificaciones', ['class' => 'form-label']) !!}
            {!! Form::textarea('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese especificaciones', 'id' => 'no4']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Total del cobro', ['class' => 'form-label']) !!}
            {!! Form::number('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no5']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Cantidad retenida', ['class' => 'form-label']) !!}
            {!! Form::number('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no6']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Subtotal', ['class' => 'form-label']) !!}
            <button type="button" id="btn_subtotal" class="btn btn-info" onclick="Subtotal();" style="float:right">Generar</button>
            {!! Form::number('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no7']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no8', '8. Causa IVA', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no9', '9. Total a cobrar', ['class' => 'form-label']) !!}
            {!! Form::number('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no9']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Moneda de facturación', ['class' => 'form-label']) !!}
            {!! Form::select('no10', ['Peso mexicano' => 'Peso mexicano', 'Dólar americano' => 'Dólar americano', 'Euro' => 'Euro', 'Libra Esterlina' => 'Libra Esterlina'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no10']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Fecha de facturación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no11', null, ['class' => 'form-control', 'id' => 'no11']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Número de factura', ['class' => 'form-label']) !!}
            {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'no12']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Fecha de envío', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no13', null, ['class' => 'form-control', 'id' => 'no13']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Archivó copia de la factura en Archivo de finanzas del estudio', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no14', 'Si', null, ['class' => 'mr-1', 'id' => 'no14_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no14', 'No', null, ['class' => 'mr-1', 'id' => 'no14_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no15', '15. Fecha en que se confirma de recibido', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no15', null, ['class' => 'form-control', 'id' => 'no15']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no16', '16. Fecha estimada de pago (días de pago en contrato)', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no16', null, ['class' => 'form-control', 'id' => 'no16']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCobro" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
