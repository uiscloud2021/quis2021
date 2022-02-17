    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Mejora
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> No conformidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Atención de No conformidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Cierre</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--NO CONFORMIDAD-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'mejora_id']) !!}
                        {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Fecha de reporte de no conformidad', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Origen de la no conformidad', ['class' => 'form-label']) !!}
                        {!! Form::select('no3', ['Interno' => 'Interno', 'Externo' => 'Externo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Personas que deben recibir el reporte', ['class' => 'form-label']) !!}
                        {!! Form::hidden('no5', null, ['class' => 'form-control', 'id' => 'no5']) !!}
                        <table class="table table-striped" style="width:100%;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                            </tr>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td><input type="checkbox" name="candidatos[]" id="cand{{$empleado->id}}" value="{{$empleado->id}}"></input></td>
                                    <td>{{$empleado->no62}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Código de la no conformidad', ['class' => 'form-label']) !!}
                        <?php
                        if(isset($num)){
                        ?>
                        {!! Form::text('no2', $codigo, ['class' => 'form-control', 'placeholder' => 'Ingrese código', 'readonly']) !!}
                        {!! Form::hidden('num_cod', $num, ['class' => 'form-control']) !!}
                        <?php
                        }else{
                        ?>
                        {!! Form::text('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese código', 'readonly']) !!}
                        {!! Form::hidden('num_cod', null, ['class' => 'form-control']) !!}
                        <?php
                        }
                        ?>
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Persona que emite el reporte', ['class' => 'form-label']) !!}
                        {!! Form::select('no4', $candidatos, null, ['class' => 'form-control', 'id' =>'no4', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. Descripción de la no conformidad', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción']) !!}
                    </div>
                    </div>

                    </div>
                  </div>



                  <!--ATENCION-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no7', '7. Fecha de atención de la NC', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no7', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Análisis de causas', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese análisis']) !!}
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no8', '8. Persona que atiende', ['class' => 'form-label']) !!}
                        {!! Form::text('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Acción correctiva', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese acción']) !!}
                    </div>
                    </div>

                    </div>
                  </div>


                  <!--CIERRE-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no11', '11. Cumplimiento ', ['class' => 'form-label']) !!}
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
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no12', '12. Comentarios', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese comentarios']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  