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


<!-- Modal CREAR INFRAESTRUCTURA-->
<div class="modal fade" id="createInfraestructuraFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createInfraestructuraFarModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_infraestructurafar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_infraestructurafar', null, ['id' => 'empresaid_infraestructurafar']) !!}
        {!! Form::hidden('proyectoid_infraestructurafar', null, ['id' => 'proyectoid_infraestructurafar']) !!}
        {!! Form::hidden('farmaciaid_infraestructurafar', null, ['id' => 'farmaciaid_infraestructurafar']) !!}
        {!! Form::hidden('id_infraestructurafar', null, ['id' => 'id_infraestructurafar']) !!}
        
        <div class="form-group" id="divfar1">
            {!! Form::label('far1', '1. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far1', null, ['class' => 'form-control', 'id' => 'far1']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar2">
            {!! Form::label('far2', '2. Existe un rótulo de área libre de humo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far2', 'Si', null, ['class' => 'mr-1', 'id' => 'far2_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far2', 'No', null, ['class' => 'mr-1', 'id' => 'far2_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar3">
            {!! Form::label('far3', '3. Existe un rótulo de Acceso restringido', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far3', 'Si', null, ['class' => 'mr-1', 'id' => 'far3_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far3', 'No', null, ['class' => 'mr-1', 'id' => 'far3_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar4">
            {!! Form::label('far4', '4. Existe un rótulo de identificación de Farmacia, con el nombre del Responsable Sanitario, su número de cédula profesional, el nombre de la institución que expidió su título profesional y el horario de trabajo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far4', 'Si', null, ['class' => 'mr-1', 'id' => 'far4_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far4', 'No', null, ['class' => 'mr-1', 'id' => 'far4_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar5">
            {!! Form::label('far5', '5. Existen mecanismos de restricción de acceso a la Farmacia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far5', 'Si', null, ['class' => 'mr-1', 'id' => 'far5_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far5', 'No', null, ['class' => 'mr-1', 'id' => 'far5_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar6">
            {!! Form::label('far6', '6. Las paredes, pisos y techos son lisos y de fácil limpieza', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far6', 'Si', null, ['class' => 'mr-1', 'id' => 'far6_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far6', 'No', null, ['class' => 'mr-1', 'id' => 'far6_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar7">
            {!! Form::label('far7', '7. Las paredes, pisos y techos están en óptimas condiciones', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far7', 'Si', null, ['class' => 'mr-1', 'id' => 'far7_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far7', 'No', null, ['class' => 'mr-1', 'id' => 'far7_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar8">
            {!! Form::label('far8', '8. Existe ventilación natural o artificial suficiente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far8', 'Si', null, ['class' => 'mr-1', 'id' => 'far8_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far8', 'No', null, ['class' => 'mr-1', 'id' => 'far8_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar9">
            {!! Form::label('far9', '9. La instalación eléctrica está protegida', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far9', 'Si', null, ['class' => 'mr-1', 'id' => 'far9_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far9', 'No', null, ['class' => 'mr-1', 'id' => 'far9_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar10">
            {!! Form::label('far10', '10. Los sanitarios tienen agua corriente, lavabo, jabón, un sistema de secado de manos, un cesto de basura con tapa y un letrero alusivo al lavado de manos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far10', 'Si', null, ['class' => 'mr-1', 'id' => 'far10_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far10', 'No', null, ['class' => 'mr-1', 'id' => 'far10_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGInfraestructuraFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR MATERIALES-->
<div class="modal fade" id="createMaterialesFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createMaterialesFarModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_materialesfar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_materialesfar', null, ['id' => 'empresaid_materialesfar']) !!}
        {!! Form::hidden('proyectoid_materialesfar', null, ['id' => 'proyectoid_materialesfar']) !!}
        {!! Form::hidden('farmaciaid_materialesfar', null, ['id' => 'farmaciaid_materialesfar']) !!}
        {!! Form::hidden('id_materialesfar', null, ['id' => 'id_materialesfar']) !!}
        
        <div class="form-group" id="divfar11">
            {!! Form::label('far11', '1. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far11', null, ['class' => 'form-control', 'id' => 'far11']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar12">
            {!! Form::label('far12', '2. Existe un lugar destinado y señalado para el almacén del medicamento devuelto, utilizado o caduco', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far12', 'Si', null, ['class' => 'mr-1', 'id' => 'far12_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far12', 'No', null, ['class' => 'mr-1', 'id' => 'far12_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar13">
            {!! Form::label('far13', '3. El termo-higrómetro, que registra la temperatura y humedad ambiental de la Farmacia, tiene calibración vigente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far13', 'Si', null, ['class' => 'mr-1', 'id' => 'far13_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far13', 'No', null, ['class' => 'mr-1', 'id' => 'far13_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar14">
            {!! Form::label('far14', '4. Espátula para conteo de tabletas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far14', 'Si', null, ['class' => 'mr-1', 'id' => 'far14_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far14', 'No', null, ['class' => 'mr-1', 'id' => 'far14_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar15">
            {!! Form::label('far15', '5. Báscula para pesar los líquidos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far15', 'Si', null, ['class' => 'mr-1', 'id' => 'far15_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far15', 'No', null, ['class' => 'mr-1', 'id' => 'far15_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar16">
            {!! Form::label('far16', '6. Bolsas de plástico transparente, para entrega de medicamentos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far16', 'Si', null, ['class' => 'mr-1', 'id' => 'far16_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far16', 'No', null, ['class' => 'mr-1', 'id' => 'far16_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar17">
            {!! Form::label('far17', '7. Sello fechador', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far17', 'Si', null, ['class' => 'mr-1', 'id' => 'far17_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far17', 'No', null, ['class' => 'mr-1', 'id' => 'far17_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar18">
            {!! Form::label('far18', '8. Tres libros de control para medicamentos del Grupo I, II y III', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far18', 'Si', null, ['class' => 'mr-1', 'id' => 'far18_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far18', 'No', null, ['class' => 'mr-1', 'id' => 'far18_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar19">
            {!! Form::label('far19', '9. Copia actualizada de la Ley General de Salud', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far19', 'Si', null, ['class' => 'mr-1', 'id' => 'far19_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far19', 'No', null, ['class' => 'mr-1', 'id' => 'far19_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar20">
            {!! Form::label('far20', '10. Copia actualizada de la farmacopea de los Estados Unidos Mexicanos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far20', 'Si', null, ['class' => 'mr-1', 'id' => 'far20_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far20', 'No', null, ['class' => 'mr-1', 'id' => 'far20_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar21">
            {!! Form::label('far21', '11. Programa de capacitación disponible para los Farmacistas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far21', 'Si', null, ['class' => 'mr-1', 'id' => 'far21_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far21', 'No', null, ['class' => 'mr-1', 'id' => 'far21_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGMaterialesFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR FARMACISTAS-->
<div class="modal fade" id="createFarmacistaFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFarmacistaFarModalLabel">Nuevo farmacista</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_farmacistafar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_farmacistafar', null, ['id' => 'empresaid_farmacistafar']) !!}
        {!! Form::hidden('proyectoid_farmacistafar', null, ['id' => 'proyectoid_farmacistafar']) !!}
        {!! Form::hidden('farmaciaid_farmacistafar', null, ['id' => 'farmaciaid_farmacistafar']) !!}
        {!! Form::hidden('id_farmacistafar', null, ['id' => 'id_farmacistafar']) !!}
        
        <div class="form-group" id="divfar38">
            {!! Form::label('far38', '1. Nombre del Farmacista', ['class' => 'form-label']) !!}
            {!! Form::text('far38', null, ['class' => 'form-control', 'id' => 'far38', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divfar39">
            {!! Form::label('far39', '2. Fecha de inicio de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far39', null, ['class' => 'form-control', 'id' => 'far39']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar40">
            {!! Form::label('far40', '3. Integrar la Carpeta de control de la Farmacia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far40', 'Si', null, ['class' => 'mr-1', 'id' => 'far40_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far40', 'No', null, ['class' => 'mr-1', 'id' => 'far40_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar41">
            {!! Form::label('far41', '4. Verificar el cumplimiento normativo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far41', 'Si', null, ['class' => 'mr-1', 'id' => 'far41_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far41', 'No', null, ['class' => 'mr-1', 'id' => 'far41_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar42">
            {!! Form::label('far42', '5. Realizar el control diario de temperatura', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far42', 'Si', null, ['class' => 'mr-1', 'id' => 'far42_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far42', 'No', null, ['class' => 'mr-1', 'id' => 'far42_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar43">
            {!! Form::label('far43', '6. Recibir, controlar y dispensar el producto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far43', 'Si', null, ['class' => 'mr-1', 'id' => 'far43_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far43', 'No', null, ['class' => 'mr-1', 'id' => 'far43_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar44">
            {!! Form::label('far44', '7. Realizar auditorías', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far44', 'Si', null, ['class' => 'mr-1', 'id' => 'far44_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far44', 'No', null, ['class' => 'mr-1', 'id' => 'far44_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar45">
            {!! Form::label('far45', '8. Atender visitas de verificación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far45', 'Si', null, ['class' => 'mr-1', 'id' => 'far45_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far45', 'No', null, ['class' => 'mr-1', 'id' => 'far45_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar46">
            {!! Form::label('far46', '9. Fecha de firma de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far46', null, ['class' => 'form-control', 'id' => 'far46']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar47">
            {!! Form::label('far47', '10. Fecha de capacitación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far47', null, ['class' => 'form-control', 'id' => 'far47']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar48">
            {!! Form::label('far48', '11. Fecha de fin de responsabilidades', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far48', null, ['class' => 'form-control', 'id' => 'far48']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFarmacistaFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CONTROL-->
<div class="modal fade" id="createControlFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createControlFarModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_controlfar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_controlfar', null, ['id' => 'empresaid_controlfar']) !!}
        {!! Form::hidden('proyectoid_controlfar', null, ['id' => 'proyectoid_controlfar']) !!}
        {!! Form::hidden('farmaciaid_controlfar', null, ['id' => 'farmaciaid_controlfar']) !!}
        {!! Form::hidden('id_controlfar', null, ['id' => 'id_controlfar']) !!}
        
        <div class="form-group" id="divfar49">
            {!! Form::label('far49', '12. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far49', null, ['class' => 'form-control', 'id' => 'far49']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar50">
            {!! Form::label('far50', '13. Se identifica con FC Carpeta Farmacia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far50', 'Si', null, ['class' => 'mr-1', 'id' => 'far50_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far50', 'No', null, ['class' => 'mr-1', 'id' => 'far50_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar51">
            {!! Form::label('far51', '14. Almacena medicamentos controlados o productos de origen biológico', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far51', 'Si', null, ['class' => 'mr-1', 'id' => 'far51_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far51', 'No', null, ['class' => 'mr-1', 'id' => 'far51_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar52">
            {!! Form::label('far52', '15. Contiene copia del Aviso de funcionamiento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far52', 'Si', null, ['class' => 'mr-1', 'id' => 'far52_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far52', 'No', null, ['class' => 'mr-1', 'id' => 'far52_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar53">
            {!! Form::label('far53', '16. Contiene copia de la Licencia sanitaria', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far53', 'Si', null, ['class' => 'mr-1', 'id' => 'far53_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far53', 'No', null, ['class' => 'mr-1', 'id' => 'far53_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar54">
            {!! Form::label('far54', '17. FC Responsabilidades Farmacia, lleno y firmado por Responsable Sanitario y Farmacistas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far54', 'Si', null, ['class' => 'mr-1', 'id' => 'far54_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far54', 'No', null, ['class' => 'mr-1', 'id' => 'far54_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar55">
            {!! Form::label('far55', '18. Contiene una copia del FC Organigrama de Farmacia, fechada y firmada por el Responsable Sanitario', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far55', 'Si', null, ['class' => 'mr-1', 'id' => 'far55_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far55', 'No', null, ['class' => 'mr-1', 'id' => 'far55_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar56">
            {!! Form::label('far56', '19. Contiene copia del FC Croquis de Farmacia, fechada y firmada por el Responsable Sanitario', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far56', 'Si', null, ['class' => 'mr-1', 'id' => 'far56_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far56', 'No', null, ['class' => 'mr-1', 'id' => 'far56_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar57">
            {!! Form::label('far57', '20. IT Farmacia, fechado y firmado por Responsable Sanitario en Portada (OJO)', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far57', 'Si', null, ['class' => 'mr-1', 'id' => 'far57_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far57', 'No', null, ['class' => 'mr-1', 'id' => 'far57_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar58">
            {!! Form::label('far58', '21. PNOs Farmacia', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far58', 'Si', null, ['class' => 'mr-1', 'id' => 'far58_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far58', 'No', null, ['class' => 'mr-1', 'id' => 'far58_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar59">
            {!! Form::label('far59', '22. Evidencias documentales de cumplimiento del programa de capacitación de todo el personal (constancias, calificaciones de cada examen escrito) ', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far59', 'Si', null, ['class' => 'mr-1', 'id' => 'far59_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far59', 'No', null, ['class' => 'mr-1', 'id' => 'far59_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar60">
            {!! Form::label('far60', '23. Todos los Farmacistas cumplen el programa anual de capacitación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far60', 'Si', null, ['class' => 'mr-1', 'id' => 'far60_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far60', 'No', null, ['class' => 'mr-1', 'id' => 'far60_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar61">
            {!! Form::label('far61', '24. Facturas o documentos que amparen la posesión legal de los medicamentos o insumos almacenados', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far61', 'Si', null, ['class' => 'mr-1', 'id' => 'far61_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far61', 'No', null, ['class' => 'mr-1', 'id' => 'far61_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar62">
            {!! Form::label('far62', '25. Recetas de antibióticos, medicamentos controlados y estupefacientes dispensados', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far62', 'Si', null, ['class' => 'mr-1', 'id' => 'far62_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far62', 'No', null, ['class' => 'mr-1', 'id' => 'far62_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar63">
            {!! Form::label('far63', '26. Cumplimiento del programa de control de fauna nociva, junto con una copia del Registro sanitario de productos utilizados', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far63', 'Si', null, ['class' => 'mr-1', 'id' => 'far63_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far63', 'No', null, ['class' => 'mr-1', 'id' => 'far63_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar64">
            {!! Form::label('far64', '27. Licencia Sanitaria del proveedor de control de la fauna nociva', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far64', 'Si', null, ['class' => 'mr-1', 'id' => 'far64_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far64', 'No', null, ['class' => 'mr-1', 'id' => 'far64_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar65">
            {!! Form::label('far65', '28. Órdenes de visitas de verificación sanitaria recibidas, con su acta correspondiente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far65', 'Si', null, ['class' => 'mr-1', 'id' => 'far65_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far65', 'No', null, ['class' => 'mr-1', 'id' => 'far65_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar66">
            {!! Form::label('far66', '29. Avisos de previsiones para farmacias, de compra-venta de estupefacientes y de medicamentos que requieren receta o permiso especial, con fecha y firma del Responsable Sanitario', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far66', 'Si', null, ['class' => 'mr-1', 'id' => 'far66_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far66', 'No', null, ['class' => 'mr-1', 'id' => 'far66_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGControlFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR TRAMITE-->
<div class="modal fade" id="createTramiteFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTramiteFarModalLabel">Nuevo trámite</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_tramitefar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_tramitefar', null, ['id' => 'empresaid_tramitefar']) !!}
        {!! Form::hidden('proyectoid_tramitefar', null, ['id' => 'proyectoid_tramitefar']) !!}
        {!! Form::hidden('farmaciaid_tramitefar', null, ['id' => 'farmaciaid_tramitefar']) !!}
        {!! Form::hidden('id_tramitefar', null, ['id' => 'id_tramitefar']) !!}
        
        <div class="form-group" id="divfar67">
            {!! Form::label('far67', '30. Nombre del trámite', ['class' => 'form-label']) !!}
            {!! Form::select('far67', ['Notificación o registro' => 'Notificación o registro', 'Entrega de recetas de medicamentos controlados' => 'Entrega de recetas de medicamentos controlados', 'Informe anual de actividades CE' => 'Informe anual de actividades CE', 'Respuesta a observaciones' => 'Respuesta a observaciones'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far67']) !!}
        </div>

        <div class="form-group" id="divfar68">
            {!! Form::label('far68', '31. Fecha de entrada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far68', null, ['class' => 'form-control', 'id' => 'far68']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar69">
            {!! Form::label('far69', '32. Requiere respuesta', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far69', 'Si', null, ['class' => 'mr-1', 'id' => 'far69_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far69', 'No', null, ['class' => 'mr-1', 'id' => 'far69_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar70">
            {!! Form::label('far70', '33. Fecha de respuesta', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far70', null, ['class' => 'form-control', 'id' => 'far70']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGTramiteFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR VISITA-->
<div class="modal fade" id="createVisitaFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createVisitaFarModalLabel">Nueva visita</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_visitafar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_visitafar', null, ['id' => 'empresaid_visitafar']) !!}
        {!! Form::hidden('proyectoid_visitafar', null, ['id' => 'proyectoid_visitafar']) !!}
        {!! Form::hidden('farmaciaid_visitafar', null, ['id' => 'farmaciaid_visitafar']) !!}
        {!! Form::hidden('id_visitafar', null, ['id' => 'id_visitafar']) !!}
        
        <div class="form-group" id="divfar71">
            {!! Form::label('far71', '34. Fecha en que se recibe una visita de verificación', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far71', null, ['class' => 'form-control', 'id' => 'far71']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar72">
            {!! Form::label('far72', '35. Observación recibida y Fecha en que se resuelve la observación recibida', ['class' => 'form-label']) !!}
            {!! Form::textarea('far72', null, ['class' => 'form-control', 'placeholder' => 'Ingrese observaciones y fecha', 'id' => 'far72']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGVisitaFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR QUEJA-->
<div class="modal fade" id="createQuejaFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createQuejaFarModalLabel">Nueva queja</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_quejafar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_quejafar', null, ['id' => 'empresaid_quejafar']) !!}
        {!! Form::hidden('proyectoid_quejafar', null, ['id' => 'proyectoid_quejafar']) !!}
        {!! Form::hidden('farmaciaid_quejafar', null, ['id' => 'farmaciaid_quejafar']) !!}
        {!! Form::hidden('id_quejafar', null, ['id' => 'id_quejafar']) !!}
        
        <div class="form-group" id="divfar73">
            {!! Form::label('far73', '36. Fecha de la queja', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far73', null, ['class' => 'form-control', 'id' => 'far73']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar74">
            {!! Form::label('far74', '37. Motivo de la queja', ['class' => 'form-label']) !!}
            {!! Form::textarea('far74', null, ['class' => 'form-control', 'placeholder' => 'Ingrese motivo', 'id' => 'far74']) !!}
        </div>

        <div class="form-group" id="divfar75">
            {!! Form::label('far75', '38. Fecha de atención de la queja ', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far75', null, ['class' => 'form-control', 'id' => 'far75']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGQuejaFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR SEGURIDAD-->
<div class="modal fade" id="createSeguridadFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createSeguridadFarModalLabel">Nueva revisión</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_seguridadfar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_seguridadfar', null, ['id' => 'empresaid_seguridadfar']) !!}
        {!! Form::hidden('proyectoid_seguridadfar', null, ['id' => 'proyectoid_seguridadfar']) !!}
        {!! Form::hidden('farmaciaid_seguridadfar', null, ['id' => 'farmaciaid_seguridadfar']) !!}
        {!! Form::hidden('id_seguridadfar', null, ['id' => 'id_seguridadfar']) !!}
        
        <div class="form-group" id="divfar76">
            {!! Form::label('far76', '1. Fecha de revisión', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far76', null, ['class' => 'form-control', 'id' => 'far76']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar77">
            {!! Form::label('far77', '2. Protocolo Prueba de seguridad pegado en un lugar visible', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far77', 'Si', null, ['class' => 'mr-1', 'id' => 'far77_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far77', 'No', null, ['class' => 'mr-1', 'id' => 'far77_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar78">
            {!! Form::label('far78', '3. Protocolo de falla eléctrica pegado en un lugar visible', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far78', 'Si', null, ['class' => 'mr-1', 'id' => 'far78_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far78', 'No', null, ['class' => 'mr-1', 'id' => 'far78_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar79">
            {!! Form::label('far79', '4. Recepción de Red fría pegado en un lugar visible', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far79', 'Si', null, ['class' => 'mr-1', 'id' => 'far79_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far79', 'No', null, ['class' => 'mr-1', 'id' => 'far79_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar80">
            {!! Form::label('far80', '5. Protocolo Cadena de frio, pegado en un lugar visible', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far80', 'Si', null, ['class' => 'mr-1', 'id' => 'far80_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far80', 'No', null, ['class' => 'mr-1', 'id' => 'far80_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar81">
            {!! Form::label('far81', '6. En la Farmacia existe una extensión eléctrica de al menos 20 metros, para el Protocolo de falla eléctrica', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far81', 'Si', null, ['class' => 'mr-1', 'id' => 'far81_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far81', 'No', null, ['class' => 'mr-1', 'id' => 'far81_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar82">
            {!! Form::label('far82', '7. Fecha en que se probó la planta de respaldo eléctrico', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far82', null, ['class' => 'form-control', 'id' => 'far82']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar83">
            {!! Form::label('far83', '8. La planta de respaldo eléctrico funciona adecuadamente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far83', 'Si', null, ['class' => 'mr-1', 'id' => 'far83_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far83', 'No', null, ['class' => 'mr-1', 'id' => 'far83_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar84">
            {!! Form::label('far84', '9. Fecha en que se probó la alarma de Farmacia', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far84', null, ['class' => 'form-control', 'id' => 'far84']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar85">
            {!! Form::label('far85', '10. La alarma de Farmacia funciona adecuadamente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far85', 'Si', null, ['class' => 'mr-1', 'id' => 'far85_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far85', 'No', null, ['class' => 'mr-1', 'id' => 'far85_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGSeguridadFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CADENA-->
<div class="modal fade" id="createCadenaFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCadenaFarModalLabel">Nueva cadena de frío</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cadenafar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_cadenafar', null, ['id' => 'empresaid_cadenafar']) !!}
        {!! Form::hidden('proyectoid_cadenafar', null, ['id' => 'proyectoid_cadenafar']) !!}
        {!! Form::hidden('farmaciaid_cadenafar', null, ['id' => 'farmaciaid_cadenafar']) !!}
        {!! Form::hidden('id_cadenafar', null, ['id' => 'id_cadenafar']) !!}
        
        <div class="form-group" id="divfar86">
            {!! Form::label('far86', '11. Fecha en que se montó la Cadena de frío', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far86', null, ['class' => 'form-control', 'id' => 'far86']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar87">
            {!! Form::label('far87', '12. Hubo desviaciones de temperatura durante la cadena de frío', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far87', 'Si', null, ['class' => 'mr-1', 'id' => 'far87_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far87', 'No', null, ['class' => 'mr-1', 'id' => 'far87_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar88">
            {!! Form::label('far88', '13. Responsable de la cadena de frío', ['class' => 'form-label']) !!}
            {!! Form::select('far88', $empleados, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far88']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCadenaFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR RECEPCION-->
<div class="modal fade" id="createRecepcionFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createRecepcionFarModalLabel">Nueva recepción</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_recepcionfar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_recepcionfar', null, ['id' => 'empresaid_recepcionfar']) !!}
        {!! Form::hidden('proyectoid_recepcionfar', null, ['id' => 'proyectoid_recepcionfar']) !!}
        {!! Form::hidden('farmaciaid_recepcionfar', null, ['id' => 'farmaciaid_recepcionfar']) !!}
        {!! Form::hidden('id_recepcionfar', null, ['id' => 'id_recepcionfar']) !!}
        
        <div class="form-group" id="divfar89">
            {!! Form::label('far89', '1. Fecha de recepción', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far89', null, ['class' => 'form-control', 'id' => 'far89']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar90">
            {!! Form::label('far90', '2. Se recibió el paquete en buenas condiciones', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far90', 'Si', null, ['class' => 'mr-1', 'id' => 'far90_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far90', 'No', null, ['class' => 'mr-1', 'id' => 'far90_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar91">
            {!! Form::label('far91', '3. Especifique las alteraciones', ['class' => 'form-label']) !!}
            {!! Form::textarea('far91', null, ['class' => 'form-control', 'id' => 'far91', 'placeholder' => 'Ingrese alteraciones']) !!}
        </div>

        <div class="form-group" id="divfar92">
            {!! Form::label('far92', '4. Fecha en que se confirmó de recibido', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far92', null, ['class' => 'form-control', 'id' => 'far92']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar93">
            {!! Form::label('far93', '5. Se archivó el comprobante de recepción en el expediente de la investigación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far93', 'Si', null, ['class' => 'mr-1', 'id' => 'far93_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far93', 'No', null, ['class' => 'mr-1', 'id' => 'far93_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar94">
            {!! Form::label('far94', '6. Tipo de producto que se recibe', ['class' => 'form-label']) !!}
            {!! Form::select('far94', ['Medicamento o producto de investigación' => 'Medicamento o producto de investigación', 'Materiales' => 'Materiales', 'Equipos' => 'Equipos'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far94']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGRecepcionFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PRODUCTO-->
<div class="modal fade" id="createProductoFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProductoFarModalLabel">Nuevo producto</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_productofar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_productofar', null, ['id' => 'empresaid_productofar']) !!}
        {!! Form::hidden('proyectoid_productofar', null, ['id' => 'proyectoid_productofar']) !!}
        {!! Form::hidden('farmaciaid_productofar', null, ['id' => 'farmaciaid_productofar']) !!}
        {!! Form::hidden('id_productofar', null, ['id' => 'id_productofar']) !!}
        
        <div class="form-group" id="divfar95">
            {!! Form::label('far95', 'Fecha de recepción', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far95', null, ['class' => 'form-control', 'id' => 'far95', 'readonly' => 'readonly']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar96">
            {!! Form::label('far96', '7. Nombre genérico', ['class' => 'form-label']) !!}
            {!! Form::text('far96', null, ['class' => 'form-control', 'id' => 'far96', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divfar97">
            {!! Form::label('far97', '8. Nombre comercial', ['class' => 'form-label']) !!}
            {!! Form::text('far97', null, ['class' => 'form-control', 'id' => 'far97', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divfar98">
            {!! Form::label('far98', '9. Forma farmacéutica', ['class' => 'form-label']) !!}
            {!! Form::select('far98', ['Aerosol' => 'Aerosol', 'Cápsula' => 'Cápsula', 'Colirio – clara y solamente para uso ocular' => 'Colirio – clara y solamente para uso ocular', 'Crema' => 'Crema', 'Elíxir – solución hidro-alcohólica' => 'Elíxir – solución hidro-alcohólica', 'Emulsión – sistema heterogéneo de dos líquidos para uso inyectable' => 'Emulsión – sistema heterogéneo de dos líquidos para uso inyectable', 'Espuma' => 'Espuma', 'Gel' => 'Gel', 'Goma de mascar' => 'Goma de mascar', 'Granulado' => 'Granulado', 'Implante' => 'Implante', 'Jalea' => 'Jalea', 'Jarabe – solución con alta concentración de carbohidratos' => 'Jarabe – solución con alta concentración de carbohidratos', 'Laminilla' => 'Laminilla', 'Linimento' => 'Linimento', 'Loción' => 'Loción', 'Oblea' => 'Oblea', 'Óvulo' => 'Óvulo', 'Parche' => 'Parche', 'Pasta' => 'Pasta', 'Pastilla – moldeada en azúcar para ser disuelta en la boca' => 'Pastilla – moldeada en azúcar para ser disuelta en la boca', 'Polvo' => 'Polvo', 'Sistema de liberación' => 'Sistema de liberación', 'Solución' => 'Solución', 'Supositorio' => 'Supositorio', 'Suspensión' => 'Suspensión', 'Tableta o comprimido' => 'Tableta o comprimido', 'Ungüento' => 'Ungüento'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far98']) !!}
        </div>

        <div class="form-group" id="divfar99">
            {!! Form::label('far99', '10. Grupo', ['class' => 'form-label']) !!}
            {!! Form::select('far99', ['Grupo I – Estupefacientes' => 'Grupo I – Estupefacientes', 'Grupo II – Psicotrópicos' => 'Grupo II – Psicotrópicos', 'Grupo III – Psicotrópicos' => 'Grupo III – Psicotrópicos', 'Grupo IV' => 'Grupo IV', 'Grupo V' => 'Grupo V', 'Grupo VI' => 'Grupo VI'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far99']) !!}
        </div>

        <div class="form-group" id="divfar100">
            {!! Form::label('far100', '11. Dosis por unidad', ['class' => 'form-label']) !!}
            {!! Form::text('far100', null, ['class' => 'form-control', 'id' => 'far100', 'placeholder' => 'Ingrese dosis']) !!}
        </div>

        <div class="form-group" id="divfar101">
            {!! Form::label('far101', '12. Unidades de medición', ['class' => 'form-label']) !!}
            {!! Form::select('far101', ['mg' => 'mg', 'ml' => 'ml', 'UI' => 'UI'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far101']) !!}
        </div>

        <div class="form-group" id="divfar102">
            {!! Form::label('far102', '13. Condiciones de almacén requeridas', ['class' => 'form-label']) !!}
            {!! Form::select('far102', ['Temperatura ambiente' => 'Temperatura ambiente', 'Refrigeración' => 'Refrigeración', 'Congelación' => 'Congelación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far102']) !!}
        </div>

        <div class="form-group" id="divfar103">
            {!! Form::label('far103', '14. Fecha de caducidad', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far103', null, ['class' => 'form-control', 'id' => 'far103']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar104">
            {!! Form::label('far104', '15. Lote', ['class' => 'form-label']) !!}
            {!! Form::text('far104', null, ['class' => 'form-control', 'id' => 'far104', 'placeholder' => 'Ingrese lote']) !!}
        </div>

        <div class="form-group" id="divfar105">
            {!! Form::label('far105', '16. Número de kit', ['class' => 'form-label']) !!}
            {!! Form::text('far105', null, ['class' => 'form-control', 'id' => 'far105', 'placeholder' => 'Ingrese kit']) !!}
        </div>

        <div class="form-group" id="divfar106">
            {!! Form::label('far106', '17. Cantidad de unidades en el kit', ['class' => 'form-label']) !!}
            {!! Form::text('far106', null, ['class' => 'form-control', 'id' => 'far106', 'placeholder' => 'Ingrese cantidad']) !!}
        </div>

        <div class="form-group" id="divfar107">
            {!! Form::label('far107', '18. Número de equipo en que se almacenó', ['class' => 'form-label']) !!}
            {!! Form::text('far107', null, ['class' => 'form-control', 'id' => 'far107', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="divfar108">
            {!! Form::label('far108', '19. Fecha de entrada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far108', null, ['class' => 'form-control', 'id' => 'far108']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar109">
            {!! Form::label('far109', '20. Cantidad mínima requerida en inventario', ['class' => 'form-label']) !!}
            {!! Form::text('far109', null, ['class' => 'form-control', 'id' => 'far109', 'placeholder' => 'Ingrese cantidad']) !!}
        </div>

        <div class="form-group" id="divfar110">
            {!! Form::label('far110', '21. Dio de alta el producto al IWRS', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('far110', 'Si', null, ['class' => 'mr-1', 'id' => 'far110_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('far110', 'No', null, ['class' => 'mr-1', 'id' => 'far110_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divfar111">
            {!! Form::label('far111', '22. Fecha de alta al IVRS', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far111', null, ['class' => 'form-control', 'id' => 'far111']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGProductoFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR MATERIAL-->
<div class="modal fade" id="createMaterialFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createMaterialFarModalLabel">Nuevo material</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_materialfar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_materialfar', null, ['id' => 'empresaid_materialfar']) !!}
        {!! Form::hidden('proyectoid_materialfar', null, ['id' => 'proyectoid_materialfar']) !!}
        {!! Form::hidden('farmaciaid_materialfar', null, ['id' => 'farmaciaid_materialfar']) !!}
        {!! Form::hidden('id_materialfar', null, ['id' => 'id_materialfar']) !!}
        
        <div class="form-group" id="divfar112">
            {!! Form::label('far112', 'Fecha de recepción', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far112', null, ['class' => 'form-control', 'id' => 'far112', 'readonly' => 'readonly']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar113">
            {!! Form::label('far113', '23. Número del gabinete de la investigación', ['class' => 'form-label']) !!}
            <select class="form-control" id="far113" name="far113">
              <option value="">Seleccione...</option>
            <?php
            for($a=1; $a<=14; $a++){
              if($a<=9){
                echo "<option>0".$a."A</option>";
                echo "<option>0".$a."B</option>";
                echo "<option>0".$a."C</option>";
              }else{
                echo "<option>".$a."A</option>";
                echo "<option>".$a."B</option>";
                echo "<option>".$a."C</option>";
              }
            }
            ?>
            </select>
        </div>

        <div class="form-group" id="divfar114">
            {!! Form::label('far114', '24. Número del anaquel donde se guardó el material de transporte', ['class' => 'form-label']) !!}
            {!! Form::textarea('far114', null, ['class' => 'form-control', 'id' => 'far114', 'placeholder' => 'Ingrese Anaquel (1,2,3,4), Repisa (A,B,C,D,E,F), Espacio (1,2,3) (Ejemplo 1,A,3)']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGMaterialFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR EQUIPO-->
<div class="modal fade" id="createEquipoFarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEquipoFarModalLabel">Nuevo equipo</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_equipofar']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_equipofar', null, ['id' => 'empresaid_equipofar']) !!}
        {!! Form::hidden('proyectoid_equipofar', null, ['id' => 'proyectoid_equipofar']) !!}
        {!! Form::hidden('farmaciaid_equipofar', null, ['id' => 'farmaciaid_equipofar']) !!}
        {!! Form::hidden('id_equipofar', null, ['id' => 'id_equipofar']) !!}
        
        <div class="form-group" id="divfar115">
            {!! Form::label('far115', 'Fecha de recepción', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far115', null, ['class' => 'form-control', 'id' => 'far115', 'readonly' => 'readonly']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar116">
            {!! Form::label('far116', '25. Nombre del equipo', ['class' => 'form-label']) !!}
            {!! Form::text('far116', null, ['class' => 'form-control', 'id' => 'far116', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divfar117">
            {!! Form::label('far117', '26. Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('far117', null, ['class' => 'form-control', 'id' => 'far117', 'placeholder' => 'Ingrese descripción']) !!}
        </div>

        <div class="form-group" id="divfar118">
            {!! Form::label('far118', '27. Lugar de almacén', ['class' => 'form-label']) !!}
            {!! Form::select('far118', ['Archivero del estudio' => 'Archivero del estudio', 'Mesa de exploración del consultorio médico' => 'Mesa de exploración del consultorio médico'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'far118']) !!}
        </div>

        <div class="form-group" id="divfar119">
            {!! Form::label('far119', '28. Fecha de ingreso', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('far119', null, ['class' => 'form-control', 'id' => 'far119']) !!}
            </div>
        </div>

        <div class="form-group" id="divfar120">
            {!! Form::label('far120', '26. Observaciones', ['class' => 'form-label']) !!}
            {!! Form::textarea('far120', null, ['class' => 'form-control', 'id' => 'far120', 'placeholder' => 'Ingrese observaciones']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEquipoFar" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>