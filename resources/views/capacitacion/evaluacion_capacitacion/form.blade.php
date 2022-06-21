    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Evaluación
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('evaluacion_capacitacion.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i>Evaluación</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--EVALUACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'evaluacion_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}


                        {!! Form::label('no1', '1. Fecha de evaluación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no3', '3. Nombre del curso o documentos a evaluar', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Nombre del empleado', ['class' => 'form-label']) !!}
                        {!! Form::hidden('no2', null, ['class' => 'form-control', 'id' => 'no2']) !!}
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
                    </div>

                    <div class="col-md-12">
                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateElemento();">
                                <i class="fas fa-file"> Agregar elemento a evaluar</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_elemento" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Elemento</th>
                                <th scope="col">% Cumplimiento</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div><br/>


                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateConstancia();">
                                <i class="fas fa-file"> Agregar constancia</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_constancia" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
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
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no15', '15. Calificación al curso', ['class' => 'form-label']) !!}
                        {!! Form::number('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese calificación', 'min' => '1', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no17', '17. Calificación al material de instrucción', ['class' => 'form-label']) !!}
                        {!! Form::number('no17', null, ['class' => 'form-control', 'placeholder' => 'Ingrese calificación', 'min' => '1', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no19', '19. Evaluación global a la actividad', ['class' => 'form-label']) !!}
                        {!! Form::text('no19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese calificación', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no16', '16. Calificación al instructor ', ['class' => 'form-label']) !!}
                        {!! Form::number('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese calificación', 'min' => '1', 'max' => '10']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no18', '18. Calificación al ambiente de instrucción', ['class' => 'form-label']) !!}
                        {!! Form::number('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese calificación', 'min' => '1', 'max' => '10']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  