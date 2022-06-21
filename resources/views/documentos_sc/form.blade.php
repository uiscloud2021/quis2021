<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-edit"></i>
        @if ($tipo == 'esp')
        CV Español
        @endif
        @if ($tipo == 'eng')
        CV English
        @endif
      </h3>
    </div>
    <div class="card-body">

        {{-- =============================================================================================================================================================== --}}

        @if ($tipo == 'esp')
        <div class="row">
            <div class="col-5 col-sm-3">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Menú de preguntas</h3>
                  </div>
                  <div class="card-body p-0">
                      <ul class="nav flex-column nav-tabs">
                          <li class="nav-item">
                              <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Datos generales</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Datos de contacto</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Afiliación para investigación</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Educación (licenciatura, especialidad, postgrados)</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false"><i class="far fa-edit"></i> Experiencia laboral</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-6-tab" data-toggle="pill" href="#vert-tabs-6" role="tab" aria-controls="vert-tabs-6" aria-selected="false"><i class="far fa-edit"></i> Cédulas profesionales</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-7-tab" data-toggle="pill" href="#vert-tabs-7" role="tab" aria-controls="vert-tabs-7" aria-selected="false"><i class="far fa-edit"></i> Entrenamientos en GCP</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-8-tab" data-toggle="pill" href="#vert-tabs-8" role="tab" aria-controls="vert-tabs-8" aria-selected="false"><i class="far fa-edit"></i> Experiencia en Investigación</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-9-tab" data-toggle="pill" href="#vert-tabs-9" role="tab" aria-controls="vert-tabs-9" aria-selected="false"><i class="far fa-edit"></i> Estudios clínicos</a>
                          </li>
                      </ul>
                  </div>
              </div>
            </div>
            
            <div class="col-7 col-sm-9 border-left">
              <div class="tab-content" id="vert-tabs-tabContent">
    
                <!--DATOS GENERALES-->
                <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                  <?php
                      $user_id=auth()->id(); 
                  ?>
                  <div class="row">
    
                  <div class="col-md-6">
                  <div class="form-group">
                      {{-- {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!} --}}
                      {{-- {!! Form::hidden('id', $cv->id, ['class' => 'form-control', 'id'=>'id']) !!} --}}
                      {!! Form::hidden('tipo', $tipo, ['class' => 'form-control', 'id'=>'tipo']) !!}
                      {{-- {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!} --}}
    
                      {!! Form::label('no1', '1. Nombre completo', ['class' => 'form-label']) !!}
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo' ,'required']) !!}
                      </div>
                  </div>
          
                  </div>
    
                  <div class="col-md-6">
                  <div class="form-group" id="div2">
                      {!! Form::label('no2', '2. Título académico', ['class' => 'form-label']) !!}
                      {!! Form::text('no2', null, ['class' => 'form-control', 'placeholder' => 'Título académico', 'required']) !!}
                  </div>
                  </div>
    
                  </div>
                </div>
    
                <!--DATOS DE CONTACTO-->
                <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
    
                  <div class="row">
    
                  <div class="col-md-6">
                    <div class="form-group" id="div3">
                        {!! Form::label('no3', '3. Institución/Empresa', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Institución/Empresa']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div4">
                        {!! Form::label('no4', '4. Domicilio', ['class' => 'form-label']) !!}
                        {!! Form::text('no4', null, ['class' => 'form-control', 'placeholder' => 'Domicilio', 'required']) !!}
                    </div>
                      
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div5">
                        {!! Form::label('no5', '5. Correo electrónico', ['class' => 'form-label']) !!}
                        {!! Form::text('no5', null, ['class' => 'form-control', 'placeholder' => 'Correo electrónico']) !!}
                    </div>
                  </div>
    
                  <div class="col-md-6">
                    <div class="form-group" id="div6">
                        {!! Form::label('no6', '6. Teléfono', ['class' => 'form-label']) !!}
                        {!! Form::text('no6', null, ['class' => 'form-control', 'placeholder' => 'Teléfono']) !!}
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div7">
                        {!! Form::label('no7', '7. Móvil', ['class' => 'form-label']) !!}
                        {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Móvil']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div8">
                        {!! Form::label('no8', '8. Fax', ['class' => 'form-label']) !!}
                        {!! Form::text('no8', null, ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
                    </div>
                  </div>
    
                  </div>
                </div>
    
    
                <!--AFILIACION PARA INVESTIGACION-->
                <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
    
                    <div class="form-group">
                        <div class="row p-1">
                            
                            <div class="col-md">
                                {!! Form::label('no9', '9. Institucion', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no10', '10. Departamento', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no11', '11. Dirección', ['class' => 'form-label']) !!}
                            </div>
        
                        </div>
        
                        <div id="wrapper_afiliacion">
                            <div class="row p-1">
            
                                <div class="col-md">
                
                                    {!! Form::label('no9', '9. Institución', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no9', 'Unidad de Investigación en Salud', ['class' => 'form-control', 'placeholder' => 'Nombre Institución', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no10', '10. Departamento', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::select('no10', [ 'Sitio Clínico Chihuahua' => 'Sitio Clínico Chihuahua', 'Sitio Clínico Juárez' => 'Sitio Clínico Juárez', 'Sitio Clínico UIS Charcot' => 'Sitio Clínico UIS Charcot', 'Sitio Clínico Guadalajara' => 'Sitio Clínico Guadalajara' ], null, ['class' => 'form-control', 'placeholder' => 'Departamento', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                                
                                    {!! Form::label('no11', '11. Dirección', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::select('no11', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'required']) !!}
                
                                </div>
        
                                <button type="button" id="add_afiliacion" onclick="addCamposAfiliacion();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
        
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
    
                <!--EDUCACION (LICENCIATURA, ESPECIALIDAD, POSGRADOS)-->
                <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
                            
                            <div class="col-md">
                                {!! Form::label('no12', '12. Grado', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no13', '13. Institución', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no14', '14. Especialidad', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no15', '15. Año terminación', ['class' => 'form-label']) !!}
                            </div>
    
                        </div>
    
                        <div id="wrapper_educacion">
                            <div class="row p-1">
            
                                <div class="col-md">
                                    
                                    {!! Form::label('no12', '12. Grado', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Grado', 'required']) !!}
                    
                                </div>
            
                                <div class="col-md">
            
                                    {!! Form::label('no13', '13. Institución', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Institución', 'required']) !!}
                    
                                </div>
                    
                                <div class="col-md">
                                    
                                    {!! Form::label('no14', '14. Especialidad', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Especialidad', 'required']) !!}
                                
                                </div>
            
                                <div class="col-md">
            
                                    {!! Form::label('no15', '15. Año terminación', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no15', null, ['class' => 'form-control', 'placeholder' => 'Año terminación', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_educacion" onclick="addCamposEducacion();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
            
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
    
                <!--EXPERIENCIA LABORAL-->
                <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
    
                            <div class="col-md">{!! Form::label('no16', '16. Puesto', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no17', '17. Institución / Departamento', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no18', '18. Año de inicio', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no19', '19. Año fin', ['class' => 'form-label']) !!}</div>
    
                        </div>
    
    
                        <div id="wrapper_experiencia">
                            <div class="row p-1">
              
                                <div class="col-md">
                
                                    {!! Form::label('no16', '16. Puesto', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no16', null, ['class' => 'form-control', 'placeholder' => 'Puesto', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no17', '17. Institución / Departamento', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no17', null, ['class' => 'form-control', 'placeholder' => 'Institución / Departamento', 'required']) !!}
                        
                                </div>
                        
                                <div class="col-md">
                                    
                                    {!! Form::label('no18', '18. Año de inicio', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no18', null, ['class' => 'form-control', 'placeholder' => 'Año de inicio', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no19', '19. Año fin', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no19', null, ['class' => 'form-control', 'placeholder' => 'Año fin', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_experiencia" onclick="addCamposExperiencia();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
              
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
                <!--CEDULAS PROFECIONALES-->
                <div class="tab-pane fade" id="vert-tabs-6" role="tabpanel" aria-labelledby="vert-tabs-6-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
                            <div class="col-md">{!! Form::label('no20', '20. Título', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no21', '21. Institución', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no22', '22. Cédula', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no23', '23. Año', ['class' => 'form-label']) !!}</div>
                        </div>
    
    
                        <div id="wrapper_cedula">
                            <div class="row p-1">
              
                                <div class="col-md">
                
                                    {!! Form::label('no20', '20. Título', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no20', null, ['class' => 'form-control', 'placeholder' => 'Título', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                        
                                    {!! Form::label('no21', '21. Institución', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no21', null, ['class' => 'form-control', 'placeholder' => 'Institución', 'required']) !!}
                        
                                </div>
                        
                                <div class="col-md">
                
                                    {!! Form::label('no22', '22. Cédula', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no22', null, ['class' => 'form-control', 'placeholder' => 'Cédula', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no23', '23. Año', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no23', null, ['class' => 'form-control', 'placeholder' => 'Año', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_cedula" onclick="addCamposCedulas();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
              
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
                
                <!--ENTRENAMIENTOS EN GCP-->
                <div class="tab-pane fade" id="vert-tabs-7" role="tabpanel" aria-labelledby="vert-tabs-7-tab">
    
                    <div class="form-group">
    
    
                        <div class="row p-1">
                            <div class="col-md">{!! Form::label('no24', '24. Proveedor', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no25', '25. Título', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no26', '26. Versión', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no27', '27. Fecha fin', ['class' => 'form-label']) !!}</div>
                        </div>
    
    
                        <div id="wrapper_entrenamiento">
                            <div class="row p-1">
                            
                                <div class="col-md">
            
                                    {!! Form::label('no24', '24. Proveedor', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no24', null, ['class' => 'form-control', 'placeholder' => 'Proveedor', 'required']) !!}
            
                                </div>
            
                                <div class="col-md">
                    
                                    {!! Form::label('no25', '25. Título', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no25', null, ['class' => 'form-control', 'placeholder' => 'Título', 'required']) !!}
                    
                                </div>
                    
                                <div class="col-md">
            
                                    {!! Form::label('no26', '26. Versión', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no26', null, ['class' => 'form-control', 'placeholder' => 'Versión', 'required']) !!}
            
                                </div>
            
                                <div class="col-md">
            
                                    {!! Form::label('no27', '27. Fecha fin', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::date('no27', null, ['class' => 'form-control', 'placeholder' => 'Fecha fin', 'required']) !!}
                    
                                </div>
            
                                <button type="button" id="add_entrenamiento" onclick="addCamposEntrenamientos();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
            
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
    
                <!--EXPERIENCIA EN INVESTIGACION-->
                <div class="tab-pane fade" id="vert-tabs-8" role="tabpanel" aria-labelledby="vert-tabs-8-tab">
                    {!! Form::label('no', 'Tipo de estudio:', ['class' => 'form-label']) !!}
    
                    <div class="container form-group">
    
                        <div class="row">
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 1, null,['class' => 'form-check-input']) !!}
                                Academia
                               </label>
                            </div>
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 2, null,['class' => 'form-check-input']) !!}
                                Gobierno
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 3, null,['class' => 'form-check-input']) !!}
                                Industria
                                </label>
                            </div>
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 4, null,['class' => 'form-check-input']) !!}
                                Iniciativa del Investigador
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 5, null,['class' => '28check form-check-input']) !!}
                                Otro (Especifique)
                                </label>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group" id="div29">
                                    {!! Form::label('no29', '29. Otro (Especifique)', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no29', null, ['class' => 'form-control', 'placeholder' => 'Otro (Especifique)', 'readonly']) !!}
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
    
    
                <!--ESTUDIOS CLINICOS-->
                <div class="tab-pane fade" id="vert-tabs-9" role="tabpanel" aria-labelledby="vert-tabs-9-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
                            <div class="col m-3">
                                <label>
                                    {!! Form::checkbox('no', 0, null,['class' => 'form-check-input']) !!}
                                    Sin experiencia en investigación clínica
                                </label>
                            </div>
                        </div>
        
    
                        <div class="row p-1">
                            <div class="col-md">{!! Form::label('no30', '30. Fase', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no31', '31. Área terapéutica', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no32', '32. Estudios terminados', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no33', '33. Estudios en desarrollo', ['class' => 'form-label']) !!}</div>
                        </div>
    
    
                        <div id="wrapper_estudio">
                            <div class="row p-1">
        
                                <div class="col-md">
                
                                    {!! Form::label('no30', '30. Fase', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no30', null, ['class' => 'form-control', 'placeholder' => 'Fase', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no31', '31. Área terapéutica', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no31', null, ['class' => 'form-control', 'placeholder' => 'Área terapéutica', 'required']) !!}
                    
                                </div>
                    
                                <div class="col-md">
                
                                    {!! Form::label('no32', '32. Estudios terminados', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no32', null, ['class' => 'form-control', 'placeholder' => 'Estudios terminados', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no33', '33. Estudios en desarrollo', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no33', null, ['class' => 'form-control', 'placeholder' => 'Estudios en desarrollo', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_estudio" onclick="addCamposEstudios();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
            
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
                
              </div>
            </div>
    
          </div>
        @endif


        {{-- =============================================================================================================================================================== --}}


        @if ($tipo == 'eng')
        <div class="row">
            <div class="col-5 col-sm-3">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Questions menu</h3>
                  </div>
                  <div class="card-body p-0">
                      <ul class="nav flex-column nav-tabs">
                          <li class="nav-item">
                              <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> General data</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Contact information</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Research affiliation</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Education (bachelor´s degree, specialty, postgraduate)</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false"><i class="far fa-edit"></i> Work experience</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-6-tab" data-toggle="pill" href="#vert-tabs-6" role="tab" aria-controls="vert-tabs-6" aria-selected="false"><i class="far fa-edit"></i> Professional certificates</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-7-tab" data-toggle="pill" href="#vert-tabs-7" role="tab" aria-controls="vert-tabs-7" aria-selected="false"><i class="far fa-edit"></i> GCP training</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-8-tab" data-toggle="pill" href="#vert-tabs-8" role="tab" aria-controls="vert-tabs-8" aria-selected="false"><i class="far fa-edit"></i> Research experience</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="vert-tabs-9-tab" data-toggle="pill" href="#vert-tabs-9" role="tab" aria-controls="vert-tabs-9" aria-selected="false"><i class="far fa-edit"></i> Clinical studies</a>
                          </li>
                      </ul>
                  </div>
              </div>
            </div>
            
            <div class="col-7 col-sm-9 border-left">
              <div class="tab-content" id="vert-tabs-tabContent">
    
                <!--DATOS GENERALES-->
                <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                  <?php
                      $user_id=auth()->id(); 
                  ?>
                  <div class="row">
    
                  <div class="col-md-6">
                  <div class="form-group">
                      {{-- {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!} --}}
                      {{-- {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'factibilidad_id']) !!} --}}
                      {!! Form::hidden('tipo', $tipo, ['class' => 'form-control', 'id'=>'tipo']) !!}
                      {{-- {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!} --}}
    
                      {!! Form::label('no1', '1. Full name', ['class' => 'form-label']) !!}
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                          {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Full name' ,'required']) !!}
                      </div>
                  </div>
          
                  </div>
    
                  <div class="col-md-6">
                  <div class="form-group" id="div2">
                      {!! Form::label('no2', '2. Academic degree', ['class' => 'form-label']) !!}
                      {!! Form::text('no2', null, ['class' => 'form-control', 'placeholder' => 'Academic degree', 'required']) !!}
                  </div>
                  </div>
    
                  </div>
                </div>
    
                <!--DATOS DE CONTACTO-->
                <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
    
                  <div class="row">
    
                  <div class="col-md-6">
                    <div class="form-group" id="div3">
                        {!! Form::label('no3', '3. Institution/Company', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Name of Institution/Company']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div4">
                        {!! Form::label('no4', '4. Address', ['class' => 'form-label']) !!}
                        {!! Form::text('no4', null, ['class' => 'form-control', 'placeholder' => 'Address', 'required']) !!}
                    </div>
                      
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div5">
                        {!! Form::label('no5', '5. E-mail', ['class' => 'form-label']) !!}
                        {!! Form::text('no5', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    </div>
                  </div>
    
                  <div class="col-md-6">
                    <div class="form-group" id="div6">
                        {!! Form::label('no6', '6. Phone number', ['class' => 'form-label']) !!}
                        {!! Form::text('no6', null, ['class' => 'form-control', 'placeholder' => 'Phone number']) !!}
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div7">
                        {!! Form::label('no7', '7. Cell-phone number', ['class' => 'form-label']) !!}
                        {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Cell-phone number']) !!}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="div8">
                        {!! Form::label('no8', '8. Fax', ['class' => 'form-label']) !!}
                        {!! Form::text('no8', null, ['class' => 'form-control', 'placeholder' => 'Fax']) !!}
                    </div>
                  </div>
    
                  </div>
                </div>
    
    
                <!--AFILIACION PARA INVESTIGACION-->
                <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
    
                    <div class="form-group">
                        <div class="row p-1">
                            
                            <div class="col-md">
                                {!! Form::label('no9', '9. Institution', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no10', '10. Department', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no11', '11. Address', ['class' => 'form-label']) !!}
                            </div>
        
                        </div>
        
                        <div id="wrapper_afiliacion">
                            <div class="row p-1">
            
                                <div class="col-md">
                
                                    {!! Form::label('no9', '9. Institution', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no9', 'Unidad de Investigación en Salud (Health Research Unit)', ['class' => 'form-control', 'placeholder' => 'Institution', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no10', '10. Department', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::select('no10', [ 'Sitio Clínico Chihuahua' => 'Sitio Clínico Chihuahua', 'Sitio Clínico Juárez' => 'Sitio Clínico Juárez', 'Sitio Clínico UIS Charcot' => 'Sitio Clínico UIS Charcot', 'Sitio Clínico Guadalajara' => 'Sitio Clínico Guadalajara' ], null, ['class' => 'form-control', 'placeholder' => 'Department', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                                
                                    {!! Form::label('no11', '11. Address', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::select('no11', [ 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.' => 'Trasviña y Retes 1317, Colonia San Felipe, Chihuahua, Chih., CP 31203, México.', 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Puente de piedra 150, Torre 2, Planta baja, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.' => 'Renato Leduc 151-4, Colonia Toriello Guerra, Tlalpan, Ciudad de México, CP 14050, México.', 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' => 'Unidad Nacional 1299, Conjunto Patria, Zapopan, Jal. CP 45150, México.' ], null, ['class' => 'form-control', 'placeholder' => 'Address', 'required']) !!}
                
                                </div>
        
                                <button type="button" id="add_afiliacion" onclick="addCamposAfiliacion();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
        
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
    
                <!--EDUCACION (LICENCIATURA, ESPECIALIDAD, POSGRADOS)-->
                <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
                            
                            <div class="col-md">
                                {!! Form::label('no12', '12. Grade', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no13', '13. Institution', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no14', '14. Specialty', ['class' => 'form-label']) !!}
                            </div>
                            <div class="col-md">
                                {!! Form::label('no15', '15. Completion year', ['class' => 'form-label']) !!}
                            </div>
    
                        </div>
    
                        <div id="wrapper_educacion">
                            <div class="row p-1">
            
                                <div class="col-md">
                                    
                                    {!! Form::label('no12', '12. Grade', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Grade', 'required']) !!}
                    
                                </div>
            
                                <div class="col-md">
            
                                    {!! Form::label('no13', '13. Institution', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Institution', 'required']) !!}
                    
                                </div>
                    
                                <div class="col-md">
                                    
                                    {!! Form::label('no14', '14. Specialty', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Specialty', 'required']) !!}
                                
                                </div>
            
                                <div class="col-md">
            
                                    {!! Form::label('no15', '15. Completion year', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no15', null, ['class' => 'form-control', 'placeholder' => 'Completion year', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_educacion" onclick="addCamposEducacion();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
            
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
    
                <!--EXPERIENCIA LABORAL-->
                <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
    
                            <div class="col-md">{!! Form::label('no16', '16. Position', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no17', '17. Institution / Department', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no18', '18. Start year', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no19', '19. End year', ['class' => 'form-label']) !!}</div>
    
                        </div>
    
    
                        <div id="wrapper_experiencia">
                            <div class="row p-1">
              
                                <div class="col-md">
                
                                    {!! Form::label('no16', '16. Position', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no16', null, ['class' => 'form-control', 'placeholder' => 'Position', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no17', '17. Institution / Department', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no17', null, ['class' => 'form-control', 'placeholder' => 'Institution / Department', 'required']) !!}
                        
                                </div>
                        
                                <div class="col-md">
                                    
                                    {!! Form::label('no18', '18. Start year', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no18', null, ['class' => 'form-control', 'placeholder' => 'Start year', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no19', '19. End year', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no19', null, ['class' => 'form-control', 'placeholder' => 'End year', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_experiencia" onclick="addCamposExperiencia();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
              
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
                <!--CEDULAS PROFECIONALES-->
                <div class="tab-pane fade" id="vert-tabs-6" role="tabpanel" aria-labelledby="vert-tabs-6-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
                            <div class="col-md">{!! Form::label('no20', '20. Degree', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no21', '21. Institution', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no22', '22. Professional license', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no23', '23. Year', ['class' => 'form-label']) !!}</div>
                        </div>
    
    
                        <div id="wrapper_cedula">
                            <div class="row p-1">
              
                                <div class="col-md">
                
                                    {!! Form::label('no20', '20. Degree', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no20', null, ['class' => 'form-control', 'placeholder' => 'Degree', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                        
                                    {!! Form::label('no21', '21. Institution', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no21', null, ['class' => 'form-control', 'placeholder' => 'Institution', 'required']) !!}
                        
                                </div>
                        
                                <div class="col-md">
                
                                    {!! Form::label('no22', '22. Professional license', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no22', null, ['class' => 'form-control', 'placeholder' => 'Professional license', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no23', '23. Year', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::number('no23', null, ['class' => 'form-control', 'placeholder' => 'Year', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_cedula" onclick="addCamposCedulas();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
              
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
                
                <!--ENTRENAMIENTOS EN GCP-->
                <div class="tab-pane fade" id="vert-tabs-7" role="tabpanel" aria-labelledby="vert-tabs-7-tab">
    
                    <div class="form-group">
    
    
                        <div class="row p-1">
                            <div class="col-md">{!! Form::label('no24', '24. Supplier', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no25', '25. Title', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no26', '26. Version', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no27', '27. Ending date', ['class' => 'form-label']) !!}</div>
                        </div>
    
    
                        <div id="wrapper_entrenamiento">
                            <div class="row p-1">
                            
                                <div class="col-md">
            
                                    {!! Form::label('no24', '24. Supplier', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no24', null, ['class' => 'form-control', 'placeholder' => 'Supplier', 'required']) !!}
            
                                </div>
            
                                <div class="col-md">
                    
                                    {!! Form::label('no25', '25. Title', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no25', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required']) !!}
                    
                                </div>
                    
                                <div class="col-md">
            
                                    {!! Form::label('no26', '26. Version', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no26', null, ['class' => 'form-control', 'placeholder' => 'Version', 'required']) !!}
            
                                </div>
            
                                <div class="col-md">
            
                                    {!! Form::label('no27', '27. Ending date', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::date('no27', null, ['class' => 'form-control', 'placeholder' => 'Ending date', 'required']) !!}
                    
                                </div>
            
                                <button type="button" id="add_entrenamiento" onclick="addCamposEntrenamientos();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
            
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
    
                <!--EXPERIENCIA EN INVESTIGACION-->
                <div class="tab-pane fade" id="vert-tabs-8" role="tabpanel" aria-labelledby="vert-tabs-8-tab">
                    {!! Form::label('no', 'Type of study:', ['class' => 'form-label']) !!}
    
                    <div class="container form-group">
    
                        <div class="row">
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 1, null,['class' => 'form-check-input']) !!}
                                Academy
                               </label>
                            </div>
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 2, null,['class' => 'form-check-input']) !!}
                                Government 
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 3, null,['class' => 'form-check-input']) !!}
                                Industry
                                </label>
                            </div>
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 4, null,['class' => 'form-check-input']) !!}
                                Researcher´s Initiative
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-check">
                                <label>
                                {!! Form::checkbox('no28[]', 5, null,['class' => '28check form-check-input']) !!}
                                Other (Specify)
                                </label>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group" id="div29">
                                    {!! Form::label('no29', '29. Other (Specify)', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no29', null, ['class' => 'no29Eng form-control', 'placeholder' => 'Other (Specify)', 'readonly']) !!}
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
    
    
                <!--ESTUDIOS CLINICOS-->
                <div class="tab-pane fade" id="vert-tabs-9" role="tabpanel" aria-labelledby="vert-tabs-9-tab">
    
                    <div class="form-group">
    
                        <div class="row p-1">
                            <div class="col m-3">
                                <label>
                                    {!! Form::checkbox('no', 0, null,['class' => 'noCheck form-check-input']) !!}
                                    No clinical research experience
                                </label>
                            </div>
                        </div>
        
    
                        <div class="row p-1">
                            <div class="col-md">{!! Form::label('no30', '30. Phase', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no31', '31. Therapeutic area', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no32', '32. Finished studies', ['class' => 'form-label']) !!}</div>
                            <div class="col-md">{!! Form::label('no33', '33. Studies in progress', ['class' => 'form-label']) !!}</div>
                        </div>
    
    
                        <div id="wrapper_estudio">
                            <div class="row p-1">
        
                                <div class="col-md">
                
                                    {!! Form::label('no30', '30. Phase', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no30', null, ['class' => 'form-control', 'placeholder' => 'Phase', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no31', '31. Therapeutic area', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no31', null, ['class' => 'form-control', 'placeholder' => 'Therapeutic area', 'required']) !!}
                    
                                </div>
                    
                                <div class="col-md">
                
                                    {!! Form::label('no32', '32. Finished studies', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no32', null, ['class' => 'form-control', 'placeholder' => 'Finished studies', 'required']) !!}
                
                                </div>
                
                                <div class="col-md">
                
                                    {!! Form::label('no33', '33. Studies in progress', ['class' => 'form-label', 'hidden']) !!}
                                    {!! Form::text('no33', null, ['class' => 'form-control', 'placeholder' => 'Studies in progress', 'required']) !!}
                    
                                </div>
    
                                <button type="button" id="add_estudio" onclick="addCamposEstudios();" class="btn btn-primary" title="Agregar campo"><i class="fas fa-plus-square"></i></button>
            
                            </div>
                        </div>
    
    
                    </div>
    
                </div>
    
    
                
              </div>
            </div>
    
          </div>
        @endif


      {{-- ============================================================================================================================================================= --}}

  </div>
</div>