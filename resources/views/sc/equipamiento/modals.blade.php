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



<!-- Modal CREAR EQUIPAMIENTO-->
<div class="modal fade" id="createEquipamientoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEquipamientoModalLabel">Materiales y Equipamiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_equipamiento']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_equipamiento', null, ['id' => 'empresaid_equipamiento']) !!}
        {!! Form::hidden('proyectoid_equipamiento', null, ['id' => 'proyectoid_equipamiento']) !!}
        {!! Form::hidden('id_equipamiento', null, ['id' => 'id_equipamiento']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group" id="div2">
            {!! Form::label('no2', '2. El termo-higrómetro, que registra la temperatura y humedad ambiental de la Farmacia, funciona adecuadamente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no2', 'Si', null, ['class' => 'mr-1', 'id' => 'no2_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no2', 'No', null, ['class' => 'mr-1', 'id' => 'no2_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div3">
            {!! Form::label('no3', '3. El mobiliario es resistente a los agentes limpiadores', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div4">
            {!! Form::label('no4', '4. Los equipos están en buenas condiciones', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div5">
            {!! Form::label('no5', '5. Todas las gavetas y equipos de almacén pueden cerrarse con llave', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('no5', 'Si', null, ['class' => 'mr-1', 'id' => 'no5_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('no5', 'No', null, ['class' => 'mr-1', 'id' => 'no5_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="div6">
            {!! Form::label('no6', '6. El refrigerador está limpio y ordenado y se utiliza exclusivamente para medicamentos y muestras biológicas', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div7">
            {!! Form::label('no7', '7. El termómetro del refrigerador funciona adecuadamente', ['class' => 'form-label']) !!}
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
            {!! Form::label('no8', '8. El termómetro del refrigerador puede leerse desde el exterior del equipo', ['class' => 'form-label']) !!}
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
            {!! Form::label('no9', '9. El congelador está limpio y ordenado, y se utiliza exclusivamente para medicamentos y muestras biológicas', ['class' => 'form-label']) !!}
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
            {!! Form::label('no10', '10. El termómetro del congelador funciona adecuadamente', ['class' => 'form-label']) !!}
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
            {!! Form::label('no11', '11. El termómetro del congelador puede leerse desde el exterior del equipo', ['class' => 'form-label']) !!}
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

        <div class="form-group" id="div12">
            {!! Form::label('no12', '12. Cada refrigerador y congelador tiene un señalamiento con la leyenda “En caso de falla de energía, NO ABRA LA PUERTA. La temperatura puede mantenerse hasta por 90 minutos.”, impresa en fondo fosforescente, y pegada cerca del candado', ['class' => 'form-label']) !!}
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
        <button type="submit" id="btnGEquipamiento" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

