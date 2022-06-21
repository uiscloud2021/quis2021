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



<!-- Modal CREAR INSTALACIONES-->
<div class="modal fade" id="createInstalacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createInstalacionModalLabel">Nueva instalación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_instalacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_instalacion', null, ['id' => 'empresaid_instalacion']) !!}
        {!! Form::hidden('id_instalacion', null, ['id' => 'id_instalacion']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Nombre de la instalación', ['class' => 'form-label']) !!}
            {!! Form::text('no1', null, ['class' => 'form-control', 'id' => 'no1', 'placeholder' => 'Ingrese instalación']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Utilidad', ['class' => 'form-label']) !!}
            {!! Form::text('no2', null, ['class' => 'form-control', 'id' => 'no2', 'placeholder' => 'Ingrese utilidad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no3', null, ['class' => 'form-control', 'id' => 'no3']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Estado', ['class' => 'form-label']) !!}
            {!! Form::text('no4', null, ['class' => 'form-control', 'id' => 'no4', 'placeholder' => 'Ingrese estado']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGInstalacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal MANTENIMIENTO-->
<div class="modal fade" id="createMantenimientoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createMantenimientoModalLabel">Nuevo mantenimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_mantenimiento']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_mantenimiento', null, ['id' => 'empresaid_mantenimiento']) !!}
        {!! Form::hidden('id_mantenimiento', null, ['id' => 'id_mantenimiento']) !!}
        
        <div class="form-group" >
            {!! Form::label('no5', '5. Fecha de mantenimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Instalación', ['class' => 'form-label']) !!}
            {!! Form::select('no6', $instalaciones, null, ['class' => 'form-control', 'id' =>'no6', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group" >
            {!! Form::label('no7', '7. Obra', ['class' => 'form-label']) !!}
            {!! Form::text('no7', null, ['class' => 'form-control', 'id' => 'no7', 'placeholder' => 'Ingrese obra']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGMantenimiento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
