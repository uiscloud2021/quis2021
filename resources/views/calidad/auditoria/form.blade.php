    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Auditoría
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Programación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_equipo();" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Equipo auditor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_requisito();" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Auditoría</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Revisión</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--PROGRAMACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'auditoria_id']) !!}
                        {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Fecha en que se programó', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Fuente', ['class' => 'form-label']) !!}
                        {!! Form::select('no3', ['Interna' => 'Interna', 'Externa' => 'Externa'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Persona de contacto', ['class' => 'form-label']) !!}
                        {!! Form::select('no5', $candidatos, null, ['class' => 'form-control', 'id' =>'no5', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. Persona que autoriza', ['class' => 'form-label']) !!}
                        {!! Form::select('no6', $candidatos, null, ['class' => 'form-control', 'id' =>'no6', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Fecha de autorización', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no7', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>


                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Hora', ['class' => 'form-label']) !!}
                        {!! Form::time('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese hora']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Alcance de la auditoría', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese alcance']) !!}
                    </div>
                    </div>

                    </div>
                  </div>



                  <!--EQUIPO AUDITOR-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEquipo();">
                                <i class="fas fa-file"> Agregar equipo auditor</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_equipo" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Empresa</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--REQUISITO AUDITORIA-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                  
                    <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('no11', '11. Fecha de auditoría', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no11', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRequisito();">
                                <i class="fas fa-file"> Agregar requisito a evaluar</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_requisito" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Requisito</th>
                                <th scope="col">Cumplimiento</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>



                  <!--REVISION-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">

                    <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('no16', '16. Fecha en que se comentó el resultado con el personal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no16', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  