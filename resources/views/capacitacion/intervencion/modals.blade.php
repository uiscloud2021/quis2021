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



<!-- Modal CREAR PARTICIPANTE-->
<div class="modal fade" id="createParticipanteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createParticipanteModalLabel">Nuevo participante</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_participante']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_participante', null, ['id' => 'empresaid_participante']) !!}
        {!! Form::hidden('intervencionid_participante', null, ['id' => 'intervencionid_participante']) !!}
        {!! Form::hidden('id_participante', null, ['id' => 'id_participante']) !!}
        
        <div class="form-group">
            {!! Form::label('no7', '7. Nombre del participante ', ['class' => 'form-label']) !!}
            {!! Form::select('no7', $candidatos, null, ['class' => 'form-control', 'id' =>'no7', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('otro', 'Nombre de otro participante', ['class' => 'form-label']) !!}
            {!! Form::text('otro', null, ['class' => 'form-control', 'id' => 'otro', 'placeholder' => 'Ingrese nombre']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('no8', '8. Título', ['class' => 'form-label']) !!}
            {!! Form::text('no8', null, ['class' => 'form-control', 'id' => 'no8', 'placeholder' => 'Ingrese título']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no9', '9. Número de participante', ['class' => 'form-label']) !!}
            {!! Form::text('no9', null, ['class' => 'form-control', 'id' => 'no9', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Número de constancia', ['class' => 'form-label']) !!}
            {!! Form::text('no10', null, ['class' => 'form-control', 'id' => 'no10', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGParticipante" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


