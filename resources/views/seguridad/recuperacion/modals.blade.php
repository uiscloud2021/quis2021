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




<!-- Modal CREAR REVISION-->
<div class="modal fade" id="createRecuperacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRecuperacionModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_recuperacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_recuperacion', null, ['id' => 'empresaid_recuperacion']) !!}
        {!! Form::hidden('id_recuperacion', null, ['id' => 'id_recuperacion']) !!}

        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Área física', ['class' => 'form-label']) !!}
            {!! Form::text('no2', null, ['class' => 'form-control', 'id' => 'no2', 'placeholder' => 'Ingrese área']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Condiciones de la estructura física', ['class' => 'form-label']) !!}
            {!! Form::select('no3', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no3']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Riesgos físicos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no4', 'Si', null, ['class' => 'mr-1', 'id' => 'no4_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no4', 'No', null, ['class' => 'mr-1', 'id' => 'no4_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no5', '5. Cerraduras', ['class' => 'form-label']) !!}
            {!! Form::select('no5', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no5']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Mobiliario', ['class' => 'form-label']) !!}
            {!! Form::select('no6', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no6']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Equipo', ['class' => 'form-label']) !!}
            {!! Form::select('no7', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no7']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no8', '8. Tomacorrientes', ['class' => 'form-label']) !!}
            {!! Form::select('no8', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no8']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no9', '9. Apagadores', ['class' => 'form-label']) !!}
            {!! Form::select('no9', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no9']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Cables y extensiones eléctricos', ['class' => 'form-label']) !!}
            {!! Form::select('no10', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no10']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Funcionamiento de los focos', ['class' => 'form-label']) !!}
            {!! Form::select('no11', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no11']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Lámparas de emergencia', ['class' => 'form-label']) !!}
            {!! Form::select('no12', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no12']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Detectores de humo', ['class' => 'form-label']) !!}
            {!! Form::select('no13', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no13']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Condiciones de la ventilación', ['class' => 'form-label']) !!}
            {!! Form::select('no14', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no14']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no15', '15. Aire acondicionado', ['class' => 'form-label']) !!}
            {!! Form::select('no15', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no15']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no16', '16. Calefacción', ['class' => 'form-label']) !!}
            {!! Form::select('no16', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no16']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no17', '17. Señalización de ruta de evacuación', ['class' => 'form-label']) !!}
            {!! Form::select('no17', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no17']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no18', '18. Señalización de manejo de residuos', ['class' => 'form-label']) !!}
            {!! Form::select('no18', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no18']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no19', '19. Equipo de protección necesario', ['class' => 'form-label']) !!}
            {!! Form::select('no19', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no19']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no20', '20. Equipo contra incendios', ['class' => 'form-label']) !!}
            {!! Form::select('no20', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no20']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no21', '21. Higiene', ['class' => 'form-label']) !!}
            {!! Form::select('no21', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no21']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no22', '22. Mantenimiento', ['class' => 'form-label']) !!}
            {!! Form::select('no22', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no22']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no23', '23. Sanitarios', ['class' => 'form-label']) !!}
            {!! Form::select('no23', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no23']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no24', '24. Lavabos', ['class' => 'form-label']) !!}
            {!! Form::select('no24', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no24']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no25', '25. Jaboneras', ['class' => 'form-label']) !!}
            {!! Form::select('no25', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no25']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no26', '26. Regaderas', ['class' => 'form-label']) !!}
            {!! Form::select('no26', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no26']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no27', '27. Bomba de agua', ['class' => 'form-label']) !!}
            {!! Form::select('no27', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no27']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no28', '28. Planta de emergencia', ['class' => 'form-label']) !!}
            {!! Form::select('no28', ['Adecuado' => 'Adecuado', 'Inadecuado' => 'Inadecuado', 'No aplica' => 'No aplica'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no28']) !!}
        </div>

        <div><h6>Descripción</h6></div>

        <div class="form-group">
            {!! Form::label('no29', '29. Se requirió evaluación por especialistas ', ['class' => 'form-label']) !!}
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
            {!! Form::label('no30', '30. Riesgo eléctrico', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no31', '31. Riesgo por gas', ['class' => 'form-label']) !!}
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
            {!! Form::label('no32', '32. Riesgo por derrames peligrosos', ['class' => 'form-label']) !!}
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
            {!! Form::label('no33', '33. Riesgo de desprendimiento', ['class' => 'form-label']) !!}
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
            {!! Form::label('no34', '34. Mobiliario en posiciones inseguras ', ['class' => 'form-label']) !!}
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

        <div><h6>Requisitos</h6></div>

        <div class="form-group">
            {!! Form::label('no35', '35. Se requiere un programa de reconstrucción', ['class' => 'form-label']) !!}
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
            {!! Form::label('no36', '36. Las instalaciones son seguras para retornar a trabajar', ['class' => 'form-label']) !!}
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
            {!! Form::label('no37', '37. Fecha en que se recupera la normalidad', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no37', null, ['class' => 'form-control', 'id' => 'no37']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRecuperacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


