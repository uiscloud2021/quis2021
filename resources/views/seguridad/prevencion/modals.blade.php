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



<!-- Modal CREAR COMISION-->
<div class="modal fade" id="createComisionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createComisionModalLabel">Nueva Comisión de Seguridad</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_comision']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_comision', null, ['id' => 'empresaid_comision']) !!}
        {!! Form::hidden('id_comision', null, ['id' => 'id_comision']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Miembro de la Comisión', ['class' => 'form-label']) !!}
            {!! Form::select('no1', $empleados, null, ['class' => 'form-control', 'id' =>'no1', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Fecha de nombramiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no2', null, ['class' => 'form-control', 'id' => 'no2']) !!}
            </div>
        </div>

        <div class="form-group" id="divs48">
            {!! Form::label('no3', '3. Responsabilidades', ['class' => 'form-label']) !!}
            {!! Form::hidden('no3', null, ['class' => 'form-control', 'id' => 's48']) !!}
            <table class="table table-striped" style="width:100%;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Responsabilidades</th>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check1" value="Responsable"></input></td>
                <td>Responsable</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check2" value="Sujetos y visitas"></input></td>
                <td>Sujetos y visitas</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check3" value="Farmacia"></input></td>
                <td>Farmacia</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check4" value="Búsqueda, rescate y primeros auxilios"></input></td>
                <td>Búsqueda, rescate y primeros auxilios</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check5" value="Unidad clínica"></input></td>
                <td>Unidad clínica</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check6" value="Daños"></input></td>
                <td>Daños</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check7" value="Actividades"></input></td>
                <td>Actividades</td>
              </tr>
              <tr>
                <td><input type="checkbox" name="resp[]" id="check8" value="Comunicación de acuerdos"></input></td>
                <td>Comunicación de acuerdos</td>
              </tr>
            </table>
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Suplente del Responsable', ['class' => 'form-label']) !!}
            {!! Form::select('no4', $empleados, null, ['class' => 'form-control', 'id' =>'no4', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Fecha de baja', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGComision" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR REUNIONES-->
<div class="modal fade" id="createReunionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createReunionModalLabel">Nueva reunión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reunion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_reunion', null, ['id' => 'empresaid_reunion']) !!}
        {!! Form::hidden('id_reunion', null, ['id' => 'id_reunion']) !!}

        <div class="form-group">
            {!! Form::label('no6', '6. Fecha programada de reunión de la CSH', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no6', null, ['class' => 'form-control', 'id' => 'no6']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Fecha de la reunión CSH', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no7', null, ['class' => 'form-control', 'id' => 'no7']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no8', '8. Verificación de asistencia', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no9', '9. Asuntos tratados ', ['class' => 'form-label']) !!}
            {!! Form::textarea('no9', null, ['class' => 'form-control', 'id' => 'no9', 'placeholder' => 'Ingrese asuntos']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGReunion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR PLAN-->
<div class="modal fade" id="createPlanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPlanModalLabel">Nuevo plan de seguridad</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_plan']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_plan', null, ['id' => 'empresaid_plan']) !!}
        {!! Form::hidden('id_plan', null, ['id' => 'id_plan']) !!}

        <div class="form-group">
            {!! Form::label('no10', '10. Nombre de la actividad', ['class' => 'form-label']) !!}
            {!! Form::textarea('no10', null, ['class' => 'form-control', 'id' => 'no10', 'placeholder' => 'Ingrese actividad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Tipo de actividad', ['class' => 'form-label']) !!}
            {!! Form::select('no11', ['Capacitación' => 'Capacitación', 'Inspección' => 'Inspección', 'Simulacro' => 'Simulacro'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no11']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Frecuencia realización', ['class' => 'form-label']) !!}
            {!! Form::text('no12', null, ['class' => 'form-control', 'id' => 'no12', 'placeholder' => 'Ingrese frecuencia']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Fecha programada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no13', null, ['class' => 'form-control', 'id' => 'no13']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Objetivos', ['class' => 'form-label']) !!}
            {!! Form::textarea('no14', null, ['class' => 'form-control', 'id' => 'no14', 'placeholder' => 'Ingrese objetivos']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no15', '15. Responsable de realizar', ['class' => 'form-label']) !!}
            {!! Form::select('no15', $empleados, null, ['class' => 'form-control', 'id' =>'no15', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no16', '16. Nombre de la actividad', ['class' => 'form-label']) !!}
            {!! Form::text('no16', null, ['class' => 'form-control', 'id' => 'no16', 'placeholder' => 'Ingrese actividad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no17', '17. Participante programado', ['class' => 'form-label']) !!}
            {!! Form::hidden('no17', null, ['class' => 'form-control', 'id' => 'no17']) !!}
            {!! Form::hidden('no18', null, ['class' => 'form-control', 'id' => 'no18']) !!}
            <table class="table table-striped" style="width:100%;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
              </tr>
              @foreach ($candidatos as $candidato)
                <tr>
                  <td><input type="checkbox" name="candidatos[]" id="cand{{$candidato->id}}" value="{{$candidato->id}}"></input></td>
                  <td>{{$candidato->no62}}</td>
                  <td>{!! Form::select('rol'.$candidato->id, ['Responsable de Seguridad' => 'Responsable de Seguridad', 'Miembro de la CSH' => 'Miembro de la CSH', 'Personal' => 'Personal'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'rol'.$candidato->id]) !!}</td>
                </tr>
              @endforeach
            </table>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPlan" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR REVISION-->
<div class="modal fade" id="createRevisionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRevisionModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_revision']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_revision', null, ['id' => 'empresaid_revision']) !!}
        {!! Form::hidden('id_revision', null, ['id' => 'id_revision']) !!}

        <div class="form-group">
            {!! Form::label('no19', '19. Fecha realizada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no19', null, ['class' => 'form-control', 'id' => 'no19']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no20', '20. Cumplimiento', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no21', '21. Persona que revisa', ['class' => 'form-label']) !!}
            {!! Form::select('no21', $empleados, null, ['class' => 'form-control', 'id' =>'no21', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no22', '22. Instalación que involucra', ['class' => 'form-label']) !!}
            {!! Form::text('no22', null, ['class' => 'form-control', 'id' => 'no22', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div><h6>Requisitos de seguridad</h6></div>

        <div class="form-group">
            {!! Form::label('no23', '23. El acceso a las instalaciones es limitado', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no23', 'Si', null, ['class' => 'mr-1', 'id' => 'no23_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no23', 'No', null, ['class' => 'mr-1', 'id' => 'no23_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no24', '24. Existe un libro de registros de acceso', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no24', 'Si', null, ['class' => 'mr-1', 'id' => 'no24_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no24', 'No', null, ['class' => 'mr-1', 'id' => 'no24_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no25', '25. El personal se identifica con gafete', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no25', 'Si', null, ['class' => 'mr-1', 'id' => 'no25_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no25', 'No', null, ['class' => 'mr-1', 'id' => 'no25_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no26', '26. Existe un área interna señalada para el resguardo de personal y usuarios', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no26', 'Si', null, ['class' => 'mr-1', 'id' => 'no26_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no26', 'No', null, ['class' => 'mr-1', 'id' => 'no26_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no27', '27. Existe un área externa señalada para el resguardo de personal y usuarios', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no27', 'Si', null, ['class' => 'mr-1', 'id' => 'no27_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no27', 'No', null, ['class' => 'mr-1', 'id' => 'no27_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no28', '28. Existe una ruta de evacuación señalada', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no28', 'Si', null, ['class' => 'mr-1', 'id' => 'no28_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no28', 'No', null, ['class' => 'mr-1', 'id' => 'no28_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no29', '29. Existe un plan de manejo de residuos peligrosos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no29', 'Si', null, ['class' => 'mr-1', 'id' => 'no29_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no29', 'No', null, ['class' => 'mr-1', 'id' => 'no29_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no30', '30. Existe un botiquín de primeros auxilios', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no30', 'Si', null, ['class' => 'mr-1', 'id' => 'no30_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no30', 'No', null, ['class' => 'mr-1', 'id' => 'no30_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div><h6>Equipo de seguridad</h6></div>

        <div class="form-group">
            {!! Form::label('no31', '31. Chaleco identificador', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no31', 'Si', null, ['class' => 'mr-1', 'id' => 'no31_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no31', 'No', null, ['class' => 'mr-1', 'id' => 'no31_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no32', '32. Camilla', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no32', 'Si', null, ['class' => 'mr-1', 'id' => 'no32_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no32', 'No', null, ['class' => 'mr-1', 'id' => 'no32_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no33', '33. Lámpara', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no33', 'Si', null, ['class' => 'mr-1', 'id' => 'no33_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no33', 'No', null, ['class' => 'mr-1', 'id' => 'no33_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no34', '34. Silbato', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no34', 'Si', null, ['class' => 'mr-1', 'id' => 'no34_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no34', 'No', null, ['class' => 'mr-1', 'id' => 'no34_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no35', '35. Extinguidores', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no35', 'Si', null, ['class' => 'mr-1', 'id' => 'no35_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no35', 'No', null, ['class' => 'mr-1', 'id' => 'no35_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no36', '36. Lámparas de emergencia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no36', 'Si', null, ['class' => 'mr-1', 'id' => 'no36_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no36', 'No', null, ['class' => 'mr-1', 'id' => 'no36_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no37', '37. Cubre-bocas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no37', 'Si', null, ['class' => 'mr-1', 'id' => 'no37_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no37', 'No', null, ['class' => 'mr-1', 'id' => 'no37_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div><h6>Seguridad en laboratorio</h6></div>

        <div class="form-group">
            {!! Form::label('no38', '38. El acceso a laboratorio es restringido', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no38', 'Si', null, ['class' => 'mr-1', 'id' => 'no38_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no38', 'No', null, ['class' => 'mr-1', 'id' => 'no38_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no39', '39. Señalización equipo de seguridad', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no39', 'Si', null, ['class' => 'mr-1', 'id' => 'no39_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no39', 'No', null, ['class' => 'mr-1', 'id' => 'no39_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no40', '40. Lentes protectores', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no40', 'Si', null, ['class' => 'mr-1', 'id' => 'no40_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no40', 'No', null, ['class' => 'mr-1', 'id' => 'no40_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no41', '41. Guantes', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no41', 'Si', null, ['class' => 'mr-1', 'id' => 'no41_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no41', 'No', null, ['class' => 'mr-1', 'id' => 'no41_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no42', '42. Bata obligatoria', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no42', 'Si', null, ['class' => 'mr-1', 'id' => 'no42_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no42', 'No', null, ['class' => 'mr-1', 'id' => 'no42_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no43', '43. Agua disponible', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no43', 'Si', null, ['class' => 'mr-1', 'id' => 'no43_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no43', 'No', null, ['class' => 'mr-1', 'id' => 'no43_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no44', '44. Drenaje disponible', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no44', 'Si', null, ['class' => 'mr-1', 'id' => 'no44_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no44', 'No', null, ['class' => 'mr-1', 'id' => 'no44_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no45', '45. Botes de basura punzocortante', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no45', 'Si', null, ['class' => 'mr-1', 'id' => 'no45_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no45', 'No', null, ['class' => 'mr-1', 'id' => 'no45_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no46', '46. Bote con bolsa roja', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no46', 'Si', null, ['class' => 'mr-1', 'id' => 'no46_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no46', 'No', null, ['class' => 'mr-1', 'id' => 'no46_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no47', '47. Bote para basura común', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no47', 'Si', null, ['class' => 'mr-1', 'id' => 'no47_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no47', 'No', null, ['class' => 'mr-1', 'id' => 'no47_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no48', '48. Señalamiento de separación de residuos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no48', 'Si', null, ['class' => 'mr-1', 'id' => 'no48_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no48', 'No', null, ['class' => 'mr-1', 'id' => 'no48_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div><h6>Seguridad en Área clínica</h6></div>

        <div class="form-group">
            {!! Form::label('no49', '49. Verificación de contenido y control del carro rojo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no49', 'Si', null, ['class' => 'mr-1', 'id' => 'no49_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no49', 'No', null, ['class' => 'mr-1', 'id' => 'no49_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no50', '50. Instrucciones para manejo de urgencias y traslados', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no50', 'Si', null, ['class' => 'mr-1', 'id' => 'no50_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no50', 'No', null, ['class' => 'mr-1', 'id' => 'no50_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div><h6>Seguridad en Farmacia</h6></div>

        <div class="form-group">
            {!! Form::label('no51', '51. El acceso a farmacia es restringido', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no51', 'Si', null, ['class' => 'mr-1', 'id' => 'no51_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no51', 'No', null, ['class' => 'mr-1', 'id' => 'no51_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no52', '52. Respaldo de energía eléctrica', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no52', 'Si', null, ['class' => 'mr-1', 'id' => 'no52_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no52', 'No', null, ['class' => 'mr-1', 'id' => 'no52_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no53', '53. Señalización en equipos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no53', 'Si', null, ['class' => 'mr-1', 'id' => 'no53_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no53', 'No', null, ['class' => 'mr-1', 'id' => 'no53_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no54', '54. Instrucciones para cadena de frío', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no54', 'Si', null, ['class' => 'mr-1', 'id' => 'no54_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no54', 'No', null, ['class' => 'mr-1', 'id' => 'no54_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRevision" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR BITACORA-->
<div class="modal fade" id="createBitacoraModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createBitacoraModalLabel">Nueva bitácora</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_bitacora']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_bitacora', null, ['id' => 'empresaid_bitacora']) !!}
        {!! Form::hidden('id_bitacora', null, ['id' => 'id_bitacora']) !!}

        <div class="form-group">
            {!! Form::label('no55', '55. Fecha realizada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no55', null, ['class' => 'form-control', 'id' => 'no55']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no56', '56. Área física', ['class' => 'form-label']) !!}
            {!! Form::text('no56', null, ['class' => 'form-control', 'id' => 'no56', 'placeholder' => 'Ingrese área']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no57', '57. Condiciones de la estructura física', ['class' => 'form-label']) !!}
            {!! Form::select('no57', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no57']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no58', '58. Riesgos físicos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no58', 'Si', null, ['class' => 'mr-1', 'id' => 'no58_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no58', 'No', null, ['class' => 'mr-1', 'id' => 'no58_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no59', '59. Cerraduras', ['class' => 'form-label']) !!}
            {!! Form::select('no59', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no59']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no60', '60. Mobiliario', ['class' => 'form-label']) !!}
            {!! Form::select('no60', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no60']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no61', '61. Equipo', ['class' => 'form-label']) !!}
            {!! Form::select('no61', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no61']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no62', '62. Tomacorrientes', ['class' => 'form-label']) !!}
            {!! Form::select('no62', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no62']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no63', '63. Apagadores', ['class' => 'form-label']) !!}
            {!! Form::select('no63', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no63']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no64', '64. Cables y extensiones eléctricos', ['class' => 'form-label']) !!}
            {!! Form::select('no64', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no64']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no65', '65. Funcionamiento de los focos', ['class' => 'form-label']) !!}
            {!! Form::select('no65', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no65']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no66', '66. Lámparas de emergencia', ['class' => 'form-label']) !!}
            {!! Form::select('no66', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no66']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no67', '67. Detectores de humo', ['class' => 'form-label']) !!}
            {!! Form::select('no67', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no67']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no68', '68. Condiciones de la ventilación', ['class' => 'form-label']) !!}
            {!! Form::select('no68', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no68']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no69', '69. Aire acondicionado', ['class' => 'form-label']) !!}
            {!! Form::select('no69', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no69']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no70', '70. Calefacción', ['class' => 'form-label']) !!}
            {!! Form::select('no70', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no70']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no71', '71. Señalización de ruta de evacuación', ['class' => 'form-label']) !!}
            {!! Form::select('no71', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no71']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no72', '72. Señalización de manejo de residuos', ['class' => 'form-label']) !!}
            {!! Form::select('no72', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no72']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no73', '73. Equipo de protección necesario', ['class' => 'form-label']) !!}
            {!! Form::select('no73', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no73']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no74', '74. Equipo contra incendios', ['class' => 'form-label']) !!}
            {!! Form::select('no74', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no74']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no75', '75. Higiene', ['class' => 'form-label']) !!}
            {!! Form::select('no75', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no75']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no76', '76. Mantenimiento', ['class' => 'form-label']) !!}
            {!! Form::select('no76', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no76']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no77', '77. Sanitarios', ['class' => 'form-label']) !!}
            {!! Form::select('no77', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no77']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no78', '78. Lavabos', ['class' => 'form-label']) !!}
            {!! Form::select('no78', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no78']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no79', '79. Jaboneras', ['class' => 'form-label']) !!}
            {!! Form::select('no79', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no79']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no80', '80. Regaderas', ['class' => 'form-label']) !!}
            {!! Form::select('no80', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no80']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no81', '81. Bomba de agua', ['class' => 'form-label']) !!}
            {!! Form::select('no81', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no81']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no82', '82. Planta de emergencia', ['class' => 'form-label']) !!}
            {!! Form::select('no82', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no82']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGBitacora" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR SIMULACRO-->
<div class="modal fade" id="createSimulacroModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSimulacroModalLabel">Nuevo simulacro</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_simulacro']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_simulacro', null, ['id' => 'empresaid_simulacro']) !!}
        {!! Form::hidden('id_simulacro', null, ['id' => 'id_simulacro']) !!}

        <div class="form-group">
            {!! Form::label('no83', '83. Fecha realizada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no83', null, ['class' => 'form-control', 'id' => 'no83']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no84', '84. Cumplimiento', ['class' => 'form-label']) !!}
            {!! Form::select('no11', ['Capacitación' => 'Capacitación', 'Inspección' => 'Inspección', 'Simulacro' => 'Simulacro'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no11']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Frecuencia realización', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no84', 'Si', null, ['class' => 'mr-1', 'id' => 'no84_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no84', 'No', null, ['class' => 'mr-1', 'id' => 'no84_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no85', '85. Responsable de la brigada', ['class' => 'form-label']) !!}
            {!! Form::select('no85', $empleados, null, ['class' => 'form-control', 'id' =>'no85', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no86', '86. Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('no86', null, ['class' => 'form-control', 'id' => 'no86', 'placeholder' => 'Ingrese descripción']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no87', '87. Resultados', ['class' => 'form-label']) !!}
            {!! Form::textarea('no87', null, ['class' => 'form-control', 'id' => 'no87', 'placeholder' => 'Ingrese resultados']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSimulacro" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR VISITA-->
<div class="modal fade" id="createVisitaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVisitaModalLabel">Nueva visita</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_visita']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_visita', null, ['id' => 'empresaid_visita']) !!}
        {!! Form::hidden('id_visita', null, ['id' => 'id_visita']) !!}

        <div class="form-group">
            {!! Form::label('no88', '88. Fecha de la visita de verificación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no88', null, ['class' => 'form-control', 'id' => 'no88']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no89', '89. Objetivo de la visita de verificación', ['class' => 'form-label']) !!}
            {!! Form::textarea('no89', null, ['class' => 'form-control', 'id' => 'no86', 'placeholder' => 'Ingrese objetivo']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no90', '90. Institución que realiza la visita de verificación', ['class' => 'form-label']) !!}
            {!! Form::text('no90', null, ['class' => 'form-control', 'id' => 'no90', 'placeholder' => 'Ingrese institución']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no91', '91. Persona que realiza la visita de verificación', ['class' => 'form-label']) !!}
            {!! Form::text('no91', null, ['class' => 'form-control', 'id' => 'no91', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no92', '92. Resultado de la visita de verificación', ['class' => 'form-label']) !!}
            {!! Form::textarea('no92', null, ['class' => 'form-control', 'id' => 'no92', 'placeholder' => 'Ingrese resultado']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVisita" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

