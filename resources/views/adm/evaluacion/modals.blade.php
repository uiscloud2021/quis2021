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



<!-- Modal CREAR VERIFICACION-->
<div class="modal fade" id="createVerificacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVerificacionModalLabel">Nueva verificación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_verificacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_verificacion', null, ['id' => 'empresaid_verificacion']) !!}
        {!! Form::hidden('candidatoid_verificacion', null, ['id' => 'candidatoid_verificacion']) !!}
        {!! Form::hidden('evaluacionid_verificacion', null, ['id' => 'evaluacionid_verificacion']) !!}
        {!! Form::hidden('id_verificacion', null, ['id' => 'id_verificacion']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de verificación de cumplimiento del plan de capacitación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Persona que verificó', ['class' => 'form-label']) !!}
            {!! Form::text('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no2']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVerificacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR CAPACITACION-->
<div class="modal fade" id="createCapacitacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCapacitacionModalLabel">Nueva capacitación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_capacitacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_capacitacion', null, ['id' => 'empresaid_capacitacion']) !!}
        {!! Form::hidden('candidatoid_capacitacion', null, ['id' => 'candidatoid_capacitacion']) !!}
        {!! Form::hidden('evaluacionid_capacitacion', null, ['id' => 'evaluacionid_capacitacion']) !!}
        {!! Form::hidden('id_capacitacion', null, ['id' => 'id_capacitacion']) !!}
        
        <div class="form-group">
            {!! Form::label('no3', '3. Nombre de la capacitación requerida', ['class' => 'form-label']) !!}
            {!! Form::select('no3', ['Dirección General' => 'Dirección General', 'Subdirección' => 'Subdirección', 'Gerente de Administración' => 'Gerente de Administración', 'Recursos Humanos' => 'Recursos Humanos', 'Finanzas' => 'Finanzas', 'Calidad' => 'Calidad', 'Sistemas' => 'Sistemas', 'Regulatorios' => 'Regulatorios', 'Recepción' => 'Recepción', 'Asistente administrativo' => 'Asistente administrativo', 'Mensajero' => 'Mensajero', 'Limpieza' => 'Limpieza', 'Becario' => 'Becario', 'Presidente de CE' => 'Presidente de CE', 'Presidente de CI' => 'Presidente de CI', 'Secretario de CE' => 'Secretario de CE', 'Secretario de CI' => 'Secretario de CI', 'Miembro del Comité de Ética' => 'Miembro del Comité de Ética', 'Miembro del Comité de Investigación' => 'Miembro del Comité de Investigación', 'Gerente de Sitio Clínico' => 'Gerente de Sitio Clínico', 'Coordinador de Estudios' => 'Coordinador de Estudios', 'Investigador' => 'Investigador', 'Enfermera' => 'Enfermera', 'Químico' => 'Químico', 'Técnico' => 'Técnico', 'Gerente de ID' => 'Gerente de ID', 'Asesor de ID' => 'Asesor de ID', 'Asistente de ID' => 'Asistente de ID'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no3']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Fecha de la constancia de capacitación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no4', null, ['class' => 'form-control', 'id' => 'no4']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Fecha programada de actualización de la capacitación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCapacitacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


