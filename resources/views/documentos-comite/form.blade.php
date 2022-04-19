<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-edit"></i>
        Factibilidad
      </h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-5 col-sm-3">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Menú de preguntas</h3>
              </div>
              <div class="card-body p-0">
                  <ul class="nav flex-column nav-tabs">
                      <li class="nav-item">
                          <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Propuesta</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Contactos</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Análisis</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Confidencialidad</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false"><i class="far fa-edit"></i> Archivo</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-6-tab" data-toggle="pill" href="#vert-tabs-6" role="tab" aria-controls="vert-tabs-6" aria-selected="false"><i class="far fa-edit"></i> Equipamiento</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-7-tab" data-toggle="pill" href="#vert-tabs-7" role="tab" aria-controls="vert-tabs-7" aria-selected="false"><i class="far fa-edit"></i> Factibilidad</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-8-tab" data-toggle="pill" href="#vert-tabs-8" role="tab" aria-controls="vert-tabs-8" aria-selected="false"><i class="far fa-edit"></i> Archivo</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-9-tab" data-toggle="pill" href="#vert-tabs-9" role="tab" aria-controls="vert-tabs-9" aria-selected="false"><i class="far fa-edit"></i> Cancelación</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" onclick="list_seguimiento();" id="vert-tabs-10-tab" data-toggle="pill" href="#vert-tabs-10" role="tab" aria-controls="vert-tabs-10" aria-selected="false"><i class="far fa-edit"></i> Seguimiento</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-11-tab" data-toggle="pill" href="#vert-tabs-11" role="tab" aria-controls="vert-tabs-11" aria-selected="false"><i class="far fa-edit"></i> Selección</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-12-tab" data-toggle="pill" href="#vert-tabs-12" role="tab" aria-controls="vert-tabs-12" aria-selected="false"><i class="far fa-edit"></i> Fuentes y estrategias de reclutamiento</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" id="vert-tabs-13-tab" data-toggle="pill" href="#vert-tabs-13" role="tab" aria-controls="vert-tabs-13" aria-selected="false"><i class="far fa-edit"></i> Evaluación de la calidad</a>
                      </li>
                  </ul>
              </div>
          </div>
        </div>
        
        <div class="col-7 col-sm-9 border-left">
          <div class="tab-content" id="vert-tabs-tabContent">

            <!--PROPUESTA-->
            <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
              <?php
                  $user_id=auth()->id(); 
              ?>
              <div class="row">

              <div class="col-md-6">
              <div class="form-group">
                  {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                  {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'factibilidad_id']) !!}
                  {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                  {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                  {!! Form::label('no1', '1. Fecha de propuesta', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                  </div>

                  @error('no1')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
      
              <div class="form-group" id="div3">
                  {!! Form::label('no3', '3. Fecha de inicio de la etapa', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no3', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div2">
                  {!! Form::label('no2', '2. Etapa', ['class' => 'form-label']) !!}
                  {!! Form::select('no2', ['Factibilidad' => 'Factibilidad', 'Incubación' => 'Incubación', 'Conducción' => 'Conducción', 'Terminado' => 'Terminado', 'Archivo muerto' => 'Archivo muerto', 'Destrucción' => 'Destrucción'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
              </div>
              </div>

              </div>
            </div>

            <!--CONTACTOS-->
            <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div4">
                  {!! Form::label('no4', '4. Contacto de factibilidad', ['class' => 'form-label']) !!}
                  {!! Form::text('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div5">
                  {!! Form::label('no5', '5. Se llenó tarjeta de contacto de factibilidad', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no5', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no5', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              </div>
            </div>


            <!--ANALISIS-->
            <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div6">
                  {!! Form::label('no6', '6. ¿El estudio es éticamente aceptable para la empresa?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no6', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no6', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div8">
                  {!! Form::label('no8', '8. ¿El estudio es éticamente aceptable para el investigador?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no8', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no8', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div10">
                  {!! Form::label('no10', '10. ¿Existe evidencia de dificultades en un estudio previo con patología o criterios similares?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no10', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no10', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div12">
                  {!! Form::label('no12', '12. ¿El estudio debe cancelarse?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no12', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no12', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div7">
                  {!! Form::label('no7', '7. ¿El estudio es técnicamente aceptable para la empresa?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no7', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no7', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div9">
                  {!! Form::label('no9', '9. ¿El estudio es médicamente aceptable para el investigador?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no9', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no9', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div11">
                  {!! Form::label('no11', '11. ¿Se comentó con la dirección?', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no11', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no11', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div13">
                  {!! Form::label('no13', '13. Fecha de respuesta al cliente', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no13', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>
              </div>

              </div>
            </div>


            <!--CONFIDENCIALIDAD-->
            <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div14">
                  {!! Form::label('no14', '14. Firmó Confidencialidad con el patrocinador', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no14', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no14', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div16">
                  {!! Form::label('no16', '16. Envió por paquetería Confidencialidad firmada ', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no16', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no16', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div18">
                  {!! Form::label('no18', '18. Courier', ['class' => 'form-label']) !!}
                  {!! Form::text('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese courier']) !!}
              </div>

              <div class="form-group" id="div20">
                  {!! Form::label('no20', '20. Fecha en que confirmó de recibido', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no20', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div15">
                  {!! Form::label('no15', '15. Fecha de envío electrónico de Confidencialidad firmada por UIS', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no15', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>

              <div class="form-group" id="div17">
                  {!! Form::label('no17', '17. Fecha de envío por paquetería de Confidencialidad firmada', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no17', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>

              <div class="form-group" id="div19">
                  {!! Form::label('no19', '19. Número de guía', ['class' => 'form-label']) !!}
                  {!! Form::text('no19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese guía']) !!}
              </div>
              </div>

              </div>
            </div>


            <!--ARCHIVO-->
            <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div21">
                  {!! Form::label('no21', '21. Abrió carpeta de archivo electrónico', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no21', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no21', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div23">
                  {!! Form::label('no23', '23. Archivó la confidencialidad firmada en archivo electrónico, con el nombre CDA Dra. Velázquez + fecha', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no23', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no23', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div22">
                  {!! Form::label('no22', '22. Archivó el contacto electrónico inicial con el nombre Contacto inicial + fecha', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no22', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no22', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div24">
                  {!! Form::label('no24', '24. Archivó la confidencialidad firmada en la incubadora de proyectos', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no24', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no24', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              </div>
            </div>


            <!--EQUIPAMIENTO-->
            <div class="tab-pane fade" id="vert-tabs-6" role="tabpanel" aria-labelledby="vert-tabs-6-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div25">
                  {!! Form::label('no25', '25. Se verificó el equipamiento', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no25', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no25', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div27">
                  {!! Form::label('no27', '27. Problemas de equipamiento', ['class' => 'form-label']) !!}
                  {!! Form::textarea('no27', null, ['class' => 'form-control', 'placeholder' => 'Ingrese problema. Enumerar problemas']) !!}
              </div>

              <div class="form-group" id="div29">
                  {!! Form::label('no29', '29. Se pudieron resolver todos los problemas de equipamiento', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no29', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no29', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div31">
                  {!! Form::label('no31', '31. Todo el equipo necesario está calibrado', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no31', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no31', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div26">
                  {!! Form::label('no26', '26. Existe algún problema de equipamiento', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no26', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no26', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div28">
                  {!! Form::label('no28', '28. Soluciones', ['class' => 'form-label']) !!}
                  {!! Form::textarea('no28', null, ['class' => 'form-control', 'placeholder' => 'Ingrese solución. Enumerar soluciones']) !!}
              </div>

              <div class="form-group" id="div30">
                  {!! Form::label('no30', '30. Verificó la bitácora de mantenimiento de equipos', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no30', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no30', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              </div>
            </div>


            
            <!--FACTIBILIDAD-->
            <div class="tab-pane fade" id="vert-tabs-7" role="tabpanel" aria-labelledby="vert-tabs-7-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div32">
                  {!! Form::label('no32', '32. Fecha en que se recibió el cuestionario de factibilidad', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no32', null, ['class' => 'form-control']) !!}
                  </div>
              </div>

              <div class="form-group" id="div34">
                  {!! Form::label('no34', '34. Decisión de factibilidad', ['class' => 'form-label']) !!}
                  {!! Form::select('no34', ['Rechazo' => 'Rechazo', 'Aceptación' => 'Aceptación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div33">
                  {!! Form::label('no33', '33. Fecha de respuesta de cuestionario de factibilidad ', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no33', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              </div>

              </div>
            </div>



            <!--ARCHIVO-->
            <div class="tab-pane fade" id="vert-tabs-8" role="tabpanel" aria-labelledby="vert-tabs-8-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div35">
                  {!! Form::label('no35', '35. Archivó el correo que contiene la sinopsis del estudio y el cuestionario de factibilidad, con el nombre Sinopsis y cuestionario + fecha', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no35', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no35', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div37">
                  {!! Form::label('no37', '37. Archivó una copia del correo de respuesta FIQ enviado + fecha', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no37', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no37', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div39">
                  {!! Form::label('no39', '39. Archivó una copia del correo de confirmación FIQ recibido + fecha', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no39', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no39', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div36">
                  {!! Form::label('no36', '36. Archivó una copia del cuestionario respondido en formato electrónico', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no36', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no36', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div38">
                  {!! Form::label('no38', '38. Archivó una copia del correo de respuesta Estudio no aceptado + fecha', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no38', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no38', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>
              </div>

              </div>
            </div>



            <!--CANCELACION-->
            <div class="tab-pane fade" id="vert-tabs-9" role="tabpanel" aria-labelledby="vert-tabs-9-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div40">
                  {!! Form::label('no40', '40. Fecha de cancelación', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no40', null, ['class' => 'form-control']) !!}
                  </div>
              </div>

              <div class="form-group" id="div42">
                  {!! Form::label('no42', '42. Especifique', ['class' => 'form-label']) !!}
                  {!! Form::textarea('no42', null, ['class' => 'form-control', 'placeholder' => 'Especifique']) !!}
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div41">
                  {!! Form::label('no41', '41. Causa de cancelación', ['class' => 'form-label']) !!}
                  {!! Form::select('no41', ['Dificultades con la patología (Pacientes insuficientes)' => 'Dificultades con la patología (Pacientes insuficientes)', 'Dificultades con los criterios' => 'Dificultades con los criterios', 'Problemas de equipamiento' => 'Problemas de equipamiento', 'Éticamente inaceptable para el médico' => 'Éticamente inaceptable para el médico', 'Médicamente inaceptable' => 'Médicamente inaceptable', 'Éticamente inaceptable para la empresa' => 'Éticamente inaceptable para la empresa', 'Técnicamente inaceptable' => 'Técnicamente inaceptable', 'Rechazado por el patrocinador' => 'Rechazado por el patrocinador', 'Cancelado por Patrocinador' => 'Cancelado por Patrocinador', 'Cancelado por CE' => 'Cancelado por CE', 'Cancelado por autoridades de salud' => 'Cancelado por autoridades de salud', 'Cancelado por UIS' => 'Cancelado por UIS', 'No hubo acuerdo económico' => 'No hubo acuerdo económico', 'Otra causa' => 'Otra causa'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
              </div>
              </div>

              </div>
            </div>



            <!--SEGUIMIENTO-->
            <div class="tab-pane fade" id="vert-tabs-10" role="tabpanel" aria-labelledby="vert-tabs-10-tab">
              <div class="table-responsive">
                  <div align="left">
                      <button type="button" class="btn btn-info" onclick="CreateSeguimiento();">
                          <i class="fas fa-file"> Agregar seguimiento</i>
                      </button>  
                  </div><br/>
                  <table id="tbl_seguimiento" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                      <thead class="bg-mexg2 text-white">
                      <tr>
                          <th scope="col">Fecha de seguimiento</th>
                          <th scope="col">Resultado</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                      </tr>
                      </thead>
                  </table>
              </div>
            </div>



            <!--SELECCION-->
            <div class="tab-pane fade" id="vert-tabs-11" role="tabpanel" aria-labelledby="vert-tabs-11-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div45">
                  {!! Form::label('no45', '45. Fecha de visita de selección', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no45', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div46">
                  {!! Form::label('no46', '46. Meta de reclutamiento', ['class' => 'form-label']) !!}
                  {!! Form::text('no46', null, ['class' => 'form-control', 'placeholder' => 'Ingrese meta']) !!}
              </div>
              </div>

              </div>
            </div>



            <!--FUENTES Y ESTRAGTEGIAS DE RECLUTAMIENTO-->
            <div class="tab-pane fade" id="vert-tabs-12" role="tabpanel" aria-labelledby="vert-tabs-12-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div47">
                  {!! Form::label('no47', '47. Consulta del Investigador principal', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no47', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no47', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div> 
              </div>

              <div class="form-group" id="div49">
                  {!! Form::label('no49', '49. Tarjeta de bolsillo', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no49', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no49', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div> 
              </div>

              <div class="form-group" id="div51">
                  {!! Form::label('no51', '51. Póster', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no51', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no51', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div> 
              </div>

              <div class="form-group" id="div53">
                  {!! Form::label('no53', '53. Prensa', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no53', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no53', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div> 
              </div>

              <div class="form-group" id="div55">
                  {!! Form::label('no55', '55. Debe elaborar el FC Publicidad', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no55', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no55', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div> 
              </div>

              <div class="form-group" id="div57">
                  {!! Form::label('no57', '57. Existen observaciones especiales en este estudio', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no57', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no57', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div> 
              </div>

              <div class="form-group" id="div59">
                  {!! Form::label('no59', '59. Fecha probable de sometimiento', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no59', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>

              <div class="form-group" id="div60">
                  {!! Form::label('no60', '60. Fecha estimada de cierre de reclutamiento', ['class' => 'form-label']) !!}
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      {!! Form::date('no60', null, ['class' => 'form-control']) !!}
                  </div> 
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div48">
                  {!! Form::label('no48', '48. Otros médicos o profesionales', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no48', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no48', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div50">
                  {!! Form::label('no50', '50. Grupos sociales', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no50', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no50', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div52">
                  {!! Form::label('no52', '52. Población abierta', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no52', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no52', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div54">
                  {!! Form::label('no54', '54. Web', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no54', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no54', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div56">
                  {!! Form::label('no56', '56. Entregó al patrocinador el FC Publicidad, adaptado para el estudio, para su aprobación ', ['class' => 'form-label']) !!}
                  <div>
                      <label>
                          {!! Form::radio('no56', 'Si', null, ['class' => 'mr-1']) !!}
                          Si
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <label>
                          {!! Form::radio('no56', 'No', null, ['class' => 'mr-1']) !!}
                          No
                      </label>
                  </div>
              </div>

              <div class="form-group" id="div58">
                  {!! Form::label('no58', '58. Observaciones especiales', ['class' => 'form-label']) !!}
                  {!! Form::textarea('no58', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la observación. Enumerarlas']) !!}
              </div>
              </div>

              </div>
            </div>



            <!--EVALUACION DE CALIDAD-->
            <div class="tab-pane fade" id="vert-tabs-13" role="tabpanel" aria-labelledby="vert-tabs-13-tab">

              <div class="row">

              <div class="col-md-6">
              <div class="form-group" id="div61">
                  {!! Form::label('no61', '61. Días hábiles entre 37. Fecha en que se recibió el cuestionario de factibilidad y 39. Fecha de respuesta del cuestionario de factibilidad', ['class' => 'form-label']) !!}
                  {!! Form::text('no61', null, ['class' => 'form-control', 'placeholder' => 'Ingrese días']) !!}
              </div>
              </div>

              <div class="col-md-6">
              <div class="form-group" id="div62">
                  {!! Form::label('no62', '62. Se cumplió el Objetivo de la calidad número 1, Tiempo de factibilidad ≤ 3 días hábiles', ['class' => 'form-label']) !!}
                  {!! Form::text('no62', null, ['class' => 'form-control', 'placeholder' => 'Ingrese días']) !!}
              </div>
              </div>

              </div>
            </div>



            
          </div>
        </div>

      </div>
  </div>
</div>