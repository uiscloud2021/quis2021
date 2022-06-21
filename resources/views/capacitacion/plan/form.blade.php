<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Plan de capacitación
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('plan.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Plan</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>

              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">
                    
                  <!--PLAN-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>  
                  
                    {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control']) !!}

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'plan_id', 'readonly']) !!}

                        {!! Form::label('no1', '1. Fecha de programación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div> 
                    
                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Número de personas con contrato abierto', ['class' => 'form-label']) !!}
                        {!! Form::number('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Periodo', ['class' => 'form-label']) !!}
                        {!! Form::text('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese periodo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Número de cursos requeridos', ['class' => 'form-label']) !!}
                        {!! Form::number('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>
                    </div>

                    <div class="col-12"><br/>
                        <h5 style="text-align:center">Cumplimiento del plan</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no5', '5. Fecha de evaluación de cumplimiento', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no5', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Total de asistentes', ['class' => 'form-label']) !!}
                        {!! Form::hidden('no7', null, ['class' => 'form-control', 'id' => 'no7']) !!}
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

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no6', '6. Número de cursos realizados', ['class' => 'form-label']) !!}
                        {!! Form::number('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Cumplimiento total del Programa de capacitación', ['class' => 'form-label']) !!}
                        {!! Form::number('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0', 'readonly']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                  
                </div>
              </div>
            </div>
        </div>
    </div>


                    
                  