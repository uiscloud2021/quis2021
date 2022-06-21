    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Cierre
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
                                <a class="nav-link active" id="vert-tabs-1ci-tab" data-toggle="pill" href="#vert-tabs-1ci" role="tab" aria-controls="vert-tabs-1ci" aria-selected="false"><i class="far fa-edit"></i> Cierre</a>
                            </li>
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--CIERRE-->
                  <div class="tab-pane fade show active" id="vert-tabs-1ci" role="tabpanel" aria-labelledby="vert-tabs-1ci-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <!--TERMINACION--> 
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Terminación</h5><br/>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('cierre_id', null, ['class' => 'form-control', 'id'=>'cierre_id']) !!}
                        {!! Form::hidden('proyecto_id', $proyecto->id, ['class' => 'form-control', 'id'=>'proyecto_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}
                        
                        {!! Form::label('c1', '1. Fecha en que se recibe el aviso de terminación del estudio por parte del Investigador principal', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('c1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('c1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group" id="divc2">
                        {!! Form::label('c2', '2. Causa de la terminación', ['class' => 'form-label']) !!}
                        {!! Form::select('c2', ['Terminación del estudio' => 'Terminación del estudio', 'Cancelación por el Investigador principal' => 'Cancelación por el Investigador principal', 'Cancelación por CE' => 'Cancelación por CE', 'Cancelación por Patrocinador' => 'Cancelación por Patrocinador', 'Cancelación por autoridades nacionales' => 'Cancelación por autoridades nacionales', 'Cancelación por autoridades extranjeras' => 'Cancelación por autoridades extranjeras', 'Migración del estudio' => 'Migración del estudio'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('c3', '3. Fecha en que se emite el formato Migración del estudio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('c3', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN TERMINACION-->


                    <!--ARCHIVO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Archivo de concentración</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('c4', '4. Fecha en que se integra el archivo de concentración para el estudio', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('c4', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divc5">
                        {!! Form::label('c5', '5. Número de paquete en que se ubica el documento', ['class' => 'form-label']) !!}
                        {!! Form::number('c5', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divc6">
                        {!! Form::label('c6', '6. Número total de paquetes que integran el archivo de concentración para el estudio', ['class' => 'form-label']) !!}
                        {!! Form::number('c6', null, ['class' => 'form-control', 'placeholder' => 'Ingrese número']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('c7', '7. Fecha programada para la destrucción del archivo', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('c7', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    </div>

                    </div><!--FIN ARCHIVO-->


                    <!--DOMICILIO--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Cambio de domicilio del archivo de concentración</h5><br/>
                    </div>
                    
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateDomicilioCi();">
                                <i class="fas fa-file"> Agregar fecha de cambio de domicilio</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_domicilioci" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Fecha de cambio</th>
                                <th scope="col">Fecha en que se emite el cambio</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                    </div><!--FIN DOMICILIO-->


                    <!--DESTRUCCION--> <br/>
                    <div class="row">
                    <div class="col-12">
                        <h5 style="text-align:center">Destrucción</h5><br/>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('c11', '11. Fecha de destrucción', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('c11', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="divc12">
                        {!! Form::label('c12', '12. Persona que realizó la destrucción', ['class' => 'form-label']) !!}
                        {!! Form::select('c12', $empleados, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-group" id="divc13">
                        {!! Form::label('c13', '13. Persona que autorizó la destrucción', ['class' => 'form-label']) !!}
                        {!! Form::select('c13', $empleados, null, ['class' => 'form-control', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    </div><!--FIN DESTRUCCION-->

                  </div><!--FIN DE TAB CIERRE-->


                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  