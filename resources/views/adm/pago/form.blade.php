    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Pagos
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('pago.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" onclick="list_recibido();" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Pagos recibidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_realizado();" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Pagos realizados</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--PAGOS RECIBIDOS-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                    {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                    {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRecibido();">
                                <i class="fas fa-file"> Agregar pago</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_recibido" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Factura</th>
                                <th scope="col">Fecha de pago</th>
                                <th scope="col">Cantidad</th>
                                <!--<th scope="col">Diferimiento (días)</th>
                                <th scope="col">Días para cobrar (Meta = 10 días)</th>-->
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--PAGOS REALIZADOS-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateRealizado();">
                                <i class="fas fa-file"> Agregar pago</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_realizado" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de pago</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Diferimiento (días)</th>
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



                    
                  