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



<!-- Modal CREAR MODULO-->
<div class="modal fade" id="createModuloModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModuloModalLabel">Nuevo módulo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_modulo']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_modulo', null, ['id' => 'empresaid_modulo']) !!}
        {!! Form::hidden('contenidoid_modulo', null, ['id' => 'contenidoid_modulo']) !!}
        {!! Form::hidden('id_modulo', null, ['id' => 'id_modulo']) !!}
        
        <div class="form-group">
            {!! Form::label('no15', '15. Módulo', ['class' => 'form-label']) !!}
            {!! Form::text('no15', null, ['class' => 'form-control', 'id' => 'no15', 'placeholder' => 'Ingrese módulo']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGModulo" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR TEMA-->
<div class="modal fade" id="createTemaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTemaModalLabel">Nuevo tema</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_tema']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_tema', null, ['id' => 'empresaid_tema']) !!}
        {!! Form::hidden('contenidoid_tema', null, ['id' => 'contenidoid_tema']) !!}
        {!! Form::hidden('id_tema', null, ['id' => 'id_tema']) !!}

        <div class="form-group">
            {!! Form::label('no17', '17. Módulo', ['class' => 'form-label']) !!}
            {!! Form::select('no17', $modulos, null, ['class' => 'form-control', 'id' =>'no17', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no18', '18. Tema', ['class' => 'form-label']) !!}
            {!! Form::text('no18', null, ['class' => 'form-control', 'id' => 'no18', 'placeholder' => 'Ingrese tema']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGTema" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR ACTIVIDAD-->
<div class="modal fade" id="createActividadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createActividadModalLabel">Nueva actividad</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_actividad']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_actividad', null, ['id' => 'empresaid_actividad']) !!}
        {!! Form::hidden('contenidoid_actividad', null, ['id' => 'contenidoid_actividad']) !!}
        {!! Form::hidden('id_actividad', null, ['id' => 'id_actividad']) !!}

        <div class="form-group">
            {!! Form::label('no20', '20. Tema', ['class' => 'form-label']) !!}
            {!! Form::select('no20', $temas, null, ['class' => 'form-control', 'id' =>'no20', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no21', '21. Actividad', ['class' => 'form-label']) !!}
            {!! Form::text('no21', null, ['class' => 'form-control', 'id' => 'no21', 'placeholder' => 'Ingrese actividad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no22', '22. Objetivos de la actividad', ['class' => 'form-label']) !!}
            {!! Form::textarea('no22', null, ['class' => 'form-control', 'id' => 'no22', 'placeholder' => 'Ingrese objetivos']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no23', '23. Técnica', ['class' => 'form-label']) !!}
            {!! Form::textarea('no23', null, ['class' => 'form-control', 'id' => 'no23', 'placeholder' => 'Ingrese técnica']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGActividad" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR EVALUACION-->
<div class="modal fade" id="createEvaluacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEvaluacionModalLabel">Nueva evaluación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_evaluacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_evaluacion', null, ['id' => 'empresaid_evaluacion']) !!}
        {!! Form::hidden('contenidoid_evaluacion', null, ['id' => 'contenidoid_evaluacion']) !!}
        {!! Form::hidden('id_evaluacion', null, ['id' => 'id_evaluacion']) !!}

        <div class="form-group">
            {!! Form::label('no24', '24. Competencias', ['class' => 'form-label']) !!}
            {!! Form::textarea('no24', null, ['class' => 'form-control', 'id' => 'no24', 'placeholder' => 'Ingrese competencias']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no25', '25. Evaluación', ['class' => 'form-label']) !!}
            {!! Form::text('no25', null, ['class' => 'form-control', 'id' => 'no25', 'placeholder' => 'Ingrese evaluación']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEvaluacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR RECURSOS-->
<div class="modal fade" id="createRecursoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRecursoModalLabel">Nueva evaluación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_recurso']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_recurso', null, ['id' => 'empresaid_recurso']) !!}
        {!! Form::hidden('contenidoid_recurso', null, ['id' => 'contenidoid_recurso']) !!}
        {!! Form::hidden('id_recurso', null, ['id' => 'id_recurso']) !!}

        <div class="form-group">
            {!! Form::label('no26', '26. Recurso necesario', ['class' => 'form-label']) !!}
            {!! Form::text('no26', null, ['class' => 'form-control', 'id' => 'no26', 'placeholder' => 'Ingrese recurso']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no27', '27. Descripción del recurso', ['class' => 'form-label']) !!}
            {!! Form::textarea('no27', null, ['class' => 'form-control', 'id' => 'no27', 'placeholder' => 'Ingrese descripción']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRecurso" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

