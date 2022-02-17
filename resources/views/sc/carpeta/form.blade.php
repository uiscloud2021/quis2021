    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Carpeta de farmacia
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Responsable de farmacia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_farmacista();" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Farmacistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_control();" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Control farmacia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_tramite();" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Trámites</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_verificacion();" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false"><i class="far fa-edit"></i> Visitas y verificaciones</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--RESPONSABLE-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'carpeta_id']) !!}
                        {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Nombre del Responsable Sanitario', ['class' => 'form-label']) !!}
                        {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Fecha de inicio de responsabilidades', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no3', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Firma del Responsable Sanitario', ['class' => 'form-label']) !!}
                        {!! Form::text('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese firma']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Fecha de fin de responsabilidades', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no4', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    </div>
                  </div>

                  <!--FARMACISTA-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateFarmacista();">
                                <i class="fas fa-file"> Agregar farmacista</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_farmacista" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de inicio</th>
                                <th scope="col">Fecha de fin</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--CONTROL-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateControl();">
                                <i class="fas fa-file"> Agregar revisión</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_control" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--TRAMITE-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateTramite();">
                                <i class="fas fa-file"> Agregar trámite</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_tramite" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del trámite</th>
                                <th scope="col">Fecha de entrada</th>
                                <th scope="col">Respuesta</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--VERIFICACION-->
                  <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateVerificacion();">
                                <i class="fas fa-file"> Agregar verificación</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_verificacion" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de visita de verificación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  