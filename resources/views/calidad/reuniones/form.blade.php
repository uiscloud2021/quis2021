    <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Reuniones
            </h3>
            <div style="float:right">
                <button type="button" onclick="location.href='{{ route('reuniones.index') }}'" class="btn-warning" title="Regresar"><i class="fa fa-arrow-left"></i></button>
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
                                <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="false"><i class="far fa-edit"></i> Reuniones de calidad</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
              </div>
              
              <div class="col-7 col-sm-9 border-left">
                <div class="tab-content" id="vert-tabs-tabContent">

                  <!--REUNIONES-->
                  <div class="tab-pane fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                    <?php
                        $user_id=auth()->id(); 
                    ?>
                    <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::hidden('user_id', $user_id, ['class' => 'form-control', 'id'=>'user_id']) !!}
                        {!! Form::hidden('id', null, ['class' => 'form-control', 'id'=>'reunion_id']) !!}
                        {!! Form::hidden('empresa_id', session('id_empresa'), ['class' => 'form-control', 'id'=>'empresa_id']) !!}

                        {!! Form::label('no1', '1. Fecha de la reunión', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no1', null, ['class' => 'form-control']) !!}
                        </div>

                        @error('no1')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('no2', '2. Nombre del asistente', ['class' => 'form-label']) !!}
                        {!! Form::hidden('no2', null, ['class' => 'form-control', 'id' => 'no2']) !!}
                        <table class="table table-striped" style="width:100%;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Puesto</th>
                            </tr>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td><input type="checkbox" name="candidatos[]" id="cand{{$empleado->id}}" value="{{$empleado->id}}"></input></td>
                                    <td>{{$empleado->no62}}</td>
                                    <td>{{$empleado->no63}}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="form-group" id="div11" style="display:none">
                            {!! Form::label('no11', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no11', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div12" style="display:none">
                            {!! Form::label('no12', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no12', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div13" style="display:none">
                            {!! Form::label('no13', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no13', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div14" style="display:none">
                            {!! Form::label('no14', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no14', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div15" style="display:none">
                            {!! Form::label('no15', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no15', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div16" style="display:none">
                            {!! Form::label('no16', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no16', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div17" style="display:none">
                            {!! Form::label('no17', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no17', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div18" style="display:none">
                            {!! Form::label('no18', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no18', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div19" style="display:none">
                            {!! Form::label('no19', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no19', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>
                        <div class="form-group" id="div20" style="display:none">
                            {!! Form::label('no20', 'Nombre del asistente', ['class' => 'form-label']) !!}
                            {!! Form::text('no20', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre']) !!}
                        </div>

                        <div align="right">
                            <button type="button" class="btn btn-info" id="btnAsistente" onclick="CreateAsistente();">
                                <i class="fas fa-file"> Agregar asistente</i>
                            </button>  
                        </div>
                    </div>

                    <br/>
                    <div class="table-responsive">
                        <div align="left">
                            <button type="button" class="btn btn-info" onclick="CreateAsunto();">
                                <i class="fas fa-file"> Agregar asunto</i>
                            </button>  
                        </div><br/>
                        <table id="tbl_asunto" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%;">
                            <thead class="bg-mexg2 text-white">
                            <tr>
                                <th scope="col">Asunto</th>
                                <th scope="col">Acuerdo</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <br/>

                    <div class="form-group">
                        {!! Form::label('no8', '8. Fecha de verificación', ['class' => 'form-label']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            {!! Form::date('no8', null, ['class' => 'form-control']) !!}
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('no9', '9. Nombre del verificador', ['class' => 'form-label']) !!}
                        {!! Form::select('no9', $candidatos, null, ['class' => 'form-control', 'id' =>'no9', 'placeholder' => 'Seleccione...']) !!}
                    </div>
                    </div>

                    </div>
                  </div>

                  
                </div>
              </div>

            </div>
        </div>
    </div>



                    
                  