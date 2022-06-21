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



<!-- Modal CREAR INDAGACIONES-->
<div class="modal fade" id="createIndagacionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createIndagacionModalLabel">Nueva indagación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_indagacion']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_indagacion', null, ['id' => 'empresaid_indagacion']) !!}
        {!! Form::hidden('denunciaid_indagacion', null, ['id' => 'denunciaid_indagacion']) !!}
        {!! Form::hidden('id_indagacion', null, ['id' => 'id_indagacion']) !!}
        
        <div class="form-group">
            {!! Form::label('no12', '12. Fecha de indagación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no12', null, ['class' => 'form-control', 'id' => 'no12']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Responsable de indagación', ['class' => 'form-label']) !!}
            {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no13']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no14', '14. Persona implicada', ['class' => 'form-label']) !!}
            {!! Form::hidden('no14', null, ['class' => 'form-control', 'id' => 'no14']) !!}
            {!! Form::hidden('no15', null, ['class' => 'form-control', 'id' => 'no15']) !!}
            <table class="table table-striped" style="width:100%;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Puesto</th>
              </tr>
              @foreach ($candidatos as $candidato)
                <tr>
                  <td><input type="checkbox" name="candidatos[]" id="cand{{$candidato->id}}" value="{{$candidato->id}}"></input></td>
                  <td>{{$candidato->no62}}</td>
                  <td>{!! Form::text('pto'.$candidato->id, null, ['class' => 'form-control', 'placeholder' => 'Ingrese puesto', 'id' => 'pto'.$candidato->id]) !!}</td>
                </tr>
              @endforeach
            </table>
        </div>

        <div class="form-group">
            {!! Form::label('no16', '16. Acción', ['class' => 'form-label']) !!}
            {!! Form::textarea('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese acción', 'id' => 'no16']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no17', '17. Existe motivo para verificar cumplimiento', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no18', '18. Total de personas implicadas', ['class' => 'form-label']) !!}
            {!! Form::textarea('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese total', 'id' => 'no18', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no19', '19. Fecha de evaluación de cumplimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no19', null, ['class' => 'form-control', 'id' => 'no19']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no20', '20. Valores de la empresa', ['class' => 'form-label']) !!}
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
            {!! Form::label('no21', '21. Acuerdo de confidencialidad', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no21', 'Si', null, ['class' => 'mr-1', 'id' => 'no21_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no21', 'No', null, ['class' => 'mr-1', 'id' => 'no21_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no22', '22. Declaración de No conflicto', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no23', '23. Procedimientos de la empresa', ['class' => 'form-label']) !!}
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
            {!! Form::label('no24', '24. Reporte de regalos', ['class' => 'form-label']) !!}
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
            {!! Form::label('no25', '25. Actos de discriminación', ['class' => 'form-label']) !!}
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
            {!! Form::label('no26', '26. Actos de abuso o maltrato', ['class' => 'form-label']) !!}
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
            {!! Form::label('no27', '27. Actos de acoso', ['class' => 'form-label']) !!}
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
            {!! Form::label('no28', '28. Actos de represalia', ['class' => 'form-label']) !!}
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
            {!! Form::label('no29', '29. Código de conducta', ['class' => 'form-label']) !!}
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
            {!! Form::label('no30', '30. Actos de riesgo', ['class' => 'form-label']) !!}
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
            {!! Form::label('no31', '31. Reuniones con alimentos', ['class' => 'form-label']) !!}
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
            {!! Form::label('no32', '32. Reporte de viáticos', ['class' => 'form-label']) !!}
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
            {!! Form::label('no33', '33. Distorsión de informes', ['class' => 'form-label']) !!}
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
            {!! Form::label('no34', '34. Daño a bienes o patrimonio ', ['class' => 'form-label']) !!}
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
            {!! Form::label('no35', '35. Actos de negligencia', ['class' => 'form-label']) !!}
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
            {!! Form::label('no36', '36. Derechos de los sujetos', ['class' => 'form-label']) !!}
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
            {!! Form::label('no37', '37. Recibir pagos de sujetos', ['class' => 'form-label']) !!}
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

        <div class="form-group">
            {!! Form::label('no38', '38. Daño a propiedad del cliente', ['class' => 'form-label']) !!}
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
            {!! Form::label('no39', '39. Leyes, regulaciones o normas', ['class' => 'form-label']) !!}
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
            {!! Form::label('no40', '40. Actos de corrupción', ['class' => 'form-label']) !!}
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
            {!! Form::label('no41', '41. Trato a proveedores', ['class' => 'form-label']) !!}
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGIndagacion" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

