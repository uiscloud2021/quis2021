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


<!-- Modal CREAR EQUIPAMIENTO-->
<div class="modal fade" id="createEquipamientoFactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEquipamientoFactModalLabel">Nuevo problema</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_equipamientofact']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_equipamientofact', null, ['id' => 'empresaid_equipamientofact']) !!}
        {!! Form::hidden('proyectoid_equipamientofact', null, ['id' => 'proyectoid_equipamientofact']) !!}
        {!! Form::hidden('factibilidadid_equipamientofact', null, ['id' => 'factibilidadid_equipamientofact']) !!}
        {!! Form::hidden('id_equipamientofact', null, ['id' => 'id_equipamientofact']) !!}
        
        <div class="form-group" id="divf27">
            {!! Form::label('f27', '27. Problema de equipamiento', ['class' => 'form-label']) !!}
            {!! Form::text('f27', null, ['class' => 'form-control', 'id' => 'f27', 'placeholder' => 'Ingrese problema']) !!}
        </div>

        <div class="form-group" id="divf28">
            {!! Form::label('f28', '28. Solución', ['class' => 'form-label']) !!}
            {!! Form::textarea('f28', null, ['class' => 'form-control', 'id' => 'f28', 'placeholder' => 'Ingrese solución']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEquipamientoFact" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR SEGUIMIENTO-->
<div class="modal fade" id="createSeguimientoFactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSeguimientoFactModalLabel">Nuevo seguimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_seguimientofact']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_seguimientofact', null, ['id' => 'empresaid_seguimientofact']) !!}
        {!! Form::hidden('proyectoid_seguimientofact', null, ['id' => 'proyectoid_seguimientofact']) !!}
        {!! Form::hidden('factibilidadid_seguimientofact', null, ['id' => 'factibilidadid_seguimientofact']) !!}
        {!! Form::hidden('id_seguimientofact', null, ['id' => 'id_seguimientofact']) !!}
        
        <div class="form-group" id="divf43">
            {!! Form::label('f43', '4. Fecha de seguimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('f43', null, ['class' => 'form-control', 'id' => 'f43']) !!}
            </div>
        </div>

        <div class="form-group" id="divf44">
            {!! Form::label('f44', '5. Resultado de seguimiento', ['class' => 'form-label']) !!}
            {!! Form::textarea('f44', null, ['class' => 'form-control', 'id' => 'f44', 'placeholder' => 'Ingrese el resultado']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSeguimientoFact" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
