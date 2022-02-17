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
        <h5 class="modal-title" id="createEquipoModalLabel">Nuevo miembro de equipo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_equipo']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_equipo', null, ['id' => 'empresaid_equipo']) !!}
        {!! Form::hidden('proyectoid_equipo', null, ['id' => 'proyectoid_equipo']) !!}
        {!! Form::hidden('sometimientoid_equipo', null, ['id' => 'sometimientoid_equipo']) !!}
        {!! Form::hidden('id_equipo', null, ['id' => 'id_equipo']) !!}
        
        <div class="form-group">
            {!! Form::label('no3', '3. Nombre del miembro del equipo', ['class' => 'form-label']) !!}
            {!! Form::text('no3', null, ['class' => 'form-control', 'id' => 'no3', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Rol', ['class' => 'form-label']) !!}
            {!! Form::select('no4', ['Investigador principal' => 'Investigador principal', 'Sub-investigador' => 'Sub-investigador', 'Coordinador de estudio' => 'Coordinador de estudio', 'Químico' => 'Químico', 'Enfermera' => 'Enfermera', 'Técnico' => 'Técnico', 'Otro rol' => 'Otro rol'], null, ['class' => 'form-control', 'id' => 'no4', 'onchange' => 'Rol(this.value)', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group" id="div4_1" style="display:none">
            {!! Form::label('no4_1', 'Nombre de otro rol', ['class' => 'form-label']) !!}
            {!! Form::text('no4_1', null, ['class' => 'form-control', 'id' => 'no4_1', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Teléfono móvil', ['class' => 'form-label']) !!}
            {!! Form::text('no5', null, ['class' => 'form-control', 'id' => 'no5', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Correo electrónico', ['class' => 'form-label']) !!}
            {!! Form::text('no6', null, ['class' => 'form-control', 'id' => 'no6', 'placeholder' => 'Ingrese correo']) !!}
        </div>

        <div class="form-group" id="div7">
            {!! Form::label('no7', '7. Se llenó tarjeta de contacto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no7', 'Si', null, ['class' => 'mr-1', 'id' => 'no7_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no7', 'No', null, ['class' => 'mr-1', 'id' => 'no7_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div8">
            {!! Form::label('no8', '8. Firmó contrato para el proyecto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no8', 'Si', null, ['class' => 'mr-1', 'id' => 'no8_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no8', 'No', null, ['class' => 'mr-1', 'id' => 'no8_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div9">
            {!! Form::label('no9', '9. Firmó FC CV Español', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div10">
            {!! Form::label('no10', '10. Firmó FC CV Inglés', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no10', 'Si', null, ['class' => 'mr-1', 'id' => 'no10_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no10', 'No', null, ['class' => 'mr-1', 'id' => 'no10_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div11">
            {!! Form::label('no11', '11. Entregó copia de cédula profesional firmada', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no11', 'Si', null, ['class' => 'mr-1', 'id' => 'no11_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no11', 'No', null, ['class' => 'mr-1', 'id' => 'no11_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Entregó copia de cada entrenamiento en temas de investigación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no12', 'Si', null, ['class' => 'mr-1', 'id' => 'no12_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no12', 'No', null, ['class' => 'mr-1', 'id' => 'no12_no']) !!}
                  No
              </label>
            </div>
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





<!-- Modal CREAR SOMETIMIENTO-->
<div class="modal fade" id="createSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSomModalLabel">Nuevo sometimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_som']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_som', null, ['id' => 'empresaid_som']) !!}
        {!! Form::hidden('proyectoid_som', null, ['id' => 'proyectoid_som']) !!}
        {!! Form::hidden('sometimientoid_som', null, ['id' => 'sometimientoid_som']) !!}
        {!! Form::hidden('id_som', null, ['id' => 'id_som']) !!}
        
        <div class="form-group">
            {!! Form::label('no13', '13. Fecha en que se reciben el protocolo y documentos relacionados', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no13', null, ['class' => 'form-control', 'id' => 'no13']) !!}
            </div>
        </div>

        <div class="form-group" id="div14">
            {!! Form::label('no14', '14. Verificó en cada documento los datos del sitio', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no14', 'Si', null, ['class' => 'mr-1', 'id' => 'no14_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no14', 'No', null, ['class' => 'mr-1', 'id' => 'no14_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div15">
            {!! Form::label('no15', '15. Verificó en cada documento los datos del investigador principal', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no15', 'Si', null, ['class' => 'mr-1', 'id' => 'no15_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no15', 'No', null, ['class' => 'mr-1', 'id' => 'no15_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div16">
            {!! Form::label('no16', '16. Verificó en cada documento los datos del CE', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no16', 'Si', null, ['class' => 'mr-1', 'id' => 'no16_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no16', 'No', null, ['class' => 'mr-1', 'id' => 'no16_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div17">
            {!! Form::label('no17', '17. Verificó que el FC Publicidad está autorizado por el patrocinador', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no17', 'Si', null, ['class' => 'mr-1', 'id' => 'no17_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no17', 'No', null, ['class' => 'mr-1', 'id' => 'no17_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div18">
            {!! Form::label('no18', '18. Nombres y versiones de los documentos que se somete ', ['class' => 'form-label']) !!}
            {!! Form::textarea('no18', null, ['class' => 'form-control', 'id' => 'no18', 'placeholder' => 'Ingrese respuesta']) !!}
        </div>

        <div class="form-group" id="div19">
            {!! Form::label('no19', '19. Entregó al Investigador principal una copia del protocolo de la investigación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no19', 'Si', null, ['class' => 'mr-1', 'id' => 'no19_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no19', 'No', null, ['class' => 'mr-1', 'id' => 'no19_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div20">
            {!! Form::label('no20', '20. Entregó al Investigador principal una copia del Manual del investigador', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no20', 'Si', null, ['class' => 'mr-1', 'id' => 'no20_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no20', 'No', null, ['class' => 'mr-1', 'id' => 'no20_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div21">
            {!! Form::label('no21', '21. Fecha en que sometió al CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no21', null, ['class' => 'form-control', 'id' => 'no21']) !!}
            </div>
        </div>

        <div class="form-group" id="div22">
            {!! Form::label('no22', '22. Archivó la copia de la carta de sometimiento sellada por el CE', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no22', 'Si', null, ['class' => 'mr-1', 'id' => 'no22_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no22', 'No', null, ['class' => 'mr-1', 'id' => 'no22_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>







<!-- Modal CREAR RESPUESTA-->
<div class="modal fade" id="createRespuestaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRespuestaModalLabel">Nueva respuesta</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_respuesta']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_respuesta', null, ['id' => 'empresaid_respuesta']) !!}
        {!! Form::hidden('proyectoid_respuesta', null, ['id' => 'proyectoid_respuesta']) !!}
        {!! Form::hidden('sometimientoid_respuesta', null, ['id' => 'sometimientoid_respuesta']) !!}
        {!! Form::hidden('id_respuesta', null, ['id' => 'id_respuesta']) !!}
        
        <div class="form-group">
            {!! Form::label('no23', '23. Fecha de respuesta del CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no23', null, ['class' => 'form-control', 'id' => 'no23']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no24', '24. Rol', ['class' => 'form-label']) !!}
            {!! Form::select('no24', ['Rechazado' => 'Rechazado', 'Aprobado - Requiere modificaciones' => 'Aprobado - Requiere modificaciones', 'Aprobado - No requiere modificaciones' => 'Aprobado - No requiere modificaciones'], null, ['class' => 'form-control', 'id' => 'no24', 'placeholder' => 'Seleccione...']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRespuesta" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>