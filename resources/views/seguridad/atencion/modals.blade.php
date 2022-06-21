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



<!-- Modal CREAR ATENCION-->
<div class="modal fade" id="createAtencionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAtencionModalLabel">Nueva Contingencia</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_atencion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_atencion', null, ['id' => 'empresaid_atencion']) !!}
        {!! Form::hidden('id_atencion', null, ['id' => 'id_atencion']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de la contingencia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Evento', ['class' => 'form-label']) !!}
            {!! Form::text('no2', null, ['class' => 'form-control', 'id' => 'no2', 'placeholder' => 'Ingrese evento']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Magnitud del evento', ['class' => 'form-label']) !!}
            {!! Form::textarea('no3', null, ['class' => 'form-control', 'id' => 'no3', 'placeholder' => 'Ingrese magnitud']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Fue necesario llamar a cuerpos de emergencia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no4', 'Si', null, ['class' => 'mr-1', 'id' => 'no4_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no4', 'No', null, ['class' => 'mr-1', 'id' => 'no4_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div><h6>Prioridades de atención</h6></div>

        <div class="form-group">
            {!! Form::label('no5', '5. Se emitió un alerta', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no5', 'Si', null, ['class' => 'mr-1', 'id' => 'no5_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no5', 'No', null, ['class' => 'mr-1', 'id' => 'no5_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Describa daños al personal', ['class' => 'form-label']) !!}
            {!! Form::textarea('no6', null, ['class' => 'form-control', 'id' => 'no6', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Describa daños a los usuarios', ['class' => 'form-label']) !!}
            {!! Form::textarea('no7', null, ['class' => 'form-control', 'id' => 'no7', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no8', '8. Funcionamiento del servidor', ['class' => 'form-label']) !!}
            {!! Form::textarea('no8', null, ['class' => 'form-control', 'id' => 'no8', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no9', '9. Funcionamiento de equipos de farmacia', ['class' => 'form-label']) !!}
            {!! Form::textarea('no9', null, ['class' => 'form-control', 'id' => 'no9', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Describa daño a los bienes', ['class' => 'form-label']) !!}
            {!! Form::textarea('no10', null, ['class' => 'form-control', 'id' => 'no10', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Nombre de la persona que evalúa los daños', ['class' => 'form-label']) !!}
            {!! Form::text('no11', null, ['class' => 'form-control', 'id' => 'no11', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGAtencion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


