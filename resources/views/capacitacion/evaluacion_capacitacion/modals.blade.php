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



<!-- Modal CREAR ELEMENTO-->
<div class="modal fade" id="createElementoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createElementoModalLabel">Nuevo elemento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_elemento']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_elemento', null, ['id' => 'empresaid_elemento']) !!}
        {!! Form::hidden('evaluacionid_elemento', null, ['id' => 'evaluacionid_elemento']) !!}
        {!! Form::hidden('id_elemento', null, ['id' => 'id_elemento']) !!}
        
        <div class="form-group">
            {!! Form::label('no4', '4. Elementos a evaluar', ['class' => 'form-label']) !!}
            {!! Form::text('no4', null, ['class' => 'form-control', 'id' => 'no4', 'placeholder' => 'Ingrese elemento']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('no5', '5. Porcentaje de cumplimiento', ['class' => 'form-label']) !!}
            {!! Form::number('no5', null, ['class' => 'form-control', 'id' => 'no5', 'placeholder' => 'Ingrese porcentaje', 'min' => '0', 'max' => '100']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Aprobado', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no6', 'Si', null, ['class' => 'mr-1', 'id' => 'no6_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no6', 'No', null, ['class' => 'mr-1', 'id' => 'no6_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Observaciones', ['class' => 'form-label']) !!}
            {!! Form::textarea('no7', null, ['class' => 'form-control', 'id' => 'no7', 'placeholder' => 'Ingrese observaciones']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGElemento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CONSTANCIA-->
<div class="modal fade" id="createConstanciaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createConstanciaModalLabel">Nueva constancia</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_constancia']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_constancia', null, ['id' => 'empresaid_constancia']) !!}
        {!! Form::hidden('evaluacionid_constancia', null, ['id' => 'evaluacionid_constancia']) !!}
        {!! Form::hidden('id_constancia', null, ['id' => 'id_constancia']) !!}
        
        <div class="form-group">
            {!! Form::label('no8', '8. Título del participante', ['class' => 'form-label']) !!}
            {!! Form::text('no8', null, ['class' => 'form-control', 'id' => 'no8', 'placeholder' => 'Ingrese título']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('no9', '9. Nombre completo del participante', ['class' => 'form-label']) !!}
            {!! Form::text('no9', null, ['class' => 'form-control', 'id' => 'no9', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Nombre del curso', ['class' => 'form-label']) !!}
            {!! Form::text('no10', null, ['class' => 'form-control', 'id' => 'no10', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Duración', ['class' => 'form-label']) !!}
            {!! Form::text('no11', null, ['class' => 'form-control', 'id' => 'no11', 'placeholder' => 'Ingrese duración']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Número de constancia', ['class' => 'form-label']) !!}
            {!! Form::text('no12', null, ['class' => 'form-control', 'id' => 'no12', 'placeholder' => 'Ingrese número', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Lugar de emisión', ['class' => 'form-label']) !!}
            {!! Form::text('no13', null, ['class' => 'form-control', 'id' => 'no13', 'placeholder' => 'Ingrese duración']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Fecha de emisión de la constancia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                  {!! Form::date('no14', null, ['class' => 'form-control', 'id' => 'no14']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGConstancia" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


