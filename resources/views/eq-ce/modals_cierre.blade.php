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


<!-- Modal CREAR DOMICILIO-->
<div class="modal fade" id="createDomicilioCiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDomicilioCiModalLabel">Nuevo domicilio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_domicilioci']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_domicilioci', null, ['id' => 'empresaid_domicilioci']) !!}
        {!! Form::hidden('proyectoid_domicilioci', null, ['id' => 'proyectoid_domicilioci']) !!}
        {!! Form::hidden('cierreid_domicilioci', null, ['id' => 'cierreid_domicilioci']) !!}
        {!! Form::hidden('id_domicilioci', null, ['id' => 'id_domicilioci']) !!}
        
        <div class="form-group" id="divc8">
            {!! Form::label('c8', '8. Fecha del cambio de domicilio del archivo de concentración', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('c8', null, ['class' => 'form-control', 'id' => 'c8']) !!}
            </div>
        </div>

        <div class="form-group" id="divc9">
            {!! Form::label('c9', '9. Fecha en que se emite el FC-CE-5.03 Cambio de domicilio', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('c9', null, ['class' => 'form-control', 'id' => 'c9']) !!}
            </div>
        </div>

        <div class="form-group" id="divc10">
            {!! Form::label('c10', '10. Se informó al investigador principal sobre el cambio de domicilio del archivo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('c10', 'Si', null, ['class' => 'mr-1', 'id' => 'c10_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('c10', 'No', null, ['class' => 'mr-1', 'id' => 'c10_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGDomicilioCi" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR ICF-->
<div class="modal fade" id="createICFSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createICFSomModalLabel">Nuevo ICF</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_icfsom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_icfsom', null, ['id' => 'empresaid_icfsom']) !!}
        {!! Form::hidden('proyectoid_icfsom', null, ['id' => 'proyectoid_icfsom']) !!}
        {!! Form::hidden('sometimientoid_icfsom', null, ['id' => 'sometimientoid_icfsom']) !!}
        {!! Form::hidden('fechaid_icfsom', null, ['id' => 'fechaid_icfsom']) !!}
        {!! Form::hidden('id_icfsom', null, ['id' => 'id_icfsom']) !!}
        
        <div class="form-group" id="divs24">
            {!! Form::label('s24', '24. Nombre del ICF', ['class' => 'form-label']) !!}
            {!! Form::textarea('s24', null, ['class' => 'form-control', 'id' => 's24', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divs25">
            {!! Form::label('s25', '25. Idioma', ['class' => 'form-label']) !!}
            {!! Form::select('s25', ['Inglés' => 'Inglés', 'Español' => 'Español'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's25']) !!}
        </div>

        <div class="form-group" id="divs26">
            {!! Form::label('s26', '26. Versión', ['class' => 'form-label']) !!}
            {!! Form::text('s26', null, ['class' => 'form-control', 'id' => 's26', 'placeholder' => 'Ingrese versión']) !!}
        </div>

        <div class="form-group" id="divs27">
            {!! Form::label('s27', '27. Fecha', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s27', null, ['class' => 'form-control', 'id' => 's27']) !!}
            </div>
        </div>

        <div class="form-group" id="divs28">
            {!! Form::label('s28', '28. Corresponde a una enmienda', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s28', 'Si', null, ['class' => 'mr-1', 'id' => 's28_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s28', 'No', null, ['class' => 'mr-1', 'id' => 's28_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGICFSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR MANUAL-->
<div class="modal fade" id="createManualSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createManualSomModalLabel">Nuevo manual</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_manualsom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_manualsom', null, ['id' => 'empresaid_manualsom']) !!}
        {!! Form::hidden('proyectoid_manualsom', null, ['id' => 'proyectoid_manualsom']) !!}
        {!! Form::hidden('sometimientoid_manualsom', null, ['id' => 'sometimientoid_manualsom']) !!}
        {!! Form::hidden('fechaid_manualsom', null, ['id' => 'fechaid_manualsom']) !!}
        {!! Form::hidden('id_manualsom', null, ['id' => 'id_manualsom']) !!}
        
        <div class="form-group" id="divs29">
            {!! Form::label('s29', '29. Idioma', ['class' => 'form-label']) !!}
            {!! Form::select('s29', ['Inglés' => 'Inglés', 'Español' => 'Español'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's29']) !!}
        </div>

        <div class="form-group" id="divs30">
            {!! Form::label('s30', '30. Versión', ['class' => 'form-label']) !!}
            {!! Form::text('s30', null, ['class' => 'form-control', 'id' => 's30', 'placeholder' => 'Ingrese versión']) !!}
        </div>

        <div class="form-group" id="divs31">
            {!! Form::label('s31', '31. Fecha', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s31', null, ['class' => 'form-control', 'id' => 's31']) !!}
            </div>
        </div>

        <div class="form-group" id="divs32">
            {!! Form::label('s32', '32. Corresponde a una enmienda', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s32', 'Si', null, ['class' => 'mr-1', 'id' => 's32_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s32', 'No', null, ['class' => 'mr-1', 'id' => 's32_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGManualSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR POLIZA-->
<div class="modal fade" id="createPolizaSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPolizaSomModalLabel">Nueva póliza</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_polizasom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_polizasom', null, ['id' => 'empresaid_polizasom']) !!}
        {!! Form::hidden('proyectoid_polizasom', null, ['id' => 'proyectoid_polizasom']) !!}
        {!! Form::hidden('sometimientoid_polizasom', null, ['id' => 'sometimientoid_polizasom']) !!}
        {!! Form::hidden('fechaid_polizasom', null, ['id' => 'fechaid_polizasom']) !!}
        {!! Form::hidden('id_polizasom', null, ['id' => 'id_polizasom']) !!}
        
        <div class="form-group" id="divs33">
            {!! Form::label('s33', '33. Vigencia de la Póliza de seguro', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s33', null, ['class' => 'form-control', 'id' => 's33']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPolizaSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR DESVIACIONES-->
<div class="modal fade" id="createDesviacionSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDesviacionSomModalLabel">Nueva desviación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_desviacionsom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_desviacionsom', null, ['id' => 'empresaid_desviacionsom']) !!}
        {!! Form::hidden('proyectoid_desviacionsom', null, ['id' => 'proyectoid_desviacionsom']) !!}
        {!! Form::hidden('sometimientoid_desviacionsom', null, ['id' => 'sometimientoid_desviacionsom']) !!}
        {!! Form::hidden('fechaid_desviacionsom', null, ['id' => 'fechaid_desviacionsom']) !!}
        {!! Form::hidden('id_desviacionsom', null, ['id' => 'id_desviacionsom']) !!}
        
        <div class="form-group" id="divs34">
            {!! Form::label('s34', '34. Fecha en que sucedió la desviación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s34', null, ['class' => 'form-control', 'id' => 's34']) !!}
            </div>
        </div>

        <div class="form-group" id="divs35">
            {!! Form::label('s35', '35. Descripción de la desviación', ['class' => 'form-label']) !!}
            {!! Form::textarea('s35', null, ['class' => 'form-control', 'id' => 's35', 'placeholder' => 'Ingrese descripción']) !!}
        </div>

        <div class="form-group" id="divs36">
            {!! Form::label('s36', '36. El tiempo entre la fecha en que sucedió la desviación y la Fecha de sometimiento es menor a 30 días', ['class' => 'form-label']) !!}
            {!! Form::text('s36', null, ['class' => 'form-control', 'id' => 's36', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGDesviacionSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR EAS-->
<div class="modal fade" id="createEASSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEASSomModalLabel">Nuevo EAS</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_eassom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_eassom', null, ['id' => 'empresaid_eassom']) !!}
        {!! Form::hidden('proyectoid_eassom', null, ['id' => 'proyectoid_eassom']) !!}
        {!! Form::hidden('sometimientoid_eassom', null, ['id' => 'sometimientoid_eassom']) !!}
        {!! Form::hidden('fechaid_eassom', null, ['id' => 'fechaid_eassom']) !!}
        {!! Form::hidden('id_eassom', null, ['id' => 'id_eassom']) !!}
        
        <div class="form-group" id="divs37">
            {!! Form::label('s37', '37. Tipo de reporte del EAS', ['class' => 'form-label']) !!}
            {!! Form::select('s37', ['Inicial' => 'Inicial', 'Seguimiento' => 'Seguimiento'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's37']) !!}
        </div>
        
        <div class="form-group" id="divs38">
            {!! Form::label('s38', '38. Patología del EAS', ['class' => 'form-label']) !!}
            {!! Form::text('s38', null, ['class' => 'form-control', 'id' => 's38', 'placeholder' => 'Ingrese patología']) !!}
        </div>
        
        <div class="form-group" id="divs39">
            {!! Form::label('s39', '39. Fecha en que sucedió el EAS ', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s39', null, ['class' => 'form-control', 'id' => 's39']) !!}
            </div>
        </div>

        <div class="form-group" id="divs40">
            {!! Form::label('s40', '40. El tiempo entre la Fecha de sometimiento y la fecha en que sucedió el EAS inicial es menor a 7 días', ['class' => 'form-label']) !!}
            {!! Form::text('s40', null, ['class' => 'form-control', 'id' => 's40', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEASSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR SUSAR-->
<div class="modal fade" id="createSUSARSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSUSARSomModalLabel">Nuevo SUSAR</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_susarsom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_susarsom', null, ['id' => 'empresaid_susarsom']) !!}
        {!! Form::hidden('proyectoid_susarsom', null, ['id' => 'proyectoid_susarsom']) !!}
        {!! Form::hidden('sometimientoid_susarsom', null, ['id' => 'sometimientoid_susarsom']) !!}
        {!! Form::hidden('fechaid_susarsom', null, ['id' => 'fechaid_susarsom']) !!}
        {!! Form::hidden('id_susarsom', null, ['id' => 'id_susarsom']) !!}
        
        <div class="form-group" id="divs41">
            {!! Form::label('s41', '41. Tipo de reporte del SUSAR', ['class' => 'form-label']) !!}
            {!! Form::select('s41', ['Inicial' => 'Inicial', 'Seguimiento' => 'Seguimiento'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's41']) !!}
        </div>
        
        <div class="form-group" id="divs42">
            {!! Form::label('s42', '42. Patología del SUSAR', ['class' => 'form-label']) !!}
            {!! Form::text('s42', null, ['class' => 'form-control', 'id' => 's42', 'placeholder' => 'Ingrese patología']) !!}
        </div>
        
        <div class="form-group" id="divs43">
            {!! Form::label('s43', '43. Número de reporte de SUSAR', ['class' => 'form-label']) !!}
            {!! Form::text('s43', null, ['class' => 'form-control', 'id' => 's43', 'placeholder' => 'Ingrese número']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSUSARSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR RENOVACION-->
<div class="modal fade" id="createRenovacionSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRenovacionSomModalLabel">Nueva renovación</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_renovacionsom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_renovacionsom', null, ['id' => 'empresaid_renovacionsom']) !!}
        {!! Form::hidden('proyectoid_renovacionsom', null, ['id' => 'proyectoid_renovacionsom']) !!}
        {!! Form::hidden('sometimientoid_renovacionsom', null, ['id' => 'sometimientoid_renovacionsom']) !!}
        {!! Form::hidden('fechaid_renovacionsom', null, ['id' => 'fechaid_renovacionsom']) !!}
        {!! Form::hidden('id_renovacionsom', null, ['id' => 'id_renovacionsom']) !!}
        
        <div class="form-group" id="divs44">
            {!! Form::label('s44', '44. Somete informe anual del estudio', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s44', 'Si', null, ['class' => 'mr-1', 'id' => 's44_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s44', 'No', null, ['class' => 'mr-1', 'id' => 's44_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRenovacionSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR ERRATAS-->
<div class="modal fade" id="createErratasSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createErratasSomModalLabel">Nueva fe de erratas</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_erratassom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_erratassom', null, ['id' => 'empresaid_erratassom']) !!}
        {!! Form::hidden('proyectoid_erratassom', null, ['id' => 'proyectoid_erratassom']) !!}
        {!! Form::hidden('sometimientoid_erratassom', null, ['id' => 'sometimientoid_erratassom']) !!}
        {!! Form::hidden('fechaid_erratassom', null, ['id' => 'fechaid_erratassom']) !!}
        {!! Form::hidden('id_erratassom', null, ['id' => 'id_erratassom']) !!}
        
        <div class="form-group" id="divs45">
            {!! Form::label('s45', '45. Documento que se corrige', ['class' => 'form-label']) !!}
            {!! Form::text('s45', null, ['class' => 'form-control', 'id' => 's45', 'placeholder' => 'Ingrese documento']) !!}
        </div>

        <div class="form-group" id="divs46">
            {!! Form::label('s46', '46. Información correcta', ['class' => 'form-label']) !!}
            {!! Form::textarea('s46', null, ['class' => 'form-control', 'id' => 's46', 'placeholder' => 'Ingrese información']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGErratasSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR COPIAS-->
<div class="modal fade" id="createCopiasSomModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCopiasSomModalLabel">Nuevo envío de documentos</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_copiassom']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_copiassom', null, ['id' => 'empresaid_copiassom']) !!}
        {!! Form::hidden('proyectoid_copiassom', null, ['id' => 'proyectoid_copiassom']) !!}
        {!! Form::hidden('sometimientoid_copiassom', null, ['id' => 'sometimientoid_copiassom']) !!}
        {!! Form::hidden('id_copiassom', null, ['id' => 'id_copiassom']) !!}
        
        <div class="form-group" id="divs47">
            {!! Form::label('s47', '1. Fecha en que se enviaron los documentos físicos', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s47', null, ['class' => 'form-control', 'id' => 's47']) !!}
            </div>
        </div>

        <div class="form-group" id="divs48">
            {!! Form::label('s48', '2. Nombre del miembro del comité a quien se enviaron documentos físicos', ['class' => 'form-label']) !!}
            {!! Form::hidden('s48', null, ['class' => 'form-control', 'id' => 's48']) !!}
            <table class="table table-striped" style="width:100%;">
              <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
              </tr>
              @foreach ($miembros as $miembro)
                <tr>
                  <td><input type="checkbox" name="miembros[]" id="miem{{$miembro->integracion_id}}" value="{{$miembro->integracion_id}}"></input></td>
                  <td>{{$miembro->i1}}</td>
                </tr>
              @endforeach
            </table>
        </div>

        <div class="form-group" id="divs49">
            {!! Form::label('s49', '3. Nombre del documento que se envió', ['class' => 'form-label']) !!}
            {!! Form::select('s49', ['Protocolo' => 'Protocolo', 'ICF' => 'ICF', 'Manual del investigador' => 'Manual del investigador', 'Aviso de publicidad' => 'Aviso de publicidad', 'Póliza de seguro' => 'Póliza de seguro', 'Otros sometimientos' => 'Otros sometimientos', 'Aviso de desviación' => 'Aviso de desviación', 'Aviso de violación' => 'Aviso de violación', 'Aviso de EAS' => 'Aviso de EAS', 'SUSAR' => 'SUSAR', 'Solicitud de renovación anual' => 'Solicitud de renovación anual', 'Fe de erratas' => 'Fe de erratas', 'Cierre o aviso de terminación' => 'Cierre o aviso de terminación', 'Archivo de concentración' => 'Archivo de concentración'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 's49']) !!}
        </div>

        <div class="form-group" id="divs50">
            {!! Form::label('s50', '4. El documento se verificó antes de enviarlo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('s50', 'Si', null, ['class' => 'mr-1', 'id' => 's50_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('s50', 'No', null, ['class' => 'mr-1', 'id' => 's50_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divs51">
            {!! Form::label('s51', '5. Fecha de devolución de los documentos físicos', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('s51', null, ['class' => 'form-control', 'id' => 's51']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCopiasSom" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>