    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Intervención
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('intervencion.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i>Lista de asistencia</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--ASISTENCIA-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'intervencion_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}


                        {!! Form::label('no1', '1. Fecha del curso', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Lugar', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese ciudad, estado, país']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Otro', ['class' => 'form-label']) !!}
                        {!! Form::text('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese otro curso']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Hora', ['class' => 'form-label']) !!}
                        {!! Form::time('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese hora']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Nombre del curso', ['class' => 'form-label']) !!}
                        {!! Form::select('no4', ['Inducción a la empresa' => 'Inducción a la empresa', 'Trabajo en equipo' => 'Trabajo en equipo', 'Seguridad' => 'Seguridad', 'Dirección' => 'Dirección', 'Liderazgo' => 'Liderazgo', 'Couching' => 'Couching', 'Curso para CEI' => 'Curso para CEI', 'Actualización en la profesión' => 'Actualización en la profesión', 'Primeros auxilios' => 'Primeros auxilios', 'Buenas prácticas clínicas' => 'Buenas prácticas clínicas', 'Proyecto de investigación' => 'Proyecto de investigación', 'Calidad' => 'Calidad', 'Sitio clínico' => 'Sitio clínico', 'Unidad clínica' => 'Unidad clínica', 'Unidad analítica' => 'Unidad analítica', 'Transporte de muestras biológicas' => 'Transporte de muestras biológicas', 'Redacción científica' => 'Redacción científica', 'Metodología de la investigación' => 'Metodología de la investigación', 'Responsabilidad social' => 'Responsabilidad social'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('no6', '6. Nombre del capacitador', ['class' => 'form-label']) !!}
                        {!! Form::hidden('no6', null, ['class' => 'form-control', 'id' => 'no6']) !!}
                        <table class="table table-striped" style="width:100%;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puesto</th>
                            </tr>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td><input type="checkbox" name="candidatos[]" id="cand{{$empleado->id}}" value="{{$empleado->id}}"></input></td>
                                    <td>{{$empleado->no62}}</td>
                                    <td>{{$empleado->no63}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="form-group" id="div18" style="display:none">
                        {!! Form::label('no18', 'Otro capacitador', ['class' => 'form-label']) !!}
                        {!! Form::text('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div19" style="display:none">
                        {!! Form::label('no19', 'Otro capacitador', ['class' => 'form-label']) !!}
                        {!! Form::text('no19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div20" style="display:none">
                        {!! Form::label('no20', 'Otro capacitador', ['class' => 'form-label']) !!}
                        {!! Form::text('no20', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div21" style="display:none">
                        {!! Form::label('no21', 'Otro capacitador', ['class' => 'form-label']) !!}
                        {!! Form::text('no21', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div22" style="display:none">
                        {!! Form::label('no22', 'Otro capacitador', ['class' => 'form-label']) !!}
                        {!! Form::text('no22', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div align="right">
                        <button type="button" class="btn btn-info" id="btnCapacitador" onclick="CreateCapacitador();">
                            <i class="fas fa-file"> Agregar capacitador</i>
                        </button>  
                    </div>
                    </div>

                    <div class="col-md-12">
                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateParticipante();">
                                <i class="fas fa-file"> Agregar participante</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_participante" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Participante</th>
                                <th scope="col">Título</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Autoridad que certifica el curso', ['class' => 'form-label']) !!}
                        {!! Form::select('no11', ['Dra. Merced Velázquez / Dirección General / Unidad de Investigación en Salud' => 'Dra. Merced Velázquez / Dirección General / Unidad de Investigación en Salud', 'Otro' => 'Otro'], null, ['class' => 'form-control', 'id' =>'no11', 'onchange' => 'Otra_Autoridad(this.value)', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group" id="div12" style="display:none">
                        {!! Form::hidden('no12', null, ['class' => 'form-control', 'id' => 'no12']) !!}
                        <table class="table table-striped" style="width:100%;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puesto</th>
                            </tr>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td><input type="checkbox" name="empleados[]" id="emp{{$empleado->id}}" value="{{$empleado->id}}"></input></td>
                                    <td>{{$empleado->no62}}</td>
                                    <td>{{$empleado->no63}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="form-group" id="div13" style="display:none">
                        {!! Form::label('no13', 'Otra autoridad que certifica el curso', ['class' => 'form-label']) !!}
                        {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div14" style="display:none">
                        {!! Form::label('no14', 'Otra autoridad que certifica el curso', ['class' => 'form-label']) !!}
                        {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div15" style="display:none">
                        {!! Form::label('no15', 'Otra autoridad que certifica el curso', ['class' => 'form-label']) !!}
                        {!! Form::text('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div16" style="display:none">
                        {!! Form::label('no16', 'Otra autoridad que certifica el curso', ['class' => 'form-label']) !!}
                        {!! Form::text('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div17" style="display:none">
                        {!! Form::label('no17', 'Otra autoridad que certifica el curso', ['class' => 'form-label']) !!}
                        {!! Form::text('no17', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div align="right" id="divbtn_autoridad" style="display:none">
                        <button type="button" class="btn btn-info" id="btnAutoridad" onclick="CreateAutoridad();">
                            <i class="fas fa-file"> Agregar autoridad</i>
                        </button>  
                    </div>

                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  