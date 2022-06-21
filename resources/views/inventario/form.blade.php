<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Inventario
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('inventario.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Equipos</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>

              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">
                    
                  <!--EQUIPOS-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>  
                  
                    {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control']) !!}

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'inventario_id', 'readonly']) !!}

                        {!! Form::label('no1', '1. Nombre del equipo', ['class' => 'form-label']) !!}
                        {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    
                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Marca', ['class' => 'form-label']) !!}
                        {!! Form::text('no3', null, ['class' => 'form-control', 'placeholder' => 'Ingrese marca']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Modelo', ['class' => 'form-label']) !!}
                        {!! Form::text('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese modelo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Número de serie', ['class' => 'form-label']) !!}
                        {!! Form::text('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese serie']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Código de identificación', ['class' => 'form-label']) !!}
                        {!! Form::text('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese código']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Domicilio en que se encuentra', ['class' => 'form-label']) !!}
                        {!! Form::text('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese domicilio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Estrategia de protección', ['class' => 'form-label']) !!}
                        {!! Form::select('no11', ['Acceso restringido' => 'Acceso restringido', 'Uso restringido' => 'Uso restringido'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no13', '13. Periodicidad de calibración', ['class' => 'form-label']) !!}
                        {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese periodicidad']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no15', '15. Proveedor de calibración', ['class' => 'form-label']) !!}
                        {!! Form::text('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no17', '17. Fecha de calibración', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no17', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Descripción del equipo', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese descripción']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. Fecha de adquisición', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no6', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Código de barras', ['class' => 'form-label']) !!}
                        {!! Form::text('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese código']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Área física de instalación', ['class' => 'form-label']) !!}
                        {!! Form::text('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese área']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no12', '12. Requiere calibración', ['class' => 'form-label']) !!}
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
                        {!! Form::label('no14', '14. Comprobante de calibración', ['class' => 'form-label']) !!}
                        {!! Form::select('no14', ['Certificado' => 'Certificado', 'Factura' => 'Factura'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no16', '16. ¿Se llenó tarjeta de contacto del proveedor de calibración?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no16', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no16', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
                        </div>
                    </div>
                
                    <div class="form-group">
                        {!! Form::label('no18', '18. ¿Se archivó el comprobante de la calibración?', ['class' => 'form-label']) !!}
                        <div>
                            <label>
                                {!! Form::radio('no18', 'Si', null, ['class' => 'mr-1']) !!}
                                Si
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>
                                {!! Form::radio('no18', 'No', null, ['class' => 'mr-1']) !!}
                                No
                            </label>
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


                    
                  