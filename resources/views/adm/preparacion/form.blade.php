    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Preparación
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Datos de facturación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="false"><i class="far fa-edit"></i> Cobros programados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_visitas();" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false"><i class="far fa-edit"></i> Visitas y actividades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_estudios();" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false"><i class="far fa-edit"></i> Pagos programados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" onclick="list_proveedores();" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false"><i class="far fa-edit"></i> Proveedores</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--DATOS DE FACTURACION-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'preparacion_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Nombre fiscal para facturar CE', ['class' => 'form-label']) !!}
                        {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. RFC para facturar CE ', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese RFC']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Domicilio para facturar visitas', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese domicilio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Nombre fiscal para facturar estudios de gabinete o laboratorio locales', ['class' => 'form-label']) !!}
                        {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. RFC para facturar estudios de gabinete o laboratorio locales', ['class' => 'form-label']) !!}
                        {!! Form::text('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese RFC']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Domicilio para facturación de viáticos', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese domicilio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no13', '13. Persona encargada de pagos', ['class' => 'form-label']) !!}
                        {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group" id="div15">
                        {!! Form::label('no15', '15. Se llenó tarjeta de contacto de la persona encargada de pagos', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no15', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no15', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Domicilio para facturar CE', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese domicilio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Nombre fiscal para facturar visitas', ['class' => 'form-label']) !!}
                        {!! Form::text('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. RFC para facturar visitas', ['class' => 'form-label']) !!}
                        {!! Form::text('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese RFC']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Domicilio para facturar estudios de gabinete o laboratorio locales', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese domicilio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Nombre fiscal para facturación de viáticos', ['class' => 'form-label']) !!}
                        {!! Form::text('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no12', '12. RFC para facturación de viáticos', ['class' => 'form-label']) !!}
                        {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese RFC']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no14', '14. Correo de la persona de pagos', ['class' => 'form-label']) !!}
                        {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese correo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no16', '16. Correo para envío de facturas', ['class' => 'form-label']) !!}
                        {!! Form::text('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese correo']) !!}
                    </div>
                    </div>

                    </div>
                  </div>


                  <!--COBROS PROGRAMADOS-->
                  <div class="tab-pane fade" id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no17', '17. Forma de pago', ['class' => 'form-label']) !!}
                        {!! Form::select('no17', ['Por actividad' => 'Por actividad', 'Por tiempo' => 'Por tiempo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no19', '19. Fecha de inicio de vigencia', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no19', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no21', '21. Documento de sustento', ['class' => 'form-label']) !!}
                        {!! Form::text('no21', null, ['class' => 'form-control', 'placeholder' => 'Ingrese documento']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no18', '18. Periodicidad', ['class' => 'form-label']) !!}
                        {!! Form::text('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese periodicidad']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no20', '20. Fecha de fin de vigencia', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no20', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    </div>
                  </div>

                  <!--VISITAS Y ACTIVIDADES-->
                  <div class="tab-pane fade" id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateVisita();">
                                <i class="fas fa-file"> Agregar visita</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_visita" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre de la visita</th>
                                <th scope="col">Cantidad a cobrar</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                  </div>


                  <!--PAGOS PROGRAMADOS-->
                  <div class="tab-pane fade" id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                    
                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no26', '26. Referencia de sujetos', ['class' => 'form-label']) !!}
                        {!! Form::number('no26', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no28', '28. Historia clínica', ['class' => 'form-label']) !!}
                        {!! Form::number('no28', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no30', '30. Contacto telefónico', ['class' => 'form-label']) !!}
                        {!! Form::number('no30', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no32', '32. Visita de monitoreo', ['class' => 'form-label']) !!}
                        {!! Form::number('no32', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no27', '27. Consentimiento informado', ['class' => 'form-label']) !!}
                        {!! Form::number('no27', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no29', '29. Visita médica', ['class' => 'form-label']) !!}
                        {!! Form::number('no29', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no31', '31. Aplicación de tratamiento', ['class' => 'form-label']) !!}
                        {!! Form::number('no31', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad', 'step' => '0.01']) !!}
                    </div>
                    </div>

                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateEstudio();">
                                <i class="fas fa-file"> Agregar estudio</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_estudio" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del estudio</th>
                                <th scope="col">Pago por el estudio</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    
                  </div>


                  <!--PROVEEDORES-->
                  <div class="tab-pane fade" id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateProveedor();">
                                <i class="fas fa-file"> Agregar proveedor</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_proveedor" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Nombre del proveedor</th>
                                <th scope="col">Inicio de vigencia</th>
                                <th scope="col">Fin de vigencia</th>
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



                    
                  