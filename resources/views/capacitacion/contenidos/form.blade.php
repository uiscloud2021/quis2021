    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Contenidos
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('contenidos.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Contenidos</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--CONTENIDOS-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'contenido_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Nombre del curso', ['class' => 'form-label']) !!}
                        {!! Form::select('no1', ['Inducción a la empresa' => 'Inducción a la empresa', 'Trabajo en equipo' => 'Trabajo en equipo', 'Seguridad' => 'Seguridad', 'Dirección' => 'Dirección', 'Liderazgo' => 'Liderazgo', 'Curso para CEI' => 'Curso para CEI', 'Actualización en la profesión' => 'Actualización en la profesión', 'Buenas prácticas clínicas' => 'Buenas prácticas clínicas', 'Proyecto de investigación' => 'Proyecto de investigación', 'Calidad' => 'Calidad', 'Sitio clínico' => 'Sitio clínico', 'Unidad clínica' => 'Unidad clínica', 'Unidad analítica' => 'Unidad analítica', 'Transporte de muestras biológicas' => 'Transporte de muestras biológicas', 'Primeros auxilios' => 'Primeros auxilios', 'Redacción científica' => 'Redacción científica', 'Metodología de la investigación' => 'Metodología de la investigación'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Objetivos específicos', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese objetivos']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Proveedor', ['class' => 'form-label']) !!}
                        {!! Form::select('no5', ['Interno' => 'Interno', 'Externo' => 'Externo', 'Mixto' => 'Mixto'], null, ['class' => 'form-control', 'id' =>'no5', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Naturaleza', ['class' => 'form-label']) !!}
                        {!! Form::select('no7', ['Teórico' => 'Teórico', 'Práctico' => 'Práctico', 'Teórico - práctico' => 'Teórico - práctico'], null, ['class' => 'form-control', 'id' =>'no7', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Duración', ['class' => 'form-label']) !!}
                        {!! Form::text('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese duración']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Cambios planeados', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cambios']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no13', '13. Conocimientos previos', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese conocimientos']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Justificación', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese justificación']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Tiempo de entrega', ['class' => 'form-label']) !!}
                        {!! Form::select('no4', ['Inducción ' => 'Inducción ', 'Continuo' => 'Continuo', 'Mixto' => 'Mixto'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. Área de la organización en que se aplica', ['class' => 'form-label']) !!}
                        <div>
                            <input type="checkbox" name="area[]" id="area1" value="Dirección">&nbsp;Dirección<br>
                            <input type="checkbox" name="area[]" id="area2" value="Comité de Ética">&nbsp;Comité de Ética<br>
                            <input type="checkbox" name="area[]" id="area3" value="Administración">&nbsp;Administración<br>
                            <input type="checkbox" name="area[]" id="area4" value="Sitio Clínico">&nbsp;Sitio Clínico<br>
                            <input type="checkbox" name="area[]" id="area5" value="Innovación y Desarrollo">&nbsp;Innovación y Desarrollo<br>
                            {!! Form::hidden('no6', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Vía de distribución', ['class' => 'form-label']) !!}
                        <div>
                            <input type="checkbox" name="via[]" id="via1" value="Presencial">&nbsp;Presencial<br>
                            <input type="checkbox" name="via[]" id="via2" value="En línea">&nbsp;En línea<br>
                            <input type="checkbox" name="via[]" id="via3" value="Presencial y en línea">&nbsp;Presencial y en línea<br>
                            {!! Form::hidden('no8', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Tipo de intervención', ['class' => 'form-label']) !!}
                        <div>
                            <input type="checkbox" name="tipo[]" id="tipo1" value="Humana">&nbsp;Humana<br>
                            <input type="checkbox" name="tipo[]" id="tipo2" value="Tecno – estructural">&nbsp;Tecno – estructural<br>
                            <input type="checkbox" name="tipo[]" id="tipo3" value="Administración del recurso humano">&nbsp;Administración del recurso humano<br>
                            <input type="checkbox" name="tipo[]" id="tipo4" value="Estratégicas y del medio">&nbsp;Estratégicas y del medio<br>
                            {!! Form::hidden('no10', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no12', '12. Ventajas clave de los individuos y la organización', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese ventajas']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no14', '14. Compensación', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese compensación']) !!}
                    </div>
                    </div>

                    <div class="col-md-12">
                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateModulo();">
                                <i class="fas fa-file"> Agregar módulo</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_modulo" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Módulo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no16', '16. Total de módulos', ['class' => 'form-label']) !!}
                        {!! Form::number('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'no16', 'step' => '0', 'readonly']) !!}
                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateTema();">
                                <i class="fas fa-file"> Agregar tema</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_tema" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Módulo</th>
                                <th scope="col">Tema</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no19', '19. Total de temas', ['class' => 'form-label']) !!}
                        {!! Form::number('no19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'id' => 'no19', 'step' => '0', 'readonly']) !!}
                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateActividad();">
                                <i class="fas fa-file"> Agregar actividad</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_actividad" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Tema</th>
                                <th scope="col">Actividad</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEvaluacion();">
                                <i class="fas fa-file"> Agregar evaluación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_evaluacion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Competencias</th>
                                <th scope="col">Evaluación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRecurso();">
                                <i class="fas fa-file"> Agregar recurso</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_recurso" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Recurso</th>
                                <th scope="col">Descripción</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  