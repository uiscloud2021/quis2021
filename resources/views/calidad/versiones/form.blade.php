<div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Versiones
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Versiones</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>

              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">
                    
                  <!--DOCUMENTOS QUIS-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>  
                  
                    {!! Form::hidden('empresa_id', $globalempresa_id, ['class' => 'form-control']) !!}

                    <div class="row">

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id', 'readonly']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'version_id', 'readonly']) !!}

                        {!! Form::label('no1', '1. Código de la versión', ['class' => 'form-label']) !!}
                        {!! Form::text('no1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese código']) !!}
                    
                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no3', '3. Vigencia de la versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no3', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no5', '5. Motivo del cambio', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese motivo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no7', '7. Número de Procesos', ['class' => 'form-label']) !!}
                        {!! Form::number('no7', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Número de Instructivos de trabajo', ['class' => 'form-label']) !!}
                        {!! Form::number('no9', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no11', '11. Número de segmentos de Software ', ['class' => 'form-label']) !!}
                        {!! Form::number('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no13', '13. Suma de documentos', ['class' => 'form-label']) !!}
                        {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese suma', 'readonly']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no15', '15. Fecha de revisión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no15', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no17', '17. Fecha de autorización', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no17', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('no2', '2. Fecha de versión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no2', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no4', '4. Cambio', ['class' => 'form-label']) !!}
                        {!! Form::textarea('no4', null, ['class' => 'form-control', 'placeholder' => 'Ingrese cambio']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no6', '6. Número de Manuales', ['class' => 'form-label']) !!}
                        {!! Form::number('no6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Número de Procedimientos', ['class' => 'form-label']) !!}
                        {!! Form::number('no8', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no10', '10. Número de Formatos controlados', ['class' => 'form-label']) !!}
                        {!! Form::number('no10', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no12', '12. Número de programas de Capacitación', ['class' => 'form-label']) !!}
                        {!! Form::number('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número', 'step' => '0']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('no14', '14. Persona que revisa', ['class' => 'form-label']) !!}
                        {!! Form::select('no14', $candidatos, null, ['class' => 'form-control', 'id' =>'no14', 'placeholder' => 'Seleccione...']) !!}
                        
                    </div>

                    <div class="form-group">
                        {!! Form::label('no16', '16. Persona que autoriza', ['class' => 'form-label']) !!}
                        {!! Form::select('no16', $candidatos, null, ['class' => 'form-control', 'id' =>'no16', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                  
                </div>
              </div>
            </div>
        </div>
    </div>


                    
                  