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



<!-- Modal CREAR PAGO RECIBIDO-->
<div class="modal fade" id="createRecibidoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRecibidoModalLabel">Nuevo pago</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_recibido']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_recibido', null, ['id' => 'empresaid_recibido']) !!}
        {!! Form::hidden('proyectoid_recibido', null, ['id' => 'proyectoid_recibido']) !!}
        {!! Form::hidden('id_recibido', null, ['id' => 'id_recibido']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Número de factura', ['class' => 'form-label']) !!}
            <select name="no1" id="no1" class="form-control" onchange="Precio_Factura(this.value);">
                <option value="0">Seleccione...</option>
            @foreach ($facturas as $factura)
                <option value="{{$factura->id}}">{{ $factura->no12 }}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Fecha efectiva de pago', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no2', null, ['class' => 'form-control', 'id' => 'no2']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Cantidad recibida', ['class' => 'form-label']) !!}
            {!! Form::number('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'no3']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Cuenta bancaria que recibió el pago', ['class' => 'form-label']) !!}
            <select name="no4" id="no4" class="form-control">
                <option value="0">Seleccione...</option>
            @foreach ($cuentas as $cuenta)
                <option value="{{$cuenta->id}}">{{ $cuenta->nombre }} | {{ $cuenta->sucursal }}</option>
            @endforeach
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRecibido" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PAGO REALIZADO-->
<div class="modal fade" id="createRealizadoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRealizadoModalLabel">Nuevo pago</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_realizado']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_realizado', null, ['id' => 'empresaid_realizado']) !!}
        {!! Form::hidden('proyectoid_realizado', null, ['id' => 'proyectoid_realizado']) !!}
        {!! Form::hidden('id_realizado', null, ['id' => 'id_realizado']) !!}
        
        <div class="form-group">
            {!! Form::label('no5', '5. Número de pago', ['class' => 'form-label']) !!}
            {!! Form::number('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0', 'id' => 'no5']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no6', '6. Proveedor', ['class' => 'form-label']) !!}
            <select name="no6" id="no6" class="form-control">
                <option value="0">Seleccione...</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{$proveedor->id}}">{{ $proveedor->no35 }}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('no7', '7. Concepto', ['class' => 'form-label']) !!}
            <select name="no7" id="no7" class="form-control" onchange="Precio_Servicio(70);">
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

        @for ($i = 1; $i <= 30; $i++)
          <div class="form-group" id="div_concepto{{$i}}" style="display:none">
            {!! Form::label('concepto'.$i, 'Concepto', ['class' => 'form-label']) !!}
            <select name="concepto{{$i}}" id="concepto{{$i}}" class="form-control" onchange="Precio_Servicio({{$i}});">
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
        @endfor 

        <button type="button" onclick="Concepto();" id="btn_concepto" class="btn btn-info">Agregar concepto</button>

        <div class="form-group">
            {!! Form::label('no8', '8. Fecha en que se recibe la factura', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no8', null, ['class' => 'form-control', 'id' => 'no8']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no9', '9. Fecha estimada de pago', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no9', null, ['class' => 'form-control', 'id' => 'no9']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no10', '10. Fecha efectiva de pago', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no10', null, ['class' => 'form-control', 'id' => 'no10']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no11', '11. Días de diferimiento', ['class' => 'form-label']) !!}
            {!! Form::number('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese días', 'step' => '0', 'id' => 'no11']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no12', '12. Cantidad pagada', ['class' => 'form-label']) !!}
            {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'id' => 'no12']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no13', '13. Cuenta bancaria de pago', ['class' => 'form-label']) !!}
            {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cuenta', 'id' => 'no13']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRealizado" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
