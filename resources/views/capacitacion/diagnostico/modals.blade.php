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



<!-- Modal CREAR FECHA-->
<div class="modal fade" id="createFechaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFechaModalLabel">Nueva fecha de evaluación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fecha']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_fecha', null, ['id' => 'empresaid_fecha']) !!}
        {!! Form::hidden('diagnosticoid_fecha', null, ['id' => 'diagnosticoid_fecha']) !!}
        {!! Form::hidden('candidatoid_fecha', null, ['id' => 'candidatoid_fecha']) !!}
        {!! Form::hidden('id_fecha', null, ['id' => 'id_fecha']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de evaluación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFecha" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR CONOCIMIENTO-->
<div class="modal fade" id="createConocimientoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createConocimientoModalLabel">Nuevo conocimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_conocimiento']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_conocimiento', null, ['id' => 'empresaid_conocimiento']) !!}
        {!! Form::hidden('diagnosticoid_conocimiento', null, ['id' => 'diagnosticoid_conocimiento']) !!}
        {!! Form::hidden('candidatoid_conocimiento', null, ['id' => 'candidatoid_conocimiento']) !!}
        {!! Form::hidden('id_conocimiento', null, ['id' => 'id_conocimiento']) !!}

        <div class="form-group">
            {!! Form::label('no2', '2. Conocimiento necesario', ['class' => 'form-label']) !!}
            {!! Form::textarea('no2', null, ['class' => 'form-control', 'id' => 'no2', 'placeholder' => 'Ingrese conocimiento']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Cumple el conocimiento necesario', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no3', 'Si', null, ['class' => 'mr-1', 'id' => 'no3_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no3', 'No', null, ['class' => 'mr-1', 'id' => 'no3_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGConocimiento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR HABILIDAD-->
<div class="modal fade" id="createHabilidadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createHabilidadModalLabel">Nueva habilidad</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_habilidad']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_habilidad', null, ['id' => 'empresaid_habilidad']) !!}
        {!! Form::hidden('diagnosticoid_habilidad', null, ['id' => 'diagnosticoid_habilidad']) !!}
        {!! Form::hidden('candidatoid_habilidad', null, ['id' => 'candidatoid_habilidad']) !!}
        {!! Form::hidden('id_habilidad', null, ['id' => 'id_habilidad']) !!}

        <div class="form-group">
            {!! Form::label('no5', '5. Habilidad necesaria', ['class' => 'form-label']) !!}
            {!! Form::textarea('no5', null, ['class' => 'form-control', 'id' => 'no5', 'placeholder' => 'Ingrese habilidad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Cumple la habilidad necesaria', ['class' => 'form-label']) !!}
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGHabilidad" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR APTITUD-->
<div class="modal fade" id="createAptitudModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAptitudModalLabel">Nueva aptitud</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_aptitud']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_aptitud', null, ['id' => 'empresaid_aptitud']) !!}
        {!! Form::hidden('diagnosticoid_aptitud', null, ['id' => 'diagnosticoid_aptitud']) !!}
        {!! Form::hidden('candidatoid_aptitud', null, ['id' => 'candidatoid_aptitud']) !!}
        {!! Form::hidden('id_aptitud', null, ['id' => 'id_aptitud']) !!}

        <div class="form-group">
            {!! Form::label('no8', '8. Aptitud necesaria', ['class' => 'form-label']) !!}
            {!! Form::textarea('no8', null, ['class' => 'form-control', 'id' => 'no8', 'placeholder' => 'Ingrese aptitud']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no9', '9. Cumple la aptitud necesaria', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no9', 'Si', null, ['class' => 'mr-1', 'id' => 'no9_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no9', 'No', null, ['class' => 'mr-1', 'id' => 'no9_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGAptitud" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
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
        {!! Form::hidden('diagnosticoid_capacitacion', null, ['id' => 'diagnosticoid_capacitacion']) !!}
        {!! Form::hidden('candidatoid_capacitacion', null, ['id' => 'candidatoid_capacitacion']) !!}
        {!! Form::hidden('id_capacitacion', null, ['id' => 'id_capacitacion']) !!}

        <div class="form-group">
            {!! Form::label('no13', '13. Nombre de la capacitación requerida', ['class' => 'form-label']) !!}
            {!! Form::textarea('no13', null, ['class' => 'form-control', 'id' => 'no13', 'placeholder' => 'Ingrese capacitación']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Fecha de constancia de la capacitación requerida', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no14', null, ['class' => 'form-control', 'id' => 'no14']) !!}
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




<!-- Modal CREAR AREA-->
<div class="modal fade" id="createAreaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createAreaModalLabel">Nueva área de conocimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_area']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_area', null, ['id' => 'empresaid_area']) !!}
        {!! Form::hidden('diagnosticoid_area', null, ['id' => 'diagnosticoid_area']) !!}
        {!! Form::hidden('candidatoid_area', null, ['id' => 'candidatoid_area']) !!}
        {!! Form::hidden('id_area', null, ['id' => 'id_area']) !!}

        <div class="form-group">
            {!! Form::label('no18', '18. Área del conocimiento en que tiene preparación ', ['class' => 'form-label']) !!}
            {!! Form::textarea('no18', null, ['class' => 'form-control', 'id' => 'no18', 'placeholder' => 'Ingrese área']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGArea" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR GRADO-->
<div class="modal fade" id="createGradoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createGradoModalLabel">Nuevo grado</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_grado']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_grado', null, ['id' => 'empresaid_grado']) !!}
        {!! Form::hidden('diagnosticoid_grado', null, ['id' => 'diagnosticoid_grado']) !!}
        {!! Form::hidden('candidatoid_grado', null, ['id' => 'candidatoid_grado']) !!}
        {!! Form::hidden('id_grado', null, ['id' => 'id_grado']) !!}

        <div class="form-group">
            {!! Form::label('no19', '19. Grado académico', ['class' => 'form-label']) !!}
            {!! Form::textarea('no19', null, ['class' => 'form-control', 'id' => 'no19', 'placeholder' => 'Ingrese grado']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGGrado" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR PROPUESTA-->
<div class="modal fade" id="createPropuestaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPropuestaModalLabel">Nueva capacitación propuesta</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_propuesta']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_propuesta', null, ['id' => 'empresaid_propuesta']) !!}
        {!! Form::hidden('diagnosticoid_propuesta', null, ['id' => 'diagnosticoid_propuesta']) !!}
        {!! Form::hidden('candidatoid_propuesta', null, ['id' => 'candidatoid_propuesta']) !!}
        {!! Form::hidden('id_propuesta', null, ['id' => 'id_propuesta']) !!}

        <div class="form-group">
            {!! Form::label('no35', '35. Capacitación propuesta', ['class' => 'form-label']) !!}
            {!! Form::textarea('no35', null, ['class' => 'form-control', 'id' => 'no35', 'placeholder' => 'Ingrese capacitación']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no36', '36. Personas y puestos', ['class' => 'form-label']) !!}
            {!! Form::hidden('no36', null, ['class' => 'form-control', 'id' => 'no36']) !!}
            {!! Form::hidden('num_empleados', $num_empleados, ['class' => 'form-control', 'id' => 'num_empleados']) !!}
            <table class="table table-striped" style="width:100%;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Puesto</th>
              </tr>
              @foreach ($empleados as $empleado)
                <tr>
                  <td><input type="checkbox" name="candidatos[]" id="cand{{$empleado->id}}" value="{{$empleado->id}}"></input></td>
                  <td>{{$empleado->no62}}</td>
                  <td>{{$empleado->no63}}</td>
                </tr>
              @endforeach
            </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPropuesta" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

