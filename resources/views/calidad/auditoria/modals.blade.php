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



<!-- Modal CREAR EQUIPO-->
<div class="modal fade" id="createEquipoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEquipoModalLabel">Nuevo equipo auditor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_equipo']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_equipo', null, ['id' => 'empresaid_equipo']) !!}
        {!! Form::hidden('auditoriaid_equipo', null, ['id' => 'auditoriaid_equipo']) !!}
        {!! Form::hidden('id_equipo', null, ['id' => 'id_equipo']) !!}
        
        <div class="form-group">
            {!! Form::label('no8', '8. Nombre del auditor', ['class' => 'form-label']) !!}
            {!! Form::text('no8', null, ['class' => 'form-control', 'id' => 'no8', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no9', '9. Iniciales', ['class' => 'form-label']) !!}
            {!! Form::text('no9', null, ['class' => 'form-control', 'id' => 'no9', 'placeholder' => 'Ingrese iniciales']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Empresa', ['class' => 'form-label']) !!}
            {!! Form::text('no10', null, ['class' => 'form-control', 'id' => 'no10', 'placeholder' => 'Ingrese empresa']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEquipo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR REQUISITO AUDITORIA-->
<div class="modal fade" id="createRequisitoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRequisitoModalLabel">Nuevo requisito</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_requisito']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_requisito', null, ['id' => 'empresaid_requisito']) !!}
        {!! Form::hidden('auditoriaid_requisito', null, ['id' => 'auditoriaid_requisito']) !!}
        {!! Form::hidden('id_requisito', null, ['id' => 'id_requisito']) !!}

        <div class="form-group">
            {!! Form::label('no12', '12. Requisito a evaluar', ['class' => 'form-label']) !!}
            {!! Form::textarea('no12', null, ['class' => 'form-control', 'id' => 'no12', 'placeholder' => 'Ingrese requisito']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Cumple', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no13', 'Si', null, ['class' => 'mr-1', 'id' => 'no13_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no13', 'No', null, ['class' => 'mr-1', 'id' => 'no13_no']) !!}
                  No
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no13', 'No aplica', null, ['class' => 'mr-1', 'id' => 'no13_aplica']) !!}
                  No aplica
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Observación de la auditoría', ['class' => 'form-label']) !!}
            {!! Form::textarea('no14', null, ['class' => 'form-control', 'id' => 'no14', 'placeholder' => 'Ingrese observación']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no15', '15. Fecha de cumplimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no15', null, ['class' => 'form-control', 'id' => 'no15']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRequisito" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

