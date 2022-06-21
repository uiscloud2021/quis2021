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


<!-- Modal CREAR CRONOGRAMA-->
<div class="modal fade" id="createCronogramaRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCronogramaRecModalLabel">Nuevo cronograma</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_cronogramarec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_cronogramarec', null, ['id' => 'empresaid_cronogramarec']) !!}
        {!! Form::hidden('proyectoid_cronogramarec', null, ['id' => 'proyectoid_cronogramarec']) !!}
        {!! Form::hidden('reclutamientoid_cronogramarec', null, ['id' => 'reclutamientoid_cronogramarec']) !!}
        {!! Form::hidden('id_cronogramarec', null, ['id' => 'id_cronogramarec']) !!}
        
        <div class="form-group" id="divr14">
            {!! Form::label('r14', '14. Nombre de la visita', ['class' => 'form-label']) !!}
            {!! Form::select('r14', $visitas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r14', 'onchange' => 'CargarVisitaRec(this.value)']) !!}
        </div>

        <div class="form-group" id="divr15">
            {!! Form::label('r15', '15. Fecha programada', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r15', null, ['class' => 'form-control', 'id' => 'r15']) !!}
            </div>
        </div>

        <div class="form-group" id="divr16">
            {!! Form::label('r16', '16. Ventana', ['class' => 'form-label']) !!}
            {!! Form::text('r16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese ventana', 'id' => 'r16']) !!}
        </div>

        <div class="form-group" id="divr17">
            {!! Form::label('r17', '17. Actividad de la visita 1', ['class' => 'form-label']) !!}
            {!! Form::textarea('r17', null, ['class' => 'form-control', 'placeholder' => 'Ingrese actividad', 'id' => 'r17']) !!}
        </div>

        <div class="form-group" id="divr18">
            {!! Form::label('r18', '18. Actividad de la visita 2', ['class' => 'form-label']) !!}
            {!! Form::textarea('r18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese actividad', 'id' => 'r18']) !!}
        </div>

        <div class="form-group" id="divr19">
            {!! Form::label('r19', '19. Pasos que conlleva la actividad 1', ['class' => 'form-label']) !!}
            {!! Form::textarea('r19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese pasos', 'id' => 'r19']) !!}
        </div>

        <div class="form-group" id="divr20">
            {!! Form::label('r20', '20. Pasos que conlleva la actividad 2', ['class' => 'form-label']) !!}
            {!! Form::textarea('r20', null, ['class' => 'form-control', 'placeholder' => 'Ingrese pasos', 'id' => 'r20']) !!}
        </div>

        <div class="form-group" id="divr21">
            {!! Form::label('r21', '21. Hubo desviación', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r21', 'Si', null, ['class' => 'mr-1', 'id' => 'r21_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r21', 'No', null, ['class' => 'mr-1', 'id' => 'r21_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr22">
            {!! Form::label('r22', '22. Descripción', ['class' => 'form-label']) !!}
            {!! Form::textarea('r22', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción', 'id' => 'r22']) !!}
        </div>

        <div class="form-group" id="divr23">
            {!! Form::label('r23', '23. Acciones tomadas', ['class' => 'form-label']) !!}
            {!! Form::textarea('r23', null, ['class' => 'form-control', 'placeholder' => 'Ingrese acciones', 'id' => 'r23']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCronogramaRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR ESTRATEGIAS-->
<div class="modal fade" id="createEstrategiaRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createEstrategiaRecModalLabel">Nueva estrategia</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_estrategiarec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_estrategiarec', null, ['id' => 'empresaid_estrategiarec']) !!}
        {!! Form::hidden('proyectoid_estrategiarec', null, ['id' => 'proyectoid_estrategiarec']) !!}
        {!! Form::hidden('reclutamientoid_estrategiarec', null, ['id' => 'reclutamientoid_estrategiarec']) !!}
        {!! Form::hidden('id_estrategiarec', null, ['id' => 'id_estrategiarec']) !!}
        
        <div class="form-group" id="divr27">
            {!! Form::label('r27', '27. Nombre de la estrategia programada', ['class' => 'form-label']) !!}
            {!! Form::select('r27', ['Tarjeta de bolsillo' => 'Tarjeta de bolsillo', 'Póster' => 'Póster', 'Prensa' => 'Prensa', 'Web' => 'Web'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r27', 'onchange' => 'EstrategiasRec(this.value);']) !!}
        </div>

        <div class="form-group" id="divr28">
            {!! Form::label('r28', '28. Se realizó la estrategia programada', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r28', 'Si', null, ['class' => 'mr-1', 'id' => 'r28_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r28', 'No', null, ['class' => 'mr-1', 'id' => 'r28_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr29">
            {!! Form::label('r29', '29. Costo de la estrategia ', ['class' => 'form-label']) !!}
            {!! Form::number('r29', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01', 'id' => 'r29']) !!}
        </div>

        <div class="form-group" id="divr30">
            {!! Form::label('r30', '30. Observaciones a la estrategia', ['class' => 'form-label']) !!}
            {!! Form::textarea('r30', null, ['class' => 'form-control', 'placeholder' => 'Ingrese observaciones', 'id' => 'r30']) !!}
        </div>

        <div class="form-group" id="divr31">
            {!! Form::label('r31', '31. Nombre del médico o profesional a quien se envió tarjeta de bolsillo', ['class' => 'form-label']) !!}
            {!! Form::text('r31', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'r31']) !!}
        </div>

        <div class="form-group" id="divr32">
            {!! Form::label('r32', '32. Dirección', ['class' => 'form-label']) !!}
            {!! Form::textarea('r32', null, ['class' => 'form-control', 'placeholder' => 'Ingrese dirección', 'id' => 'r32']) !!}
        </div>

        <div class="form-group" id="divr33">
            {!! Form::label('r33', '33. Teléfono de contacto', ['class' => 'form-label']) !!}
            {!! Form::text('r33', null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'id' => 'r33']) !!}
        </div>

        @for ($a = 34; $a <= 58; $a++)
          <div class="form-group" id="divr{{$a}}" style="display:none">
            {!! Form::label('r'.$a, '31. Nombre del médico o profesional a quien se envió tarjeta de bolsillo', ['class' => 'form-label']) !!}
            {!! Form::text('r'.$a, null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'id' => 'r'.$a]) !!}
          </div>
          <?php $a++; ?>
          <div class="form-group" id="divr{{$a}}" style="display:none">
            {!! Form::label('r'.$a, '32. Dirección', ['class' => 'form-label']) !!}
            {!! Form::textarea('r'.$a, null, ['class' => 'form-control', 'placeholder' => 'Ingrese dirección', 'id' => 'r'.$a]) !!}
          </div>
          <?php $a++; ?>
          <div class="form-group" id="divr{{$a}}" style="display:none">
            {!! Form::label('r'.$a, '33. Teléfono de contacto', ['class' => 'form-label']) !!}
            {!! Form::text('r'.$a, null, ['class' => 'form-control', 'placeholder' => 'Ingrese teléfono', 'id' => 'r'.$a]) !!}
          </div>
        @endfor
        <br/>
        <button type="button" onclick="MedicoRec();" id="btn_medicorec" class="btn btn-info">Agregar médico</button>
        
        <div class="form-group" id="divr61"><br/>
            {!! Form::label('r61', '34. Lugar en que se colocó un póster (ubicación exacta)', ['class' => 'form-label']) !!}
            {!! Form::textarea('r61', null, ['class' => 'form-control', 'placeholder' => 'Ingrese ubicación', 'id' => 'r61']) !!}
        </div>

        <div class="form-group" id="divr62">
            {!! Form::label('r62', '35. Fecha en que se retiró el póster', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r62', null, ['class' => 'form-control', 'id' => 'r62']) !!}
            </div>
        </div>

        @for ($b = 63; $b <= 79; $b++)
          <div class="form-group" id="divr{{$b}}" style="display:none">
          {!! Form::label('r'.$b, '34. Lugar en que se colocó un póster (ubicación exacta)', ['class' => 'form-label']) !!}
            {!! Form::textarea('r'.$b, null, ['class' => 'form-control', 'placeholder' => 'Ingrese ubicación', 'id' => 'r'.$b]) !!}
          </div>
          <?php $b++; ?>
          <div class="form-group" id="divr{{$b}}" style="display:none">
          {!! Form::label('r'.$b, '35. Fecha en que se retiró el póster', ['class' => 'form-label']) !!}
            <div class='input-group-prepend'>
              <span class='input-group-text'><i class='fas fa-calendar'></i></span>
              {!! Form::date('r'.$b, null, ['class' => 'form-control', 'id' => 'r'.$b]) !!}
            </div>
          </div>
        @endfor
        <br/>
        <button type="button" onclick="PosterRec();" id="btn_posterrec" class="btn btn-info">Agregar lugar</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGEstrategiaRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CONTACTO-->
<div class="modal fade" id="createContactoRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createContactoRecModalLabel">Nuevo sujeto</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_contactorec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_contactorec', null, ['id' => 'empresaid_contactorec']) !!}
        {!! Form::hidden('proyectoid_contactorec', null, ['id' => 'proyectoid_contactorec']) !!}
        {!! Form::hidden('reclutamientoid_contactorec', null, ['id' => 'reclutamientoid_contactorec']) !!}
        {!! Form::hidden('id_contactorec', null, ['id' => 'id_contactorec']) !!}
        
        <div class="form-group" id="divr81">
            {!! Form::label('r81', '36. Nombre del sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r81', null, ['class' => 'form-control', 'id' => 'r81', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divr82">
            {!! Form::label('r82', '37. Sexo', ['class' => 'form-label']) !!}
            {!! Form::select('r82', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r82']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('r83', '38. Fecha de nacimiento', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r83', null, ['class' => 'form-control', 'id' => 'r83']) !!}
            </div>
        </div>

        <div class="form-group" id="divr84">
            {!! Form::label('r84', '39. Edad', ['class' => 'form-label']) !!}
            {!! Form::text('r84', null, ['class' => 'form-control', 'id' => 'r84', 'placeholder' => 'Ingrese edad']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('r85', '40. Fecha de registro en base de datos', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r85', null, ['class' => 'form-control', 'id' => 'r85']) !!}
            </div>
        </div>

        <div class="form-group" id="divr86">
            {!! Form::label('r86', '41. Calle', ['class' => 'form-label']) !!}
            {!! Form::text('r86', null, ['class' => 'form-control', 'id' => 'r86', 'placeholder' => 'Ingrese calle']) !!}
        </div>

        <div class="form-group" id="divr87">
            {!! Form::label('r87', '42. Número', ['class' => 'form-label']) !!}
            {!! Form::text('r87', null, ['class' => 'form-control', 'id' => 'r87', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="divr88">
            {!! Form::label('r88', '43. Colonia', ['class' => 'form-label']) !!}
            {!! Form::text('r88', null, ['class' => 'form-control', 'id' => 'r88', 'placeholder' => 'Ingrese colonia']) !!}
        </div>

        <div class="form-group" id="divr89">
            {!! Form::label('r89', '44. Ciudad', ['class' => 'form-label']) !!}
            {!! Form::text('r89', null, ['class' => 'form-control', 'id' => 'r89', 'placeholder' => 'Ingrese ciudad']) !!}
        </div>

        <div class="form-group" id="divr90">
            {!! Form::label('r90', '45. Estado', ['class' => 'form-label']) !!}
            {!! Form::text('r90', null, ['class' => 'form-control', 'id' => 'r90', 'placeholder' => 'Ingrese estado']) !!}
        </div>

        <div class="form-group" id="divr91">
            {!! Form::label('r91', '46. CP', ['class' => 'form-label']) !!}
            {!! Form::text('r91', null, ['class' => 'form-control', 'id' => 'r91', 'placeholder' => 'Ingrese CP']) !!}
        </div>

        <div class="form-group" id="divr92">
            {!! Form::label('r92', '47. Teléfono casa sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r92', null, ['class' => 'form-control', 'id' => 'r92', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr93">
            {!! Form::label('r93', '48. Teléfono móvil sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r93', null, ['class' => 'form-control', 'id' => 'r93', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr94">
            {!! Form::label('r94', '49. Teléfono trabajo sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r94', null, ['class' => 'form-control', 'id' => 'r94', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr95">
            {!! Form::label('r95', '50. Correo electrónico del sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r95', null, ['class' => 'form-control', 'id' => 'r95', 'placeholder' => 'Ingrese correo']) !!}
        </div>

        <div class="form-group" id="divr96">
            {!! Form::label('r96', '51. Patología del sujeto 1', ['class' => 'form-label']) !!}
            {!! Form::text('r96', null, ['class' => 'form-control', 'id' => 'r96', 'placeholder' => 'Ingrese patología']) !!}
        </div>

        <div class="form-group" id="divr97">
            {!! Form::label('r97', '52. Fecha de diagnóstico 1', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r97', null, ['class' => 'form-control', 'id' => 'r97']) !!}
            </div>
        </div>

        <div class="form-group" id="divr98">
            {!! Form::label('r98', '53. Tratamiento 1', ['class' => 'form-label']) !!}
            {!! Form::text('r98', null, ['class' => 'form-control', 'id' => 'r98', 'placeholder' => 'Ingrese tratamiento']) !!}
        </div>

        <div class="form-group" id="divr99">
            {!! Form::label('r99', '54. Patología del sujeto 2', ['class' => 'form-label']) !!}
            {!! Form::text('r99', null, ['class' => 'form-control', 'id' => 'r99', 'placeholder' => 'Ingrese patología']) !!}
        </div>

        <div class="form-group" id="divr100">
            {!! Form::label('r100', '55. Fecha de diagnóstico 2', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r100', null, ['class' => 'form-control', 'id' => 'r100']) !!}
            </div>
        </div>

        <div class="form-group" id="divr101">
            {!! Form::label('r101', '56. Tratamiento 2', ['class' => 'form-label']) !!}
            {!! Form::text('r101', null, ['class' => 'form-control', 'id' => 'r101', 'placeholder' => 'Ingrese tratamiento']) !!}
        </div>

        <div class="form-group" id="divr102">
            {!! Form::label('r102', '57. Protocolo al cual es candidato', ['class' => 'form-label']) !!}
            {!! Form::text('r102', $proyecto->no18, ['class' => 'form-control', 'id' => 'r102', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group" id="divr103">
            {!! Form::label('r103', '58. Estrategia de reclutamiento efectiva', ['class' => 'form-label']) !!}
            {!! Form::select('r103', ['Referencia' => 'Referencia', 'Póster' => 'Póster', 'Prensa' => 'Prensa', 'Web' => 'Web'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r103']) !!}
        </div>

        <div class="form-group" id="divr104">
            {!! Form::label('r104', '59. Nombre de la persona que lo refirió', ['class' => 'form-label']) !!}
            {!! Form::text('r104', null, ['class' => 'form-control', 'id' => 'r104', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divr105">
            {!! Form::label('r105', '60. Estado del sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r105', 'En base de datos', ['class' => 'form-control', 'id' => 'r105', 'readonly' => 'readonly']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGContactoRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR CRITERIO-->
<div class="modal fade" id="createCriterioRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createCriterioRecModalLabel">Nuevo criterio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_criteriorec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_criteriorec', null, ['id' => 'empresaid_criteriorec']) !!}
        {!! Form::hidden('proyectoid_criteriorec', null, ['id' => 'proyectoid_criteriorec']) !!}
        {!! Form::hidden('reclutamientoid_criteriorec', null, ['id' => 'reclutamientoid_criteriorec']) !!}
        {!! Form::hidden('id_criteriorec', null, ['id' => 'id_criteriorec']) !!}
        
        <div class="form-group" id="divr106">
            {!! Form::label('r106', '1. Criterio de pre-selección 1', ['class' => 'form-label']) !!}
            {!! Form::text('r106', null, ['class' => 'form-control', 'id' => 'r106', 'placeholder' => 'Ingrese criterio']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGCriterioRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PRESELECCION-->
<div class="modal fade" id="createPreseleccionRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPreseleccionRecModalLabel">Nueva pre-selección</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_preseleccionrec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_preseleccionrec', null, ['id' => 'empresaid_preseleccionrec']) !!}
        {!! Form::hidden('proyectoid_preseleccionrec', null, ['id' => 'proyectoid_preseleccionrec']) !!}
        {!! Form::hidden('reclutamientoid_preseleccionrec', null, ['id' => 'reclutamientoid_preseleccionrec']) !!}
        {!! Form::hidden('id_preseleccionrec', null, ['id' => 'id_preseleccionrec']) !!}
        
        <div class="form-group" id="divr107">
            {!! Form::label('r107', '2. Nombre del sujeto', ['class' => 'form-label']) !!}
            {!! Form::select('r107', $sujetos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r107', 'onchange' => 'CargarEstadoRec(this.value)']) !!}
        </div>

        <div class="form-group" id="divr108">
            {!! Form::label('r108', '3. Fecha en que verificó el cumplimiento de los criterios de pre-sección', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r108', null, ['class' => 'form-control', 'id' => 'r108']) !!}
            </div>
        </div>

        <div class="form-group" id="divr109">
            {!! Form::label('r109', '4. El sujeto cumple con todos los criterios de pre-selección', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r109', 'Si', null, ['class' => 'mr-1', 'id' => 'r109_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r109', 'No', null, ['class' => 'mr-1', 'id' => 'r109_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr110">
            {!! Form::label('r110', '5. Estado del sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r110', 'En base de datos', ['class' => 'form-control', 'id' => 'r110', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
        </div>

        <div class="form-group" id="divr111">
            {!! Form::label('r111', '6. Nombre de persona de contacto 1', ['class' => 'form-label']) !!}
            {!! Form::text('r111', null, ['class' => 'form-control', 'id' => 'r111', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divr112">
            {!! Form::label('r112', '7. Domicilio 1', ['class' => 'form-label']) !!}
            {!! Form::textarea('r112', null, ['class' => 'form-control', 'id' => 'r112', 'placeholder' => 'Ingrese domicilio']) !!}
        </div>

        <div class="form-group" id="divr113">
            {!! Form::label('r113', '8. Parentesco 1', ['class' => 'form-label']) !!}
            {!! Form::text('r113', null, ['class' => 'form-control', 'id' => 'r113', 'placeholder' => 'Ingrese parentesco']) !!}
        </div>

        <div class="form-group" id="divr114">
            {!! Form::label('r114', '9. Teléfono casa 1', ['class' => 'form-label']) !!}
            {!! Form::text('r114', null, ['class' => 'form-control', 'id' => 'r114', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr115">
            {!! Form::label('r115', '10. Teléfono móvil 1', ['class' => 'form-label']) !!}
            {!! Form::text('r115', null, ['class' => 'form-control', 'id' => 'r115', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr116">
            {!! Form::label('r116', '10. Teléfono trabajo 1', ['class' => 'form-label']) !!}
            {!! Form::text('r116', null, ['class' => 'form-control', 'id' => 'r116', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr117">
            {!! Form::label('r117', '11. Nombre de persona de contacto 2', ['class' => 'form-label']) !!}
            {!! Form::text('r117', null, ['class' => 'form-control', 'id' => 'r117', 'placeholder' => 'Ingrese nombre']) !!}
        </div>

        <div class="form-group" id="divr118">
            {!! Form::label('r118', '12. Domicilio 2', ['class' => 'form-label']) !!}
            {!! Form::textarea('r118', null, ['class' => 'form-control', 'id' => 'r118', 'placeholder' => 'Ingrese domicilio']) !!}
        </div>

        <div class="form-group" id="divr119">
            {!! Form::label('r119', '13. Parentesco 2', ['class' => 'form-label']) !!}
            {!! Form::text('r119', null, ['class' => 'form-control', 'id' => 'r119', 'placeholder' => 'Ingrese parentesco']) !!}
        </div>

        <div class="form-group" id="divr120">
            {!! Form::label('r120', '14. Teléfono casa 2', ['class' => 'form-label']) !!}
            {!! Form::text('r120', null, ['class' => 'form-control', 'id' => 'r120', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr121">
            {!! Form::label('r121', '15. Teléfono móvil 2', ['class' => 'form-label']) !!}
            {!! Form::text('r121', null, ['class' => 'form-control', 'id' => 'r121', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

        <div class="form-group" id="divr122">
            {!! Form::label('r122', '16. Teléfono trabajo 2', ['class' => 'form-label']) !!}
            {!! Form::text('r122', null, ['class' => 'form-control', 'id' => 'r122', 'placeholder' => 'Ingrese teléfono']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGPreseleccionRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR FUENTE DEL SUJETO-->
<div class="modal fade" id="createFuenteSujetoRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFuenteSujetoRecModalLabel">Nueva fuente del sujeto</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fuentesujetorec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_fuentesujetorec', null, ['id' => 'empresaid_fuentesujetorec']) !!}
        {!! Form::hidden('proyectoid_fuentesujetorec', null, ['id' => 'proyectoid_fuentesujetorec']) !!}
        {!! Form::hidden('reclutamientoid_fuentesujetorec', null, ['id' => 'reclutamientoid_fuentesujetorec']) !!}
        {!! Form::hidden('id_fuentesujetorec', null, ['id' => 'id_fuentesujetorec']) !!}
        
        <div class="form-group" id="divr123">
            {!! Form::label('r123', '1. Nombre del sujeto', ['class' => 'form-label']) !!}
            {!! Form::select('r123', $sujetos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r123']) !!}
        </div>

        <div class="form-group" id="divr124">
            {!! Form::label('r124', '2. Preparó la carpeta del documento fuente del sujeto en base al IT-SC Documento fuente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r124', 'Si', null, ['class' => 'mr-1', 'id' => 'r124_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r124', 'No', null, ['class' => 'mr-1', 'id' => 'r124_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr125">
            {!! Form::label('r125', '3. Agregó el FC-SC Hoja inicial, personalizado con los datos del estudio y del sujeto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r125', 'Si', null, ['class' => 'mr-1', 'id' => 'r125_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r125', 'No', null, ['class' => 'mr-1', 'id' => 'r125_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr126">
            {!! Form::label('r126', '4. Agregó el FC-SC Hoja de contacto, personalizado con los datos del sujeto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r126', 'Si', null, ['class' => 'mr-1', 'id' => 'r126_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r126', 'No', null, ['class' => 'mr-1', 'id' => 'r126_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr127">
            {!! Form::label('r127', '5. Agregó el FC-SC Criterios de selección', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r127', 'Si', null, ['class' => 'mr-1', 'id' => 'r127_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r127', 'No', null, ['class' => 'mr-1', 'id' => 'r127_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr128">
            {!! Form::label('r128', '6. Agregó el FC-SC Eventos adversos ', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r128', 'Si', null, ['class' => 'mr-1', 'id' => 'r128_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r128', 'No', null, ['class' => 'mr-1', 'id' => 'r128_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr129">
            {!! Form::label('r129', '7. Agregó el FC-SC Medicamentos concomitantes', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r129', 'Si', null, ['class' => 'mr-1', 'id' => 'r129_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r129', 'No', null, ['class' => 'mr-1', 'id' => 'r129_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr130">
            {!! Form::label('r130', '8. Agregó el FC-SC Medicamento de estudio', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r130', 'Si', null, ['class' => 'mr-1', 'id' => 'r130_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r130', 'No', null, ['class' => 'mr-1', 'id' => 'r130_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr131">
            {!! Form::label('r131', '9. Agregó el FC-SC Historia clínica', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r131', 'Si', null, ['class' => 'mr-1', 'id' => 'r131_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r131', 'No', null, ['class' => 'mr-1', 'id' => 'r131_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFuenteSujetoRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR FUENTE ESTUDIO-->
<div class="modal fade" id="createFuenteEstudioRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFuenteEstudioRecModalLabel">Nueva fuente del estudio</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fuenteestudiorec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_fuenteestudiorec', null, ['id' => 'empresaid_fuenteestudiorec']) !!}
        {!! Form::hidden('proyectoid_fuenteestudiorec', null, ['id' => 'proyectoid_fuenteestudiorec']) !!}
        {!! Form::hidden('reclutamientoid_fuenteestudiorec', null, ['id' => 'reclutamientoid_fuenteestudiorec']) !!}
        {!! Form::hidden('id_fuenteestudiorec', null, ['id' => 'id_fuenteestudiorec']) !!}
        
        <div class="form-group" id="divr132">
            {!! Form::label('r132', '10. Número de visita', ['class' => 'form-label']) !!}
            {!! Form::select('r132', $visitas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r132']) !!}
        </div>

        <div class="form-group" id="divr133">
            {!! Form::label('r133', '11. Verificó en QUIS Cronograma las actividades de la visita', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r133', 'Si', null, ['class' => 'mr-1', 'id' => 'r133_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r133', 'No', null, ['class' => 'mr-1', 'id' => 'r133_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr134">
            {!! Form::label('r134', '12. Verificó el CRF de la visita', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r134', 'Si', null, ['class' => 'mr-1', 'id' => 'r134_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r134', 'No', null, ['class' => 'mr-1', 'id' => 'r134_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr135">
            {!! Form::label('r135', '13. Elaboró el documento fuente de la visita en base a ambos ', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r135', 'Si', null, ['class' => 'mr-1', 'id' => 'r135_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r135', 'No', null, ['class' => 'mr-1', 'id' => 'r135_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr136">
            {!! Form::label('r136', '14. Se realizó aseguramiento de calidad al formato de la visita', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r136', 'Si', null, ['class' => 'mr-1', 'id' => 'r136_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r136', 'No', null, ['class' => 'mr-1', 'id' => 'r136_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr137">
            {!! Form::label('r137', '15. Fecha de aseguramiento de calidad al formato de la visita', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r137', null, ['class' => 'form-control', 'id' => 'r137']) !!}
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFuenteEstudioRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR FUENTE VISITA-->
<div class="modal fade" id="createFuenteVisitaRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createFuenteVisitaRecModalLabel">Nueva fuente de visita</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_fuentevisitarec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_fuentevisitarec', null, ['id' => 'empresaid_fuentevisitarec']) !!}
        {!! Form::hidden('proyectoid_fuentevisitarec', null, ['id' => 'proyectoid_fuentevisitarec']) !!}
        {!! Form::hidden('reclutamientoid_fuentevisitarec', null, ['id' => 'reclutamientoid_fuentevisitarec']) !!}
        {!! Form::hidden('id_fuentevisitarec', null, ['id' => 'id_fuentevisitarec']) !!}
        
        <div class="form-group" id="divr138">
            {!! Form::label('r138', '16. Nombre del sujeto', ['class' => 'form-label']) !!}
            {!! Form::select('r138', $sujetos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r132']) !!}
        </div>

        <div class="form-group" id="divr139">
            {!! Form::label('r139', '17. Número de visita', ['class' => 'form-label']) !!}
            {!! Form::select('r139', $visitas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r132']) !!}
        </div>

        <div class="form-group" id="divr140">
            {!! Form::label('r140', '18. Agregó el FC-SC Señalador de visita', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r140', 'Si', null, ['class' => 'mr-1', 'id' => 'r140_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r140', 'No', null, ['class' => 'mr-1', 'id' => 'r140_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr141">
            {!! Form::label('r141', '19. Agregó el FC-SC Documento fuente, adaptado para el estudio', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r141', 'Si', null, ['class' => 'mr-1', 'id' => 'r141_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r141', 'No', null, ['class' => 'mr-1', 'id' => 'r141_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr142">
            {!! Form::label('r142', '20. Agregó el FC-SC Nota consulta médica', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r142', 'Si', null, ['class' => 'mr-1', 'id' => 'r142_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r142', 'No', null, ['class' => 'mr-1', 'id' => 'r142_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr143">
            {!! Form::label('r143', '21. Agregó el FC-SC Nota médica', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r143', 'Si', null, ['class' => 'mr-1', 'id' => 'r143_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r143', 'No', null, ['class' => 'mr-1', 'id' => 'r143_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr144">
            {!! Form::label('r144', '22. Agregó el formato de documento fuente de la visita', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r144', 'Si', null, ['class' => 'mr-1', 'id' => 'r144_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r144', 'No', null, ['class' => 'mr-1', 'id' => 'r144_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr145">
            {!! Form::label('r145', '23. Debe obtenerse el consentimiento informado en la visita', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r145', 'Si', null, ['class' => 'mr-1', 'id' => 'r145_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r145', 'No', null, ['class' => 'mr-1', 'id' => 'r145_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr146">
            {!! Form::label('r146', '24. Agregó dos copias del ICF sellado para ser firmadas', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r146', 'Si', null, ['class' => 'mr-1', 'id' => 'r146_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r146', 'No', null, ['class' => 'mr-1', 'id' => 'r146_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr147">
            {!! Form::label('r147', '25. Entregó al médico el FC-SC Nota de consentimiento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r147', 'Si', null, ['class' => 'mr-1', 'id' => 'r147_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r147', 'No', null, ['class' => 'mr-1', 'id' => 'r147_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr148">
            {!! Form::label('r148', '26. Una persona autorizada, no médico, debe hacer un reporte en el documento fuente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r148', 'Si', null, ['class' => 'mr-1', 'id' => 'r148_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r148', 'No', null, ['class' => 'mr-1', 'id' => 'r148_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr149">
            {!! Form::label('r149', '27. Agregó el FC-SC Nota al expediente', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r149', 'Si', null, ['class' => 'mr-1', 'id' => 'r149_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r149', 'No', null, ['class' => 'mr-1', 'id' => 'r149_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr150">
            {!! Form::label('r150', '28. Agregó el FC-SC Nota al archivo', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r150', 'Si', null, ['class' => 'mr-1', 'id' => 'r150_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r150', 'No', null, ['class' => 'mr-1', 'id' => 'r150_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGFuenteVisitaRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR RECLUTAMIENTO-->
<div class="modal fade" id="createReclutamientoRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createReclutamientoRecModalLabel">Nuevo reclutamiento</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_reclutamientorec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_reclutamientorec', null, ['id' => 'empresaid_reclutamientorec']) !!}
        {!! Form::hidden('proyectoid_reclutamientorec', null, ['id' => 'proyectoid_reclutamientorec']) !!}
        {!! Form::hidden('reclutamientoid_reclutamientorec', null, ['id' => 'reclutamientoid_reclutamientorec']) !!}
        {!! Form::hidden('id_reclutamientorec', null, ['id' => 'id_reclutamientorec']) !!}
        
        <div class="form-group" id="divr151">
            {!! Form::label('r151', '1. Nombre del sujeto', ['class' => 'form-label']) !!}
            {!! Form::select('r151', $sujetos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r151', 'onchange' => 'CargarEstadoRec(this.value)']) !!}
        </div>

        <div class="form-group" id="divr152">
            {!! Form::label('r152', '2. Leyó el ICF con el sujeto y frente a dos testigos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r152', 'Si', null, ['class' => 'mr-1', 'id' => 'r152_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r152', 'No', null, ['class' => 'mr-1', 'id' => 'r152_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr153">
            {!! Form::label('r153', '3. Verificó que dos testigos acompañaron al sujeto y al médico durante la aclaración de dudas y la firma del ICF', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r153', 'Si', null, ['class' => 'mr-1', 'id' => 'r153_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r153', 'No', null, ['class' => 'mr-1', 'id' => 'r153_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr154">
            {!! Form::label('r154', '4. Aseguró el completo y adecuado llenado del ICF por cada uno de los firmantes', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r154', 'Si', null, ['class' => 'mr-1', 'id' => 'r154_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r154', 'No', null, ['class' => 'mr-1', 'id' => 'r154_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr155">
            {!! Form::label('r155', '5. Aseguró que el sujeto recibiera una copia del ICF con firmas originales', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r155', 'Si', null, ['class' => 'mr-1', 'id' => 'r155_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r155', 'No', null, ['class' => 'mr-1', 'id' => 'r155_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr156">
            {!! Form::label('r156', '6. Aseguró que el médico documentara el procedimiento con una nota basada en el FC-SC Nota de consentimiento', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r156', 'Si', null, ['class' => 'mr-1', 'id' => 'r156_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r156', 'No', null, ['class' => 'mr-1', 'id' => 'r156_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr157">
            {!! Form::label('r157', '7. Fecha de firma del ICF', ['class' => 'form-label']) !!}
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                {!! Form::date('r157', null, ['class' => 'form-control', 'id' => 'r157']) !!}
            </div>
        </div>

        <div class="form-group" id="divr158">
            {!! Form::label('r158', '8. Número asignado al sujeto por el patrocinador', ['class' => 'form-label']) !!}
            {!! Form::text('r158', null, ['class' => 'form-control', 'id' => 'r158', 'placeholder' => 'Ingrese número']) !!}
        </div>

        <div class="form-group" id="divr159">
            {!! Form::label('r159', '9. Estado del sujeto', ['class' => 'form-label']) !!}
            {!! Form::text('r159', null, ['class' => 'form-control', 'id' => 'r159', 'placeholder' => 'Ingrese estado', 'readonly' => 'readonly']) !!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGReclutamientoRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>





<!-- Modal CREAR PROTECCION-->
<div class="modal fade" id="createProteccionRecModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProteccionRecModalLabel">Nueva protección</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cancelar">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['autocomplete' => 'off', 'method'=>'POST', 'id'=>'formcreate_proteccionrec']) !!}
      <div class="modal-body">
        {!! Form::hidden('empresaid_proteccionrec', null, ['id' => 'empresaid_proteccionrec']) !!}
        {!! Form::hidden('proyectoid_proteccionrec', null, ['id' => 'proyectoid_proteccionrec']) !!}
        {!! Form::hidden('reclutamientoid_proteccionrec', null, ['id' => 'reclutamientoid_proteccionrec']) !!}
        {!! Form::hidden('id_proteccionrec', null, ['id' => 'id_proteccionrec']) !!}
        
        <div class="form-group" id="divr160">
            {!! Form::label('r160', '10. Nombre del sujeto', ['class' => 'form-label']) !!}
            {!! Form::select('r160', $sujetos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...', 'id' => 'r160']) !!}
        </div>

        <div class="form-group" id="divr161">
            {!! Form::label('r161', '11. Presentó la empresa al sujeto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r161', 'Si', null, ['class' => 'mr-1', 'id' => 'r161_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r161', 'No', null, ['class' => 'mr-1', 'id' => 'r161_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr162">
            {!! Form::label('r162', '12. Entregó al sujeto el FC-SC Derechos de los sujetos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r162', 'Si', null, ['class' => 'mr-1', 'id' => 'r162_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r162', 'No', null, ['class' => 'mr-1', 'id' => 'r162_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr163">
            {!! Form::label('r163', '13. Entregó al sujeto el FC-SC Tarjeta de contacto', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r163', 'Si', null, ['class' => 'mr-1', 'id' => 'r163_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r163', 'No', null, ['class' => 'mr-1', 'id' => 'r163_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr164">
            {!! Form::label('r164', '14. Informó al sujeto sobre el procedimiento de atención de urgencias', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r164', 'Si', null, ['class' => 'mr-1', 'id' => 'r164_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r164', 'No', null, ['class' => 'mr-1', 'id' => 'r164_no']) !!}
                  No
              </label>
            </div>
        </div>

        <div class="form-group" id="divr165">
            {!! Form::label('r165', '15. Inició el control de apoyos al sujeto con el FC-SC Carnet de viáticos', ['class' => 'form-label']) !!}
            <div>
              <label>
                {!! Form::radio('r165', 'Si', null, ['class' => 'mr-1', 'id' => 'r165_si']) !!}
                  Si
              </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>
                {!! Form::radio('r165', 'No', null, ['class' => 'mr-1', 'id' => 'r165_no']) !!}
                  No
              </label>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnGProteccionRec" class="btn btn-success"><i class="fas fa-save"> Guardar</i></button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

