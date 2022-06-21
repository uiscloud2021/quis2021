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


<!-- Modal CREAR ENMIENDA-->
<div class="modal fade" id="createEnmiendaSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEnmiendaSegModalLabel">Nueva enmienda</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_enmiendaseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_enmiendaseg', null, ['id' => 'empresaid_enmiendaseg']) !!}
        {!! Form::hidden('proyectoid_enmiendaseg', null, ['id' => 'proyectoid_enmiendaseg']) !!}
        {!! Form::hidden('id_enmiendaseg', null, ['id' => 'id_enmiendaseg']) !!}
        
        <div class="form-group" id="divseg1">
            {!! Form::label('seg1', '1. Se revisó el documento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg1', 'Si', null, ['class' => 'mr-1', 'id' => 'seg1_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg1', 'No', null, ['class' => 'mr-1', 'id' => 'seg1_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg2">
            {!! Form::label('seg2', '2. Fecha de la reunión en que se revisó el documento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg2', null, ['class' => 'form-control', 'id' => 'seg2']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg3">
            {!! Form::label('seg3', '3. Tipo de revisión', ['class' => 'form-label']) !!}
            {!! Form::select('seg3', ['Regular' => 'Regular', 'Expedita' => 'Expedita'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'seg3']) !!}
        </div>

        <div class="form-group" id="divseg4">
            {!! Form::label('seg4', '4. Considerando el sometimiento, el estudio puede continuar', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg4', 'Si', null, ['class' => 'mr-1', 'id' => 'seg4_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg4', 'No', null, ['class' => 'mr-1', 'id' => 'seg4_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg5">
            {!! Form::label('seg5', '5. Fecha en que se emite Aprobación de enmienda', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg5', null, ['class' => 'form-control', 'id' => 'seg5']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEnmiendaSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR DESVIACIONES-->
<div class="modal fade" id="createDesviacionSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDesviacionSegModalLabel">Desviación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_desviacionseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_desviacionseg', null, ['id' => 'empresaid_desviacionseg']) !!}
        {!! Form::hidden('proyectoid_desviacionseg', null, ['id' => 'proyectoid_desviacionseg']) !!}
        {!! Form::hidden('fechaid_desviacionseg', null, ['id' => 'fechaid_desviacionseg']) !!}
        {!! Form::hidden('id_desviacionseg', null, ['id' => 'id_desviacionseg']) !!}
        
        <div class="form-group">
            {!! Form::label('som34', 'Fecha en que sucedió la desviación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('som34', null, ['class' => 'form-control', 'id' => 'som34', 'readonly' => 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('som35', 'Descripción de la desviación', ['class' => 'form-label']) !!}
            {!! Form::textarea('som35', null, ['class' => 'form-control', 'id' => 'som35', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('som36', 'El tiempo entre la fecha en que sucedió la desviación y la Fecha de sometimiento es menor a 30 días', ['class' => 'form-label']) !!}
            {!! Form::text('som36', null, ['class' => 'form-control', 'id' => 'som36', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group" id="divseg6">
            {!! Form::label('seg6', '6. Clasificación de la desviación', ['class' => 'form-label']) !!}
            {!! Form::select('seg6', ['Desviación' => 'Desviación', 'Violación' => 'Violación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'seg6']) !!}
        </div>

        <div class="form-group" id="divseg7">
            {!! Form::label('seg7', '7. Considerando el sometimiento, el estudio puede continuar', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg7', 'Si', null, ['class' => 'mr-1', 'id' => 'seg7_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg7', 'No', null, ['class' => 'mr-1', 'id' => 'seg7_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg8">
            {!! Form::label('seg8', '8. Fecha en que se emite Revisión de desviación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg8', null, ['class' => 'form-control', 'id' => 'seg8']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg9">
            {!! Form::label('seg9', '9. Requiere seguimiento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg9', 'Si', null, ['class' => 'mr-1', 'id' => 'seg9_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg9', 'No', null, ['class' => 'mr-1', 'id' => 'seg9_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg10">
            {!! Form::label('seg10', '10. Fecha de fin de seguimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg10', null, ['class' => 'form-control', 'id' => 'seg10']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGDesviacionSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR EAS-->
<div class="modal fade" id="createEASSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEASSegModalLabel">EAS</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_easseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_easseg', null, ['id' => 'empresaid_easseg']) !!}
        {!! Form::hidden('proyectoid_easseg', null, ['id' => 'proyectoid_easseg']) !!}
        {!! Form::hidden('fechaid_easseg', null, ['id' => 'fechaid_easseg']) !!}
        {!! Form::hidden('id_easseg', null, ['id' => 'id_easseg']) !!}
        
        <div class="form-group">
            {!! Form::label('som37', 'Tipo de reporte del EAS', ['class' => 'form-label']) !!}
            {!! Form::select('som37', ['Inicial' => 'Inicial', 'Seguimiento' => 'Seguimiento'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'som37', 'readonly' => 'readonly']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('som38', 'Patología del EAS', ['class' => 'form-label']) !!}
            {!! Form::text('som38', null, ['class' => 'form-control', 'id' => 'som38', 'readonly' => 'readonly']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('som39', 'Fecha en que sucedió el EAS ', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('som39', null, ['class' => 'form-control', 'id' => 'som39', 'readonly' => 'readonly']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('som40', 'El tiempo entre la Fecha de sometimiento y la fecha en que sucedió el EAS inicial es menor a 7 días', ['class' => 'form-label']) !!}
            {!! Form::text('som40', null, ['class' => 'form-control', 'id' => 'som40', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group" id="divseg11">
            {!! Form::label('seg11', '11. Se revisó el documento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg11', 'Si', null, ['class' => 'mr-1', 'id' => 'seg11_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg11', 'No', null, ['class' => 'mr-1', 'id' => 'seg11_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg12">
            {!! Form::label('seg12', '12. Fecha de la reunión en que se revisó el documento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg12', null, ['class' => 'form-control', 'id' => 'seg12']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg13">
            {!! Form::label('seg13', '13. Considerando el sometimiento, el estudio puede continuar', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg13', 'Si', null, ['class' => 'mr-1', 'id' => 'seg13_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg13', 'No', null, ['class' => 'mr-1', 'id' => 'seg13_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg14">
            {!! Form::label('seg14', '14. Fecha en que se emite Enterado EAS', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg14', null, ['class' => 'form-control', 'id' => 'seg14']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg15">
            {!! Form::label('seg15', '15. Requiere seguimiento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg15', 'Si', null, ['class' => 'mr-1', 'id' => 'seg15_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg15', 'No', null, ['class' => 'mr-1', 'id' => 'seg15_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg16">
            {!! Form::label('seg16', '16. Fecha de fin de seguimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg16', null, ['class' => 'form-control', 'id' => 'seg16']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEASSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR OTROS SOMETIMIENTOS-->
<div class="modal fade" id="createOtroSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createOtroSegModalLabel">Nuevo sometimiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_otroseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_otroseg', null, ['id' => 'empresaid_otroseg']) !!}
        {!! Form::hidden('proyectoid_otroseg', null, ['id' => 'proyectoid_otroseg']) !!}
        {!! Form::hidden('id_otroseg', null, ['id' => 'id_otroseg']) !!}
        
        <div class="form-group" id="divseg17">
            {!! Form::label('seg17', '17. Tipo de revisión', ['class' => 'form-label']) !!}
            {!! Form::select('seg17', ['Regular' => 'Regular', 'Expedita' => 'Expedita'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'seg17']) !!}
        </div>

        <div class="form-group" id="divseg18">
            {!! Form::label('seg18', '18. Considerando el sometimiento, el estudio puede continuar', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg18', 'Si', null, ['class' => 'mr-1', 'id' => 'seg18_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg18', 'No', null, ['class' => 'mr-1', 'id' => 'seg18_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg19">
            {!! Form::label('seg19', '19. Fecha en que se emite Aprobación subsecuente', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg19', null, ['class' => 'form-control', 'id' => 'seg19']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg20">
            {!! Form::label('seg20', '20. Requiere seguimiento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg20', 'Si', null, ['class' => 'mr-1', 'id' => 'seg20_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg20', 'No', null, ['class' => 'mr-1', 'id' => 'seg20_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg21">
            {!! Form::label('seg21', '21. Fecha de fin de seguimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg21', null, ['class' => 'form-control', 'id' => 'seg21']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGOtroSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR RENOVACION-->
<div class="modal fade" id="createRenovacionSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRenovacionSegModalLabel">Renovación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_renovacionseg', null, ['id' => 'empresaid_renovacionseg']) !!}
        {!! Form::hidden('proyectoid_renovacionseg', null, ['id' => 'proyectoid_renovacionseg']) !!}
        {!! Form::hidden('fechaid_renovacionseg', null, ['id' => 'fechaid_renovacionseg']) !!}
        {!! Form::hidden('id_renovacionseg', null, ['id' => 'id_renovacionseg']) !!}
        
        <div class="form-group">
            {!! Form::label('som44', 'Somete informe anual del estudio', ['class' => 'form-label']) !!}
            {!! Form::text('som44', null, ['class' => 'form-control', 'id' => 'som44', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group" id="divseg22">
            {!! Form::label('seg22', '22. El riesgo se modificó por las enmiendas, de tal forma que el estudio deba cancelarse', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg22', 'Si', null, ['class' => 'mr-1', 'id' => 'seg22_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg22', 'No', null, ['class' => 'mr-1', 'id' => 'seg22_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg23">
            {!! Form::label('seg23', '23. El riesgo se modificó por los EAS, de tal forma que la aprobación deba cancelarse', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg23', 'Si', null, ['class' => 'mr-1', 'id' => 'seg23_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg23', 'No', null, ['class' => 'mr-1', 'id' => 'seg23_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg24">
            {!! Form::label('seg24', '24. Existen reportes de transgresiones éticas por parte de cualquier miembro del equipo de la investigación, de tal forma que la aprobación deba cancelarse', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('seg24', 'Si', null, ['class' => 'mr-1', 'id' => 'seg24_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('seg24', 'No', null, ['class' => 'mr-1', 'id' => 'seg24_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divseg25">
            {!! Form::label('seg25', '25. Fecha en que se emite Renovación anual', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg25', null, ['class' => 'form-control', 'id' => 'seg25']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRenovacionSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR ERRATAS-->
<div class="modal fade" id="createErratasSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createErratasSegModalLabel">Fe de erratas</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_erratasseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_erratasseg', null, ['id' => 'empresaid_erratasseg']) !!}
        {!! Form::hidden('proyectoid_erratasseg', null, ['id' => 'proyectoid_erratasseg']) !!}
        {!! Form::hidden('fechaid_erratasseg', null, ['id' => 'fechaid_erratasseg']) !!}
        {!! Form::hidden('id_erratasseg', null, ['id' => 'id_erratasseg']) !!}
        
        <div class="form-group">
            {!! Form::label('som45', 'Documento que se corrige', ['class' => 'form-label']) !!}
            {!! Form::text('som45', null, ['class' => 'form-control', 'id' => 'som45', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('som46', 'Información correcta', ['class' => 'form-label']) !!}
            {!! Form::textarea('som46', null, ['class' => 'form-control', 'id' => 'som46', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group" id="divseg26">
            {!! Form::label('seg26', '26. Fecha en que se emite Fe de erratas', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg26', null, ['class' => 'form-control', 'id' => 'seg26']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg27">
            {!! Form::label('seg27', '27. Documento que corrige Fe de erratas', ['class' => 'form-label']) !!}
            {!! Form::textarea('seg27', null, ['class' => 'form-control', 'id' => 'seg27', 'placeholder' => 'Ingrese documento']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGErratasSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR INFORME-->
<div class="modal fade" id="createInformeSegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createInformeSegModalLabel">Nuevo informe</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_informeseg']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_informeseg', null, ['id' => 'empresaid_informeseg']) !!}
        {!! Form::hidden('proyectoid_informeseg', null, ['id' => 'proyectoid_informeseg']) !!}
        {!! Form::hidden('id_informeseg', null, ['id' => 'id_informeseg']) !!}
        
        <div class="form-group" id="divseg28">
            {!! Form::label('seg28', '1. Fecha de aprobación COFEPRIS', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg28', null, ['class' => 'form-control', 'id' => 'seg28']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg29">
            {!! Form::label('seg29', '2. Fecha del informe', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg29', null, ['class' => 'form-control', 'id' => 'seg29']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg30">
            {!! Form::label('seg30', '3. Estado del proyecto', ['class' => 'form-label']) !!}
            {!! Form::select('seg30', ['Espera visita de inicio' => 'Espera visita de inicio', 'En conducción' => 'En conducción', 'Cerrado' => 'Cerrado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'seg30']) !!}
        </div>

        <div class="form-group" id="divseg31">
            {!! Form::label('seg31', '4. Fecha de visita de inicio', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('seg31', null, ['class' => 'form-control', 'id' => 'seg31']) !!}
            </div>
        </div>

        <div class="form-group" id="divseg32">
            {!! Form::label('seg32', '5. Sujetos que firmaron ICF', ['class' => 'form-label']) !!}
            {!! Form::number('seg32', null, ['class' => 'form-control', 'id' => 'seg32', 'placeholder' => 'Ingrese sujetos']) !!}
        </div>

        <div class="form-group" id="divseg33">
            {!! Form::label('seg33', '6. Sujetos activos o en seguimiento', ['class' => 'form-label']) !!}
            {!! Form::number('seg33', null, ['class' => 'form-control', 'id' => 'seg33', 'placeholder' => 'Ingrese sujetos']) !!}
        </div>

        <div class="form-group" id="divseg34">
            {!! Form::label('seg34', '7. Total de informes iniciales de EAS en el sitio ', ['class' => 'form-label']) !!}
            {!! Form::number('seg34', null, ['class' => 'form-control', 'id' => 'seg34', 'placeholder' => 'Ingrese total']) !!}
        </div>

        <div class="form-group" id="divseg35">
            {!! Form::label('seg35', '8. Total de desviaciones o violaciones en el sitio', ['class' => 'form-label']) !!}
            {!! Form::number('seg35', null, ['class' => 'form-control', 'id' => 'seg35', 'placeholder' => 'Ingrese total']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGInformeSeg" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>