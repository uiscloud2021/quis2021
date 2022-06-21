    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Seguimiento
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('eq-ce.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a onclick="Tablas1Seg();" class="nav-link active" id="vert-tabs-1seg-tab" data-toggle="pill" href="#vert-tabs-1seg" role="tab" aria-controls="vert-tabs-1seg" aria-selected="false"><i class="far fa-edit"></i> Seguimiento</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="list_informeseg();" class="nav-link" id="vert-tabs-2seg-tab" data-toggle="pill" href="#vert-tabs-2seg" role="tab" aria-controls="vert-tabs-2seg" aria-selected="false"><i class="far fa-edit"></i> Informe</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--SEGUIMIENTO-->
                  <div class="tab-pane fade show active" id="vert-tabs-1seg" role="tabpanel" aria-labelledby="vert-tabs-1seg-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>

                    {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                    {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                    {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                    
                    <!--ENMIENDA--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Enmiendas</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEnmiendaSeg();">
                                <i class="fas fa-file"> Agregar enmienda</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_enmiendaseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de reunión</th>
                                <th scope="col">Fecha de aprobación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN ENMIENDA-->

                    <!--DESVIACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Desviaciones y violaciones</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="tbl_desviacionseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha en que sucedió</th>
                                <th scope="col">Fecha de revisión</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN DESVIACION-->

                    <!--EAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">EAS</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="tbl_easseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha en que sucedió</th>
                                <th scope="col">Fecha de enterado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN EAS-->

                    <!--OTROS SOMETIMIENTOS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Otros sometimientos</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateOtroSeg();">
                                <i class="fas fa-file"> Agregar otro sometimiento</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_otroseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Tipo de revisión</th>
                                <th scope="col">Fecha de aprobación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN OTROS SOMETIMIENTOS-->

                    <!--RENOVACION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Renovaciones</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="tbl_renovacionseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Somete informe anual</th>
                                <th scope="col">Fecha de renovación</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN RENOVACION-->

                    <!--FE DE ERRATAS--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Fe de erratas</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <table id="tbl_erratasseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Documento</th>
                                <th scope="col">Fecha en que se emite</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div><!--FIN FE DE ERRATAS-->

                  </div><!--FIN DE TAB SEGUIMIENTO-->



                  <!--INFORME-->
                  <div class="tab-pane fade" id="vert-tabs-2seg" role="tabpanel" aria-labelledby="vert-tabs-2seg-tab">

                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Informe</h5><br/>
                    </div>

                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateInformeSeg();">
                                <i class="fas fa-file"> Agregar informe</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_informeseg" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de informe</th>    
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div>

                  </div><!--FIN DE TAB INFORME-->


                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  