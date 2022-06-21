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
<div class="modal fade" id="createEquipoSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEquipoSomModalLabel">Nuevo miembro del equipo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_equiposom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_equiposom', null, ['id' => 'empresaid_equiposom']) !!}
        {!! Form::hidden('proyectoid_equiposom', null, ['id' => 'proyectoid_equiposom']) !!}
        {!! Form::hidden('sometimientoid_equiposom', null, ['id' => 'sometimientoid_equiposom']) !!}
        {!! Form::hidden('id_equiposom', null, ['id' => 'id_equiposom']) !!}
        
        <div class="form-group" id="divs3">
            {!! Form::label('s3', '3. Nombre del miembro del equipo', ['class' => 'form-label']) !!}
            {!! Form::text('s3', null, ['class' => 'form-control', 'id' => 's3', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divs4">
            {!! Form::label('s4', '4. Rol', ['class' => 'form-label']) !!}
            {!! Form::select('s4', ['Investigador principal' => 'Investigador principal', 'Sub-investigador' => 'Sub-investigador', 'Coordinador de estudio' => 'Coordinador de estudio', 'Químico' => 'Químico', 'Enfermera' => 'Enfermera', 'Técnico' => 'Técnico', 'Asistente' => 'Asistente'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's4']) !!}
        </div>

        <div class="form-group" id="divs5">
            {!! Form::label('s5', '5. Teléfono móvil', ['class' => 'form-label']) !!}
            {!! Form::text('s5', null, ['class' => 'form-control', 'id' => 's5', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divs6">
            {!! Form::label('s6', '6. Correo electrónico', ['class' => 'form-label']) !!}
            {!! Form::text('s6', null, ['class' => 'form-control', 'id' => 's6', 'placeholder' => 'Ingrese correo']) !!}
        </div>

        <div class="form-group" id="divs7">
            {!! Form::label('s7', '7. Se llenó tarjeta de contacto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s7', 'Si', null, ['class' => 'mr-1', 'id' => 's7_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s7', 'No', null, ['class' => 'mr-1', 'id' => 's7_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs8">
            {!! Form::label('s8', '8. Firmó contrato para el proyecto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s8', 'Si', null, ['class' => 'mr-1', 'id' => 's8_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s8', 'No', null, ['class' => 'mr-1', 'id' => 's8_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs9">
            {!! Form::label('s9', '9. Firmó FC CV Español', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s9', 'Si', null, ['class' => 'mr-1', 'id' => 's9_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s9', 'No', null, ['class' => 'mr-1', 'id' => 's9_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs10">
            {!! Form::label('s10', '10. Firmó FC CV Inglés', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s10', 'Si', null, ['class' => 'mr-1', 'id' => 's10_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s10', 'No', null, ['class' => 'mr-1', 'id' => 's10_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs11">
            {!! Form::label('s11', '11. Entregó copia de cédula profesional firmada', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s11', 'Si', null, ['class' => 'mr-1', 'id' => 's11_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s11', 'No', null, ['class' => 'mr-1', 'id' => 's11_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs12">
            {!! Form::label('s12', '12. Entregó copia de cada entrenamiento en temas de investigación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s12', 'Si', null, ['class' => 'mr-1', 'id' => 's12_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s12', 'No', null, ['class' => 'mr-1', 'id' => 's12_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEquipoSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR SOMETIMIENTO-->
<div class="modal fade" id="createSometimientoSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSometimientoSomModalLabel">Nuevo sometimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_sometimientosom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_sometimientosom', null, ['id' => 'empresaid_sometimientosom']) !!}
        {!! Form::hidden('proyectoid_sometimientosom', null, ['id' => 'proyectoid_sometimientosom']) !!}
        {!! Form::hidden('sometimientoid_sometimientosom', null, ['id' => 'sometimientoid_sometimientosom']) !!}
        {!! Form::hidden('id_sometimientosom', null, ['id' => 'id_sometimientosom']) !!}
        
        <div class="form-group" id="divs13">
            {!! Form::label('s13', '13. Fecha en que se reciben el protocolo y documentos relacionados', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s13', null, ['class' => 'form-control', 'id' => 's13']) !!}
            </div>
        </div>

        <div class="form-group" id="divs14">
            {!! Form::label('s14', '14. Verificó en cada documento los datos del sitio', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s14', 'Si', null, ['class' => 'mr-1', 'id' => 's14_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s14', 'No', null, ['class' => 'mr-1', 'id' => 's14_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs15">
            {!! Form::label('s15', '15. Verificó en cada documento los datos del investigador principal', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s15', 'Si', null, ['class' => 'mr-1', 'id' => 's15_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s15', 'No', null, ['class' => 'mr-1', 'id' => 's15_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs16">
            {!! Form::label('s16', '16. Verificó en cada documento los datos del CE', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s16', 'Si', null, ['class' => 'mr-1', 'id' => 's16_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s16', 'No', null, ['class' => 'mr-1', 'id' => 's16_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs17">
            {!! Form::label('s17', '17. Verificó que el FC Publicidad está autorizado por el patrocinador', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s17', 'Si', null, ['class' => 'mr-1', 'id' => 's17_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s17', 'No', null, ['class' => 'mr-1', 'id' => 's17_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs18">
            {!! Form::label('s18', '18. Nombres y versiones de documentos que se someten', ['class' => 'form-label']) !!}
            {!! Form::textarea('s18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre y versión', 'id' => 's18']) !!}
        </div>

        <div class="form-group" id="divs19">
            {!! Form::label('s19', '19. Entregó al Investigador principal una copia del protocolo de la investigación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s19', 'Si', null, ['class' => 'mr-1', 'id' => 's19_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s19', 'No', null, ['class' => 'mr-1', 'id' => 's19_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs20">
            {!! Form::label('s20', '20. Entregó al Investigador principal una copia del Manual del investigador', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s20', 'Si', null, ['class' => 'mr-1', 'id' => 's20_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s20', 'No', null, ['class' => 'mr-1', 'id' => 's20_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs21">
            {!! Form::label('s21', '21. Fecha en que sometió al CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s21', null, ['class' => 'form-control', 'id' => 's21']) !!}
            </div>
        </div>

        <div class="form-group" id="divs22">
            {!! Form::label('s22', '22. Archivó la copia de la carta de sometimiento sellada por el CE', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s22', 'Si', null, ['class' => 'mr-1', 'id' => 's22_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s22', 'No', null, ['class' => 'mr-1', 'id' => 's22_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSometimientoSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR RESPUESTA-->
<div class="modal fade" id="createRespuestaSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRespuestaSomModalLabel">Nueva respuesta</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_respuestasom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_respuestasom', null, ['id' => 'empresaid_respuestasom']) !!}
        {!! Form::hidden('proyectoid_respuestasom', null, ['id' => 'proyectoid_respuestasom']) !!}
        {!! Form::hidden('sometimientoid_respuestasom', null, ['id' => 'sometimientoid_respuestasom']) !!}
        {!! Form::hidden('id_respuestasom', null, ['id' => 'id_respuestasom']) !!}
        
        <div class="form-group" id="divs23">
            {!! Form::label('s23', '23. Fecha de respuesta del CE', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s23', null, ['class' => 'form-control', 'id' => 's23']) !!}
            </div>
        </div>

        <div class="form-group" id="divs24">
            {!! Form::label('s24', '24. Respuesta del CE', ['class' => 'form-label']) !!}
            {!! Form::select('s24', ['Rechazado' => 'Rechazado', 'Aprobado - Requiere modificaciones' => 'Aprobado - Requiere modificaciones', 'Aprobado - No requiere modificaciones' => 'Aprobado - No requiere modificaciones'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's24']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRespuestaSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>