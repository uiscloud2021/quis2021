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



<!-- Modal CREAR PERSIMOS CON GOCE-->
<div class="modal fade" id="createPermisoCGoceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPermisoCGoceModalLabel">Nuevo permiso</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_permisocgoce']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_permisocgoce', null, ['id' => 'empresaid_permisocgoce']) !!}
        {!! Form::hidden('candidatoid_permisocgoce', null, ['id' => 'candidatoid_permisocgoce']) !!}
        {!! Form::hidden('id_permisocgoce', null, ['id' => 'id_permisocgoce']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha en que entrega Solicitud de permiso ', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Número de días de permiso con goce de sueldo que solicita', ['class' => 'form-label']) !!}
            {!! Form::number('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0', 'id' => 'no2']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Fecha de inicio de permiso con goce de sueldo', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no3', null, ['class' => 'form-control', 'id' => 'no3']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Fecha en que debe regresar a laborar', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no4', null, ['class' => 'form-control', 'id' => 'no4']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPermisoCGoce" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PERSIMOS SIN GOCE-->
<div class="modal fade" id="createPermisoSGoceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPermisoSGoceModalLabel">Nuevo permiso</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_permisosgoce']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_permisosgoce', null, ['id' => 'empresaid_permisosgoce']) !!}
        {!! Form::hidden('candidatoid_permisosgoce', null, ['id' => 'candidatoid_permisosgoce']) !!}
        {!! Form::hidden('id_permisosgoce', null, ['id' => 'id_permisosgoce']) !!}
        
        <div class="form-group">
            {!! Form::label('no5', '5. Fecha en que entrega Solicitud de permiso', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Número de días que solicita', ['class' => 'form-label']) !!}
            {!! Form::number('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0', 'id' => 'no6']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Fecha de inicio de permiso sin goce de sueldo', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no7', null, ['class' => 'form-control', 'id' => 'no7']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no8', '8. Fecha en que debe regresar a laborar', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no8', null, ['class' => 'form-control', 'id' => 'no8']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPermisoSGoce" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>







<!-- Modal CREAR VACACIONES-->
<div class="modal fade" id="createVacacionesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVacacionesModalLabel">Nuevo permiso</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_vacaciones']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_vacaciones', null, ['id' => 'empresaid_vacaciones']) !!}
        {!! Form::hidden('candidatoid_vacaciones', null, ['id' => 'candidatoid_vacaciones']) !!}
        {!! Form::hidden('id_vacaciones', null, ['id' => 'id_vacaciones']) !!}
        
        <div class="form-group">
            {!! Form::label('no9', '9. Fecha en que entrega Solicitud de vacaciones', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no9', null, ['class' => 'form-control', 'id' => 'no9']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Número de días de vacaciones que solicita', ['class' => 'form-label']) !!}
            {!! Form::number('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0', 'id' => 'no10']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Fecha de inicio de vacaciones', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no11', null, ['class' => 'form-control', 'id' => 'no11']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Fecha en que debe regresar a laborar', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no12', null, ['class' => 'form-control', 'id' => 'no12']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVacaciones" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

