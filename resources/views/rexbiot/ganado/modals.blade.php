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



<!-- Modal CREAR VACUNA-->
<div class="modal fade" id="createVacunaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVacunaModalLabel">Nueva medicina o vacuna</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_vacuna']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_vacuna', null, ['id' => 'empresaid_vacuna']) !!}
        {!! Form::hidden('ganadoid_vacuna', null, ['id' => 'ganadoid_vacuna']) !!}
        {!! Form::hidden('id_vacuna', null, ['id' => 'id_vacuna']) !!}
        
        <div class="form-group">
            {!! Form::label('no_vacuna', '29. Nombre de la medicina o vacuna', ['class' => 'form-label']) !!}
            {!! Form::text('no_vacuna', null, ['class' => 'form-control', 'id' => 'no_vacuna', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVacuna" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>




<!-- Modal CREAR MANEJO1-->
<div class="modal fade" id="createManejo1Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createManejo1ModalLabel">Nuevo manejo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_manejo1']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_manejo1', null, ['id' => 'empresaid_manejo1']) !!}
        {!! Form::hidden('ganadoid_manejo1', null, ['id' => 'ganadoid_manejo1']) !!}
        {!! Form::hidden('id_manejo1', null, ['id' => 'id_manejo1']) !!}

        <div class="form-group" id="div24">
            {!! Form::label('no24', '24. Fecha de manejo', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no24', null, ['class' => 'form-control', 'id' => 'no24']) !!}
            </div>
        </div>

        <div class="form-group" id="div25">
            {!! Form::label('no25', '25. Edad', ['class' => 'form-label']) !!}
            {!! Form::text('no25', null, ['class' => 'form-control', 'id' => 'no25', 'placeholder' => 'Ingrese edad']) !!}
        </div>

        <div class="form-group" id="div26">
            {!! Form::label('no26', '26. Peso', ['class' => 'form-label']) !!}
            {!! Form::text('no26', null, ['class' => 'form-control', 'id' => 'no26', 'placeholder' => 'Ingrese peso']) !!}
        </div>

        <div class="form-group" id="div27">
            {!! Form::label('no27', '27. Prueba de tuberculina, brucelosis, T8 y Rivanol', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div28" style="display:none">
            {!! Form::label('no28', '28. Reactora', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div29">
            {!! Form::label('no29', '29. Medicinas y Vacunas', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="divmedicinas" style="display:none">
          {!! Form::hidden('no_medicinas', null, ['class' => 'form-control', 'id' => 'no_medicinas']) !!}
          <table class="table table-striped" style="width:100%;">
            <tr>
              <th scope="col"></th>
              <th scope="col">Medicina o vacuna</th>
            </tr>
            @foreach ($medicinas as $medicina)
              <tr>
                <td><input type="checkbox" name="vacunas[]" id="vac{{$medicina->id}}" value="{{$medicina->id}}"></input></td>
                <td>{{$medicina->no_vacuna}}</td>
              </tr>
            @endforeach
          </table>
        </div>

        <div class="form-group" id="div30" style="display:none">
            {!! Form::label('no30', '30. Palpación', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div31" style="display:none">
            {!! Form::label('no31', '31. Estado', ['class' => 'form-label']) !!}
            {!! Form::select('no31', ['Preñada' => 'Preñada', 'Vacía' => 'Vacía'], null, ['class' => 'form-control', 'id' => 'no31', 'placeholder' => 'Seleccione...', 'onchange' => 'Estado(this.value)']) !!}
        </div>

        <div class="form-group" id="div32" style="display:none">
            {!! Form::label('no32', '32. Número de preñez', ['class' => 'form-label']) !!}
            {!! Form::text('no32', null, ['class' => 'form-control', 'id' => 'no32', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="div33" style="display:none">
            {!! Form::label('no33', '33. Tipo de preñez', ['class' => 'form-label']) !!}
            {!! Form::select('no33', ['Natural' => 'Natural', 'Artificial' => 'Artificial'], null, ['class' => 'form-control', 'id' => 'no33', 'placeholder' => 'Seleccione...']) !!}
        </div>

        <div class="form-group" id="div34" style="display:none">
            {!! Form::label('no34', '34. Fecha probable de parto', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no34', null, ['class' => 'form-control', 'id' => 'no34']) !!}
            </div>
        </div>

        <div class="form-group" id="div35" style="display:none">
            {!! Form::label('no35', '35. Sometida a inseminación', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div36" style="display:none">
            {!! Form::label('no36', '36. Colocación de dispositivo de sincronización', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div37" style="display:none">
            {!! Form::label('no37', '37. Hormonas de sincronización', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div38" style="display:none">
            {!! Form::label('no38', '38. Retiro de dispositivo', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div39" style="display:none">
            {!! Form::label('no39', '39. Inseminación', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div40" style="display:none">
            {!! Form::label('no40', '40. Origen del semen', ['class' => 'form-label']) !!}
            {!! Form::text('no40', null, ['class' => 'form-control', 'id' => 'no40', 'placeholder' => 'Ingrese origen']) !!}
        </div>

        <div class="form-group" id="div41" style="display:none">
            {!! Form::label('no41', '41. Prueba de fertilidad', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div42" style="display:none">
            {!! Form::label('no42', '42. Resultado de conteo', ['class' => 'form-label']) !!}
            {!! Form::text('no42', null, ['class' => 'form-control', 'id' => 'no42', 'placeholder' => 'Ingrese resultado']) !!}
        </div>

        <div class="form-group" id="div43">
            {!! Form::label('no43', '43. Comentarios del manejo', ['class' => 'form-label']) !!}
            {!! Form::textarea('no43', null, ['class' => 'form-control', 'id' => 'no43', 'placeholder' => 'Ingrese comentarios']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGManejo1" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR MANEJO2-->
<div class="modal fade" id="createManejo2Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createManejo2ModalLabel">Nuevo manejo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_manejo2']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_manejo2', null, ['id' => 'empresaid_manejo2']) !!}
        {!! Form::hidden('ganadoid_manejo2', null, ['id' => 'ganadoid_manejo2']) !!}
        {!! Form::hidden('id_manejo2', null, ['id' => 'id_manejo2']) !!}
        
        <div class="form-group" id="div44">
            {!! Form::label('no44', '44. Fecha', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no44', null, ['class' => 'form-control', 'id' => 'no44']) !!}
            </div>
        </div>

        <div class="form-group" id="div45">
            {!! Form::label('no45', '45. Cambio de herraduras', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div46">
            {!! Form::label('no46', '46. Lubricación de cascos', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div47">
            {!! Form::label('no47', '47. Incidentes', ['class' => 'form-label']) !!}
            {!! Form::textarea('no47', null, ['class' => 'form-control', 'id' => 'no47', 'placeholder' => 'Ingrese incidentes']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGManejo2" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
