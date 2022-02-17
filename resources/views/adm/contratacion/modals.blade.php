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



<!-- Modal CREAR CONTRATO-->
<div class="modal fade" id="createContratoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createContratoModalLabel">Nuevo contrato</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_contrato']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_contrato', null, ['id' => 'empresaid_contrato']) !!}
        {!! Form::hidden('candidatoid_contrato', null, ['id' => 'candidatoid_contrato']) !!}
        {!! Form::hidden('contratacionid_contrato', null, ['id' => 'contratacionid_contrato']) !!}
        {!! Form::hidden('id_contrato', null, ['id' => 'id_contrato']) !!}
        
        <div class="form-group">
            {!! Form::label('no1', '1. Fecha de firma del contrato', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no1', null, ['class' => 'form-control', 'id' => 'no1']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no2', '2. Tipo de contrato firmado', ['class' => 'form-label']) !!}
            {!! Form::select('no2', ['Contrato determinado capacitación' => 'Contrato determinado capacitación', 'Contrato determinado obra' => 'Contrato determinado obra', 'Contrato servicios médico' => 'Contrato servicios médico', 'Contrato servicios no médico' => 'Contrato servicios no médico', 'Contrato tiempo indeterminado' => 'Contrato tiempo indeterminado', 'Convenio de servicios' => 'Convenio de servicios', 'Convenio persona moral' => 'Convenio persona moral', 'Aceptación de residente' => 'Aceptación de residente'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'no2']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('no3', '3. Fecha del último día de contrato ', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('no3', null, ['class' => 'form-control', 'id' => 'no3']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('no4', '4. Debe firmar un nuevo contrato', ['class' => 'form-label']) !!}
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGContrato" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


