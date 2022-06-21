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



<!-- Modal CREAR PASTOREO-->
<div class="modal fade" id="createPastoreoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPastoreoModalLabel">Nuevo pastoreo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_pastoreo']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_pastoreo', null, ['id' => 'empresaid_pastoreo']) !!}
        {!! Form::hidden('id_pastoreo', null, ['id' => 'id_pastoreo']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Nombre del potrero', ['class' => 'form-label']) !!}
            {!! Form::select('no1', $potreros, null, ['class' => 'form-control', 'id' =>'no1', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Fecha de entrada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no2', null, ['class' => 'form-control', 'id' => 'no2']) !!}
            </div>
        </div>

        <div class="form-group" >
            {!! Form::label('no3', '3. Reserva inicial', ['class' => 'form-label']) !!}
            {!! Form::text('no3', null, ['class' => 'form-control', 'id' => 'no3', 'placeholder' => 'Ingrese reserva']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. UA', ['class' => 'form-label']) !!}
            {!! Form::number('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese UA', 'id' => 'no4']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Fecha de salida', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
            </div>
        </div>

        <div class="form-group" >
            {!! Form::label('no6', '6. # días/periodo', ['class' => 'form-label']) !!}
            {!! Form::text('no6', null, ['class' => 'form-control', 'id' => 'no6', 'placeholder' => 'Ingrese días']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no7', '7. Reserva final', ['class' => 'form-label']) !!}
            {!! Form::text('no7', null, ['class' => 'form-control', 'id' => 'no7', 'placeholder' => 'Ingrese reserva']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPastoreo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

