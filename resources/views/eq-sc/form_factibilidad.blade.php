    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Factibilidad
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('eq-sc.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
            </div>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Proyecto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Cuestionario</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="list_seguimientofact();" class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Seguimiento</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--PROYECTO-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <!--PROPUESTA--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Propuesta</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('factibilidad_id', null, ['class' => 'form-control', 'id'=>'factibilidad_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('f1', '1. Fecha de propuesta', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('f1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="divf2">
                        {!! Form::label('f2', '2. Etapa', ['class' => 'form-label']) !!}
                        {!! Form::text('f2', 'Incubación', ['class' => 'form-control', 'placeholder' => 'Ingrese etapa', 'readonly' => 'readonly']) !!}
                    </div>
            
                    <div class="form-group" id="divf3">
                        {!! Form::label('f3', '3. Fecha de inicio de la etapa', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f3', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf4">
                        {!! Form::label('f4', '4. Contacto de factibilidad', ['class' => 'form-label']) !!}
                        {!! Form::text('f4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="divf5">
                        {!! Form::label('f5', '5. Se llenó tarjeta de contacto de factibilidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f5', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f5', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN PROPUESTA-->


                    <!--ANALISIS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Análisis</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divf6">
                        {!! Form::label('f6', '6. ¿El estudio es éticamente aceptable para la empresa?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f6', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f6', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf7">
                        {!! Form::label('f7', '7. ¿El estudio es técnicamente aceptable para la empresa?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f7', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f7', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf8">
                        {!! Form::label('f8', '8. ¿El estudio es éticamente aceptable para el investigador?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f8', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f8', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf9">
                        {!! Form::label('f9', '9. ¿El estudio es médicamente aceptable para el investigador?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f9', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f9', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf10">
                        {!! Form::label('f10', '10. ¿Existe evidencia de dificultades en un estudio previo con patología o criterios similares?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f10', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f10', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf11">
                        {!! Form::label('f11', '11. ¿Se comentó con la dirección?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f11', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f11', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf12">
                        {!! Form::label('f12', '12. ¿El estudio debe cancelarse?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f12', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f12', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf13">
                        {!! Form::label('f13', '13. Fecha de respuesta al cliente', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f13', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div><!--FIN ANALISIS-->


                    <!--CONFIDENCIALIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Confidencialidad</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divf14">
                        {!! Form::label('f14', '14. Firmó Confidencialidad con el patrocinador', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f14', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f14', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf15">
                        {!! Form::label('f15', '15. Fecha de envío electrónico de Confidencialidad firmada por UIS', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f15', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group" id="divf16">
                        {!! Form::label('f16', '16. Abrió carpeta de archivo electrónico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f16', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f16', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf17">
                        {!! Form::label('f17', '17. Archivó el contacto electrónico inicial con el nombre Contacto inicial + fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f17', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f17', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf18">
                        {!! Form::label('f18', '18. Archivó la confidencialidad firmada en archivo electrónico, con el nombre CDA Dra. Velázquez + fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f18', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f18', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf19">
                        {!! Form::label('f19', '19. Archivó la confidencialidad firmada en la incubadora de proyectos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f19', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f19', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN CONFIDENCIALIDAD-->



                    <!--EQUIPO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Equipo del estudio</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divf20">
                        {!! Form::label('f20', '20. Investigador principal (Nombre completo)', ['class' => 'form-label']) !!}
                        {!! Form::select('f20', $investigadores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="divf21">
                        {!! Form::label('f21', '21. Se llenó tarjeta de contacto del investigador principal', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f21', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f21', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf22">
                        {!! Form::label('f22', '22. Envió al investigador principal el FC Presentación', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f22', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f22', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf23">
                        {!! Form::label('f23', '23. El investigador principal firmó acuerdo de confidencialidad para el estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f23', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f23', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf24">
                        {!! Form::label('f24', '24. Envió la confidencialidad firmada por el investigador principal por vía electrónica', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f24', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f24', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN EQUIPO-->



                    <!--EQUIPAMIENTO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Equipamiento</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group" id="divf25">
                        {!! Form::label('f25', '25. Se verificó el equipamiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f25', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f25', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf26">
                        {!! Form::label('f26', '26. Existe algún problema de equipamiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f26', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f26', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEquipamientoFact();">
                                <i class="fas fa-file"> Agregar problema</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_equipamientofact" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Problema de equipamiento</th>
                                <th scope="col">Solución</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="col-md-6"><br/>
                    <div class="form-group" id="divf29">
                        {!! Form::label('f29', '29. Se pudieron resolver todos los problemas de equipamiento', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f29', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f29', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf30">
                        {!! Form::label('f30', '30. Verificó la bitácora de mantenimiento de equipos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f30', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f30', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6"><br/>
                    <div class="form-group" id="divf31">
                        {!! Form::label('f31', '31. Todo el equipo necesario está calibrado', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f31', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f31', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div><!--FIN EQUIPAMIENTO-->

                  </div><!--FIN DE TAB PROYECTO-->





                  <!--CUESTIONARIO-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Factibilidad</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf32">
                        {!! Form::label('f32', '1. Fecha en que se recibió el cuestionario de factibilidad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f32', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divf33">
                        {!! Form::label('f33', '2. Fecha de respuesta de cuestionario de factibilidad ', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f33', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divf34">
                        {!! Form::label('f34', '3. Decisión de factibilidad', ['class' => 'form-label']) !!}
                        {!! Form::select('f34', ['Rechazo' => 'Rechazo', 'Aceptación' => 'Aceptación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="divf35">
                        {!! Form::label('f35', '4. Archivó el correo que contiene la sinopsis del estudio y el cuestionario de factibilidad, con el nombre Sinopsis y cuestionario + fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f35', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f35', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf36">
                        {!! Form::label('f36', '5. Archivó una copia del cuestionario respondido en formato electrónico', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f36', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f36', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf37">
                        {!! Form::label('f37', '6. Archivó una copia del correo de respuesta FIQ enviado + fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f37', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f37', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf38">
                        {!! Form::label('f38', '7. Archivó una copia del correo de respuesta Estudio no aceptado + fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f38', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f38', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f38', 'No aplica', null, ['class' => 'mr-1']) !!}
                                No aplica
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf39">
                        {!! Form::label('f39', '8. Archivó una copia del correo de confirmación FIQ recibido + fecha', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f39', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f39', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    </div>

                  </div><!--FIN DE TAB CUESTIONARIO-->





                  <!--SEGUIMIENTO-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">

                    <!--CANCELACION-->
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Cancelación</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf40">
                        {!! Form::label('f40', '1. Fecha de cancelación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f40', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divf41">
                        {!! Form::label('f41', '2. Causa de cancelación', ['class' => 'form-label']) !!}
                        {!! Form::select('f41', ['Dificultades con la patología (Pacientes insuficientes)' => 'Dificultades con la patología (Pacientes insuficientes)', 'Dificultades con los criterios' => 'Dificultades con los criterios', 'Problemas de equipamiento' => 'Problemas de equipamiento', 'Éticamente inaceptable para el médico' => 'Éticamente inaceptable para el médico', 'Médicamente inaceptable' => 'Médicamente inaceptable', 'Éticamente inaceptable para la empresa' => 'Éticamente inaceptable para la empresa', 'Técnicamente inaceptable' => 'Técnicamente inaceptable', 'Rechazado por el patrocinador' => 'Rechazado por el patrocinador', 'Cancelado por Patrocinador' => 'Cancelado por Patrocinador', 'Cancelado por CE' => 'Cancelado por CE', 'Cancelado por autoridades de salud' => 'Cancelado por autoridades de salud', 'Cancelado por UIS' => 'Cancelado por UIS', 'No hubo acuerdo económico' => 'No hubo acuerdo económico', 'Otra causa' => 'Otra causa'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf42">
                        {!! Form::label('f42', '3. Si es otra causa o, especifique', ['class' => 'form-label']) !!}
                        {!! Form::textarea('f42', null, ['class' => 'form-control', 'placeholder' => 'Especifique']) !!}
                    </div>
                    </div>

                    </div><!--FIN CANCELACION-->



                    <!--SEGUIMIENTO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Seguimiento</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateSeguimientoFact();">
                                <i class="fas fa-file"> Agregar seguimiento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_seguimientofact" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
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

                    </div><!--FIN SEGUIMIENTO-->



                    <!--SELECCION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Selección</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf45">
                        {!! Form::label('f45', '6. Fecha de visita de selección', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f45', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf46">
                        {!! Form::label('f46', '7. Meta de reclutamiento', ['class' => 'form-label']) !!}
                        {!! Form::text('f46', null, ['class' => 'form-control', 'placeholder' => 'Ingrese meta']) !!}
                    </div>
                    </div>

                    </div><!--FIN SELECCION-->



                    <!--FUENTES--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Fuentes y estrategias de reclutamiento</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf47">
                        {!! Form::label('f47', '8. Consulta del Investigador principal', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f47', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f47', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div> 
                    </div>

                    <div class="form-group" id="divf48">
                        {!! Form::label('f48', '9. Otros médicos o profesionales', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f48', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f48', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf49">
                        {!! Form::label('f49', '10. Tarjeta de bolsillo', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f49', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f49', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div> 
                    </div>

                    <div class="form-group" id="divf50">
                        {!! Form::label('f50', '11. Grupos sociales', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f50', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f50', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf51">
                        {!! Form::label('f51', '12. Póster', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f51', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f51', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div> 
                    </div>

                    <div class="form-group" id="divf52">
                        {!! Form::label('f52', '13. Población abierta', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f52', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f52', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf53">
                        {!! Form::label('f53', '14. Prensa', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f53', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f53', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div> 
                    </div>

                    <div class="form-group" id="divf54">
                        {!! Form::label('f54', '15. Web', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f54', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f54', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf55">
                        {!! Form::label('f55', '16. Debe elaborar el FC Publicidad', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f55', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f55', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div> 
                    </div>

                    <div class="form-group" id="divf56">
                        {!! Form::label('f56', '17. Entregó al patrocinador el FC Publicidad, adaptado para el estudio, para su aprobación ', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f56', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f56', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="divf57">
                        {!! Form::label('f57', '18. Existen observaciones especiales en este estudio', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('f57', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('f57', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div> 
                    </div>

                    <div class="form-group" id="divf58">
                        {!! Form::label('f58', '19. Observaciones especiales', ['class' => 'form-label']) !!}
                        {!! Form::textarea('f58', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la observación. Enumerarlas']) !!}
                    </div>

                    <div class="form-group" id="divf59">
                        {!! Form::label('f59', '20. Fecha probable de sometimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('f59', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div><!--FIN FUENTES-->


                    <!--EVALUACION--> <br/>
                  <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Evaluación de la calidad</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf60">
                        {!! Form::label('f60', '21. Días hábiles entre 37. Fecha en que se recibió el cuestionario de factibilidad y 39. Fecha de respuesta del cuestionario de factibilidad', ['class' => 'form-label']) !!}
                        {!! Form::text('f60', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divf61">
                        {!! Form::label('f61', '22. Se cumplió el Objetivo de la calidad número 1, Tiempo de factibilidad ≤ 3 días hábiles', ['class' => 'form-label']) !!}
                        {!! Form::text('f61', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    </div><!--FIN EVALUACION-->

                  </div><!--FIN DE TAB SEGUIMIENTO-->



                </div>
              </div>

              
            </div>
        </div>
    </div>



                    
                  