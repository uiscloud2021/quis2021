    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Responsabilidad Social
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('responsabilidad_social.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Programa</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--PROGRAMA-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Programa de Responsabilidad Social</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'responsabilidad_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                        {!! Form::hidden('num_candidatos', $num_candidatos, ['class' => 'form-control', 'id'=>'num_candidatos']) !!}

                        {!! Form::label('no1', '1. Fecha de elaboración', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div> 

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Fecha de autorización', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no3', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Responsable de elaboración', ['class' => 'form-label']) !!}
                        {!! Form::select('no2', $empleados, null, ['class' => 'form-control', 'id' =>'no2', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Persona que autoriza', ['class' => 'form-label']) !!}
                        {!! Form::select('no4', $empleados, null, ['class' => 'form-control', 'id' =>'no4', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>
                    </div>

                    <!--CAUSAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Causas</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no5', '5. Código de la actividad', ['class' => 'form-label']) !!}
                        {!! Form::text('no5', $codigo, ['class' => 'form-control', 'placeholder' => 'Ingrese código', 'id' => 'no5', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Nombre del beneficiario', ['class' => 'form-label']) !!}
                        {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Persona de contacto', ['class' => 'form-label']) !!}
                        {!! Form::text('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Participación de UIS', ['class' => 'form-label']) !!}
                        {!! Form::number('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese participación', 'min' => '0', 'max' => '100']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no12', '12. Requiere seguimiento', ['class' => 'form-label']) !!}
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

                    <div class="form-group">
                        {!! Form::label('no13', '13. Frecuencia', ['class' => 'form-label']) !!}
                        {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese frecuencia']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no14', '14. Duración', ['class' => 'form-label']) !!}
                        {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese duración']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no6', '6. Causa', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese causa']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Nombre de la actividad', ['class' => 'form-label']) !!}
                        {!! Form::text('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Costo total del proyecto', ['class' => 'form-label']) !!}
                        {!! Form::number('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>
                    </div>

                    </div><!--FIN CAUSAS-->


                    <!--ACCIONES--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Acciones</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateAcciones();">
                                <i class="fas fa-file"> Agregar acción</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_acciones" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha programada</th>
                                <th scope="col">Fecha realizada</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN ACCIONES-->



                    <!--CALIDAD--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Calidad</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no23', '23. Actividades planeadas en el año', ['class' => 'form-label']) !!}
                        {!! Form::text('no23', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no25', '25. Se cumple la meta de 90% de actividades del PRS', ['class' => 'form-label']) !!}
                        {!! Form::text('no25', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no24', '24. Actividades realizadas en el año', ['class' => 'form-label']) !!}
                        {!! Form::text('no24', null, ['class' => 'form-control', 'placeholder' => 'Ingrese respuesta', 'readonly' => 'readonly']) !!}
                    </div>
                    </div>

                    </div><!--FIN CALIDAD-->



                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  