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
        {!! Form::hidden('proyectoid_visita', null, ['id' => 'proyectoid_visita']) !!}
        {!! Form::hidden('preparacionid_visita', null, ['id' => 'preparacionid_visita']) !!}
        {!! Form::hidden('id_visita', null, ['id' => 'id_visita']) !!}
        
        <div class="form-group">
            {!! Form::label('no22', '22. Nombre de la visita', ['class' => 'form-label']) !!}
            {!! Form::text('no22', null, ['class' => 'form-control', 'id' => 'no22', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no23', '23. Cantidad a cobrar', ['class' => 'form-label']) !!}
            {!! Form::number('no23', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no23']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no24', '24. Moneda de pago', ['class' => 'form-label']) !!}
            {!! Form::select('no24', ['MXN' => 'MXN', 'USD' => 'USD', 'EURO' => 'EURO'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no24']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no25', '25. Actividad por pagar', ['class' => 'form-label']) !!}
            {!! Form::textarea('no25', null, ['class' => 'form-control', 'placeholder' => 'Ingrese actividad', 'id' => 'no25']) !!}
        </div>

        @for ($i = 1; $i <= 30; $i++)
          <div class="form-group" id="div_actividad{{$i}}" style="display:none">
            {!! Form::label('actividad'.$i, 'Actividad por pagar', ['class' => 'form-label']) !!}
            {!! Form::textarea('actividad'.$i, null, ['class' => 'form-control', 'placeholder' => 'Ingrese actividad', 'id' => 'actividad'.$i]) !!}
          </div>
        @endfor
        
        <button type="button" onclick="Actividad();" id="btn_actividad" class="btn btn-info">Agregar actividad</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVisita" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR ESTUDIO-->
<div class="modal fade" id="createEstudioModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEstudioModalLabel">Nuevo estudio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_estudio']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_estudio', null, ['id' => 'empresaid_estudio']) !!}
        {!! Form::hidden('proyectoid_estudio', null, ['id' => 'proyectoid_estudio']) !!}
        {!! Form::hidden('preparacionid_estudio', null, ['id' => 'preparacionid_estudio']) !!}
        {!! Form::hidden('id_estudio', null, ['id' => 'id_estudio']) !!}
        
        <div class="form-group">
            {!! Form::label('no33', '33. Nombre del estudio paraclínico', ['class' => 'form-label']) !!}
            {!! Form::text('no33', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no33']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no34', '34. Pago por el estudio paraclínico', ['class' => 'form-label']) !!}
            {!! Form::number('no34', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no34']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEstudio" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PROVEEDOR-->
<div class="modal fade" id="createProveedorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProveedorModalLabel">Nuevo proveedor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_proveedor']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_proveedor', null, ['id' => 'empresaid_proveedor']) !!}
        {!! Form::hidden('proyectoid_proveedor', null, ['id' => 'proyectoid_proveedor']) !!}
        {!! Form::hidden('preparacionid_proveedor', null, ['id' => 'preparacionid_proveedor']) !!}
        {!! Form::hidden('id_proveedor', null, ['id' => 'id_proveedor']) !!}
        
        <div class="form-group">
            {!! Form::label('no35', '35. Nombre del proveedor', ['class' => 'form-label']) !!}
            {!! Form::text('no35', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'no35']) !!}
        </div>

        <div class="form-group" id="div36">
            {!! Form::label('no36', '36. Llenó tarjeta de contacto del proveedor', ['class' => 'form-label']) !!}
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
            {!! Form::label('no37', '37. Número de contrato', ['class' => 'form-label']) !!}
            {!! Form::text('no37', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'no37']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no38', '38. Fecha de inicio de vigencia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no38', null, ['class' => 'form-control', 'id' => 'no38']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no39', '39. Fecha de fin de vigencia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no39', null, ['class' => 'form-control', 'id' => 'no39']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no40', '40. Documento de sustento', ['class' => 'form-label']) !!}
            {!! Form::text('no40', null, ['class' => 'form-control', 'placeholder' => 'Ingrese documento', 'id' => 'no40']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no41', '41. Servicio contratado', ['class' => 'form-label']) !!}
            <select name="no41" id="no41" class="form-control" onchange="Precios(41);">
                <option value="">Seleccione...</option>
                <option>Referencia de sujetos</option>
                <option>Consentimiento informado</option>
                <option>Historia clínica</option>
                <option>Visita médica</option>
                <option>Contacto telefónico </option>
                <option>Aplicación de tratamiento</option>
                <option>Visita de monitoreo</option>
            @foreach ($estudios as $estudio)
                <option>{{ $estudio->no33 }}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('no42', '42. Precio del servicio', ['class' => 'form-label']) !!}
            {!! Form::number('no42', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no42']) !!}
        </div>

        @for ($i = 1; $i <= 30; $i++)
          <div class="form-group" id="div_servicio{{$i}}" style="display:none">
            {!! Form::label('servicio'.$i, 'Servicio contratado', ['class' => 'form-label']) !!}
            <select name="servicio{{$i}}" id="servicio{{$i}}" class="form-control" onchange="Precios({{$i}});">
                <option value="">Seleccione...</option>
                <option>Referencia de sujetos</option>
                <option>Consentimiento informado</option>
                <option>Historia clínica</option>
                <option>Visita médica</option>
                <option>Contacto telefónico </option>
                <option>Aplicación de tratamiento</option>
                <option>Visita de monitoreo</option>
            @foreach ($estudios as $estudio)
                <option>{{ $estudio->no33 }}</option>
            @endforeach
            </select>
          </div>

          <div class="form-group" id="div_pago{{$i}}" style="display:none">
            {!! Form::label('pago'.$i, 'Precio del servicio', ['class' => 'form-label']) !!}
            {!! Form::number('pago'.$i, null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'pago'.$i]) !!}
          </div>
        @endfor  
        
        <button type="button" onclick="Servicio();" id="btn_servicio" class="btn btn-info">Agregar servicio</button>

        <div class="form-group">
            {!! Form::label('no43', '43. Días de crédito', ['class' => 'form-label']) !!}
            {!! Form::text('no43', null, ['class' => 'form-control', 'placeholder' => 'Ingrese días', 'id' => 'no43']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGProveedor" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>