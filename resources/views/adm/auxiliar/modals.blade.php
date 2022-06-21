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



<!-- Modal CREAR MOVIMIENTO-->
<div class="modal fade" id="createMovimientoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createMovimientoModalLabel">Nuevo pago</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_auxiliar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
        {!! Form::hidden('id_auxiliar', null, ['id' => 'id_auxiliar']) !!}
        {!! Form::hidden('id_cuenta', null, ['id' => 'id_cuenta']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de movimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Tipo de movimiento', ['class' => 'form-label']) !!}
            {!! Form::select('no2', ['Saldo inicial' => 'Saldo inicial', 'Déposito' => 'Déposito', 'Retiro' => 'Retiro'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no2']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no3']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción', 'id' => 'no4']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Número de factura', ['class' => 'form-label']) !!}
            {!! Form::text('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'no5']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Cantidad', ['class' => 'form-label']) !!}
            {!! Form::number('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no6']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGMovimiento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


